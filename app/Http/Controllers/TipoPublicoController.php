<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPublico as Model;
use App\Http\Resources\TipoPublicoListCollection as ListCollectiion;
use Exception;

class TipoPublicoController extends Controller
{
    public function index(){

        $include = $request->input('include') ?? [];
        $type_query = $request->input('type_query');
        $page  = $request->input('page');
        $orderBy= $request->input('orderBy');
        $orderDirection= $request->input('orderDirection');

        try {

            $query = Model::with($include)->where('nombre_tipo_publico' , 'NOT LIKE ' , 'NO MOSTRAR' );

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
}
