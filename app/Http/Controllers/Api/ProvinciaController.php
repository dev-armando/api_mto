<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeoProvincium as Model;
use App\Http\Resources\ProvinciaListCollection as ListCollectiion;
use Exception;

class ProvinciaController extends Controller
{
    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $id = $request->input('id');
        $pais_id = $request->input('pais_id');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy') ?? 'descripcion';
        $orderDirection= $request->input('orderDirection') ?? 'ASC';

        try {

            $query = Model::with($include);


            if($id) $query->whereRaw("REPLACE(descripcion , ' ' , ''  ) = ?", [$id]);
            if($pais_id) $query->where('geo_pais_id' , $pais_id);


            $query->orderBy($orderBy, $orderDirection );

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;


            if($type_query == "select2")
                $response = ListCollectiion::collection($data);

            else
                $response = $this->getSuccessResponse($query, "Listado de Provincias" , $page);

        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }
}
