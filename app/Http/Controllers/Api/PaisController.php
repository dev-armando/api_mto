<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeoPai as Model;
use App\Http\Resources\PaisListCollection as ListCollectiion;
use Exception;

class PaisController extends Controller
{
    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $id_pais = $request->input('id_pais');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy') ?? 'descripcion';
        $orderDirection= $request->input('orderDirection') ?? 'ASC';

        try {

            $query = Model::with($include);

            if($id_pais) $query->where('id' , $id_pais);

            $query->orderBy($orderBy, $orderDirection );

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;


            if($type_query == "select2")
                $response = ListCollectiion::collection($data);

            else
                $response = $this->getSuccessResponse($query, "Listado de Paises" , $page);

        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }
}
