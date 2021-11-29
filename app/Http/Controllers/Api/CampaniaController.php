<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\{Campanium as Model , Comision, ComisionesVariable, LugarCampanium as Lugar, Tipoentrada as Entrada};
use App\Http\Resources\CampaniaListCollection as ListCollectiion;
use App\Http\Traits\HelperTrait as Helper;
use Exception, DB, JWTAuth;

class CampaniaController extends Controller
{
    use Helper;

    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $id_campania = $request->input('id_campania');
        $type_query = $request->input('type_query');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy');
        $orderDirection= $request->input('orderDirection');

        try {

            $query = Model::with($include)->has('mercadopagoLog.marketplaceLog');

            if($orderBy) $query->orderBy($orderBy,$orderDirection);
            else $query->orderBy("fecha","DESC");

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;

            if($type_query == "list") $data = ListCollectiion::collection($data);

            $response = [
                'data' => $data,
                "message"=>"Listado de Campanias"
            ];

          if($page)
            $response['meta'] = [
                'page' => [
                "total" => $query->total(),
                "lastPage" => $query->lastPage(),
                "perPage" => $query->perPage(),
                "currentPage" => $query->currentPage()
                ]
            ];


        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }

    public function store(Request $request){
        try {

            $hoy = date("Y-m-d");
            $data = $request->all();
            $user = JWTAuth::parseToken()->authenticate();
            $comision = Comision::where('id_usuario' ,$user->idusuario )->first();

            if(!$comision) $this->executeMessageError('Error comision no encontrada',400);

            DB::beginTransaction();

            if( $request->input('otro_lugar')  ){

                $entityLugar = Lugar::create([
                    'nombre'  =>  $data['otro_lugar'],
                    'id_pais' =>  $data['pais_id'],
                    'id_provincia'  => $data['provincia_id'],
                    'id_localidad'  => $data['localidad_id'],
                    'direccion'  => $data['direccion'],
                    'capacidadLugar'  => $data['capacidadLugar']
                ]);

                $newLugarSelect = $this->decodeUft8($this->addSelectAux( DB::select("SELECT distinct
                    CONCAT(
                        CONVERT(lug.id_lugar_campania , CHAR) , '-' ,
                        CONVERT(id_pais , CHAR) , '-' ,
                        REPLACE(pro.descripcion , ' ' , ''  ) , '-' ,
                        REPLACE(loc.descripcion , ' ' , ''  )   , '-' ,
                        direccion , '-' ,
                        nombre , '-' ,
                        CONVERT(  capacidadLugar , CHAR)
                    ) as id,
                    nombre as text
                    FROM  `lugar_campania` as  lug ,geo_provincia  as pro ,geo_localidad as loc
                    where lug.id_provincia=pro.id
                    and  lug.id_localidad=loc.id
                    AND lug.id_lugar_campania = {$entityLugar->id_lugar_campania}
                    order by nombre ASC")));

                $data['lugar'] = $newLugarSelect[0]['id'];
            }

            $id_entity = Model::orderBy('id_campania', 'DESC')->first();

            $id_entity = (!$id_entity) ? 0 : (int)$id_entity->id_campania;
            $id_entity++;

            $entity = Model::create([
                'id_campania' =>  $id_entity,
                'id_comercio' => 1,
                'id_artista' => 1,
                'id_calendario' => 1,
                'cantidad' => $data['entradasCantidad'],
                'fecha' => date("Y-m-d"),
                'lugar' => explode("-", $data['lugar'])[0],
                'importe' => '',
                'estado' => 2,
                'direccion' => $data['direccion'],
                'localidad' => $data['localidad_id'],
                'provincia' => $data['provincia_id'],
                'usuario' => $user->idusuario,
                'vendidas' => '0',
                'tipo' => 2,
                'nombreCampania' => $data['evento'],
                'importeinicial' => '',
                'iibb' =>  $comision->iibb,
                'ml' => $comision->ml,
                'monotributo' => $comision->monotributo,
                'ganancia' => $comision->ganancia,
                'fechaMod' => '',
                'fechaEvento' => $data['fecha'],
                'lugarEvento' => explode("-", $data['lugar'])[5],
                'pais' => $data['pais_id'],
                'hora_evento' =>  Carbon::parse($data['hora'])->format('H:m') ,
                'hora_puerta' =>  Carbon::parse($data['hora_puerta'])->format('H:m') ,
                'facebook' => $data['facebook'] ?? ' ',
                'twitter' => $data['twitter'] ?? ' ' ,
                'youtube' => $data['youtube'] ?? ' ',
                'categoria_id' => $data['categoria_id'],
                'subcategoria_id' => $data['subcategoria_id'],
                'cantidadFecha' => '',
                'slider' => '',
                'imagen' => $this->from_base64_to_img_helper($data['uploadImage2'] , env('DIR_IMG_EVENTS') ,  $id_entity  ),
                'titulo' => $data['titulo'],
                'descripcion' => $data['descripcion'],
                'sitio_oficial' => $data['sitioOficial'] ?? ' ',
                'artistaEvento' => $data['artistaEvento'],
                'fecha_mod' => '',
                'publico_evento' => $data['publico_evento'],
                'mostrarEventoEnSitio' => $data['mostrarEventoEnSitio'],
                'slug_campania' => $this->get_slug_helper($data['evento']).'-'. $id_entity
            ]);

            $id_entrada = Entrada::lastId();

            foreach ($data['entradas'] as $entrada) {

                $comisionVariable = ComisionesVariable::where('valor_entrada' , '<=' , $entrada['precio'])
                ->orderBy("valor_entrada","DESC")
                ->first();

                $entity->entradas()->create([
                    'id_tipoent' => ++$id_entrada,
                    'nombre' => $entrada['nombreEntrada'],
                    'cantidad' => $entrada['cantidad'],
                    'precio' => $entrada['preciof'],
                    'importeinicial' => $entrada['precio'],
                    'comision_mto' =>    $comisionVariable->comision_mto,
                    'comision_usuario' =>    $comisionVariable->comision_usuario,
                    'fechaActivacion' => $entrada['fecha_act'] . ' '. $entrada['hora_act'],
                    'fechaExpiracion' => $entrada['fecha_exp'] . ' '. $entrada['hora_exp'],
                    'tipoentradas' => 2

                ]);
            }
            DB::commit();
            $entity->load('entradas');
            $response = $this->getSuccessResponse($entity,"Registro exitoso");

        } catch (Exception $e) {
            DB::rollBack();
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al realizar el registro');

        }
        return $this->response($response, $code ?? 201);
    }

    public function showComision($price){


        try {
            $comisionVariable = ComisionesVariable::where('valor_entrada' , '<=' , $price)
                    ->orderBy("valor_entrada","DESC")
                    ->first();

            $this->validModel($comisionVariable, 'Comision no encontrada');

            $response = $this->getSuccessResponse($comisionVariable);

        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);

    }

    public function show($id)
    {
        try {
            $entity=Model::with('entradas')->find($id);

            $this->validModel($entity, 'Evento no encontrado');

            $response = $this->getSuccessResponse($entity);
        } catch (\Exception $e) {
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al realizar la consulta');
        }//catch
        return $this->response($response, $code ?? 200);
    }//show()

    public function showPrice($mount){

    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $entity=Model::find($id);
            $this->validModel($entity, 'Evento no encontrado');

            $user = JWTAuth::parseToken()->authenticate();

            $data = $request->except('entradas');
            $dataEntradas = $request->only('entradas');
            $entity->update([
                'id_comercio' => 1,
                'id_artista' => 1,
                'id_calendario' => 1,
                'cantidad' => $data['entradasCantidad'],
                'fecha' => date("Y-m-d"),
                'lugar' => explode("-", $data['lugar'])[0],
                'importe' => '',
                'estado' => 2,
                'direccion' => $data['direccion'],
                'localidad' => $data['localidad_id'],
                'provincia' => $data['provincia_id'],
                'usuario' => $user->idusuario,
                'vendidas' => '0',
                'tipo' => '',
                'nombreCampania' => $data['evento'],
                'importeinicial' => '',
                'fechaMod' => '',
                'fechaEvento' => $data['fecha'],
                'lugarEvento' => explode("-", $data['lugar'])[5],
                'pais' => $data['pais_id'],
                'hora_evento' => $data['hora']->format('H:m')  ,
                'hora_puerta' => $data['hora_puerta']->format('H:m'),
                'facebook' => $data['facebook'] ?? ' ',
                'twitter' => $data['twitter'] ?? ' ' ,
                'youtube' => $data['youtube'] ?? ' ',
                'categoria_id' => $data['categoria_id'],
                'subcategoria_id' => $data['subcategoria_id'],
                'cantidadFecha' => '',
                'slider' => '',
                'imagen' => $this->from_base64_to_img_helper($data['uploadImage2'] , env('DIR_IMG_EVENTS') ,  $entity->id_campania  ),
                'titulo' => $data['titulo'],
                'descripcion' => $data['descripcion'],
                'sitio_oficial' => $data['sitioOficial'] ?? ' ',
                'artistaEvento' => $data['artistaEvento'],
                'fecha_mod' => '',
                'publico_evento' => $data['publico_evento'],
                'mostrarEventoEnSitio' => $data['mostrarEventoEnSitio'],
                'slug_campania' => $this->get_slug_helper($data['evento']).'-'. $entity->id_campania
            ]);

            $id_entradas = [];

            foreach($dataEntradas as $entrada){
                $id_entradas[] = $entrada['id_evento'];
            }


            DB::table('tipoentradas')->where('id_campania',$entity->id_campania)
            ->whereNotIn('id_tipoent', $id_entradas  )
            ->delete();

            //$entityEntradas = $entity->entradas();

           // $entityEntradas->update($dataEntradas);

            DB::commit();
            $response = $this->getSuccessResponse($entity , "Actualización exitosa");
        } catch (\Exception $e) {
            DB::rollBack();
            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'La actualización de datos ha fallado');
        }//catch
        return $this->response($response, $code ?? 200);
    }//update()






}
