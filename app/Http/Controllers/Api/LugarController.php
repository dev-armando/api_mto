<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LugarCampanium as Model;
use Exception, DB;

class LugarController extends Controller
{
    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy') ?? 'nombre';
        $orderDirection= $request->input('orderDirection') ?? 'ASC';

        try {

            $query = Model::with($include);

            $query->orderBy($orderBy, $orderDirection );

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;


            if($type_query == "select2"){
                $response = $this->decodeUft8($this->addSelectAux( DB::select("SELECT distinct

                CONCAT(
                    CONVERT(lug.id_lugar_campania , CHAR) , '-' ,
                    CONVERT(id_pais , CHAR) , '-' ,
                    REPLACE(pro.descripcion , ' ' , ''  ) , '-' ,
                    REPLACE(loc.descripcion , ' ' , ''  )   , '-' ,
                    direccion , '-' ,
                    nombre , '-' ,
                    CONVERT(  capacidadLugar , CHAR)
                ) as id ,
                nombre as text

                FROM  `lugar_campania` as  lug ,geo_provincia  as pro ,geo_localidad as loc

                where lug.id_provincia=pro.id
                and  lug.id_localidad=loc.id
                order by nombre ASC")));

            }

            else
                $response = $this->getSuccessResponse($query, "Listado de lugares" , $page);

        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }
}
