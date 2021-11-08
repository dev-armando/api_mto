<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeoLocalidad as Model;
use App\Http\Resources\LocalidadListCollection as ListCollectiion;
use Exception;

class LocalidadController extends Controller
{

    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $id = $request->input('id');
        $provincia_id = $request->input('provincia_id');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy') ?? 'descripcion';
        $orderDirection= $request->input('orderDirection') ?? 'ASC';

        try {

            $query = Model::with($include)->distinct();

            if($provincia_id) $query->where("geo_provincia_id", $provincia_id);
            if($id) $query->whereRaw("REPLACE(descripcion , ' ' , ''  ) = ?", [$id]);


            $query->orderBy($orderBy, $orderDirection );

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;


            if($type_query == "select2")
                $response = ListCollectiion::collection($data);

            else
                $response = $this->getSuccessResponse($query, "Listado de Localidad" , $page);

        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }
}
