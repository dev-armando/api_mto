<?php

namespace App\Http\Traits;
use Exception;
use Illuminate\Http\Request;

trait ResponseTrait {

    protected function addFilters(Request $request, &$query){

        if ($query) {
            $page  = $request->input('page');
            $take = $request->input('take');
            $order_by= $request->input('order_by');
            $order_direction= $request->input('order_direction');
            if ($order_by && $order_direction) {
                $query->orderBy($order_by, $order_direction);
            } else {
                $query->orderBy("created_at", "DESC");
            }
            //Pagination
            if ($page) $query=$query->paginate($take??12);
            else{
              $take ? $query->take($take) : false;//Take
              $query=$query->get();
            }

        }
    }

    protected function response($response=[], $code=200){
        return response()->json($response,$code);
    }

    protected function getCleanCode(Exception $e){
        $code =$e->getCode() ? (is_numeric($e->getCode()) ? $e->getCode() : 500) : 500;
        $code = ($code >500) ? 500 : $code;
        return $code;
    }
    protected function getErrorResponse(Exception $e , $message){
        return [
            "message"=>$e->getMessage() ?? $message,
            "errors"=>[]
        ];
    }

    protected function executeMessageError($message , $code = 400){
        throw new \Exception($message, $code);
    }

    protected function getSuccessResponse($query , $message=false , $page=false){
         //Response-
         $response = ['data' => $page ? $query->items() : $query];

         if($message)
            $response["message"] = $message;


        if($page) //If request pagination add meta-page
            $response['meta'] = [
                'page' => [
                    "total" => $query->total(),
                    "lastPage" => $query->lastPage(),
                    "perPage" => $query->perPage(),
                    "currentPage" => $query->currentPage()
                ]
            ];
        return $response;
    }

    protected function validModel($entity, $message){
        if (!$entity) throw new \Exception($message, 404);
    }

}
