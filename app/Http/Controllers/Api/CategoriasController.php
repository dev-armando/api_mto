<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorium as Model;
use App\Http\Resources\CategoriaListCollection as ListCollectiion;
use Exception;


class CategoriasController extends Controller
{
    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $state = $request->input('state');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy') ?? 'categoria';
        $orderDirection= $request->input('orderDirection') ?? 'ASC';

        try {

            $query = Model::with($include)->distinct();

            if($state) $query->where('estado' , $state);

            $query->orderBy($orderBy, $orderDirection );

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;


            if($type_query == "select2")
                $response = ListCollectiion::collection($data);
            else
                $response = $this->getSuccessResponse($query, "Listado de Categorias" , $page);

        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }
}
