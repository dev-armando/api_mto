<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategorium as Model;
use App\Http\Resources\SubCategoriaListCollection as ListCollectiion;
use Exception;

class SubCategoriasController extends Controller
{
    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $id_categoria = $request->input('id_categoria');
        $state = $request->input('state');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy') ?? 'subcategoria';
        $orderDirection= $request->input('orderDirection') ?? 'ASC';

        try {

            $query = Model::with($include)->distinct();

            if($id_categoria) $query->where('id_categoria' , $id_categoria);
            if($state) $query->where('estado' , $state);

            $query->orderBy($orderBy, $orderDirection );

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;


            if($type_query == "select2")
                $response = $this->distinctList(ListCollectiion::collection($data));

            else
                $response = $this->getSuccessResponse($query, "Listado de Sub Categorias" , $page);

        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }
}
