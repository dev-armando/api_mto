<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipoPublico as Model;
use App\Http\Resources\TipoPublicoListCollection as ListCollectiion;
use Exception;

class TipoPublicoController extends Controller
{
    public function index(Request $request){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy');
        $orderDirection= $request->input('orderDirection');

        try {

            $query = Model::with($include)->where('nombre_tipo_publico', 'not like', "%NO MOSTRAR%");

            if($orderBy) $query->orderBy($orderBy,$orderDirection);
            else $query->orderBy("priority","ASC");

            if($page) $query=$query->paginate();
            else $query=$query->get();

            $data =  $page ? $query->items() : $query;

            if($type_query == "list")  $response = ListCollectiion::collection($data);


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



            if($type_query == "select2")
                $response = ListCollectiion::collection($data);


        } catch (Exception $e) {

            $code = $this->getCleanCode($e);
            $response= $this->getErrorResponse($e, 'Error al consultar los registros');

        }
        return $this->response($response, $code ?? 200);
    }
}
