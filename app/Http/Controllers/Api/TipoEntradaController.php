<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipoDeEntrada as Model;
use App\Http\Resources\TipoEntradaListCollection as ListCollectiion;
use Exception;


class TipoEntradaController extends Controller
{
    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $state = $request->input('state');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy') ?? 'nombre';
        $orderDirection= $request->input('orderDirection') ?? 'ASC';

        try {

            $query = Model::with($include)->distinct();

            if($state) $query->where('estado' , $state);


            $query->orderBy($orderBy, $orderDirection );

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;


            if($type_query == "select2")
                $response =  ListCollectiion::collection($data);
            else
                $response = $this->getSuccessResponse($query, "Listado de entradas" , $page);

        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }
}
