<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campanium as Model;
use App\Http\Resources\CampaniaListCollection as ListCollectiion;

class CampaniaController extends Controller
{
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
}
