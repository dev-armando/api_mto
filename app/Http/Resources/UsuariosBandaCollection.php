<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UsuariosBandaCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $status = 'No Vinculado';
      $date = Carbon::parse($this->time_token);

       if($this->access_token != '') $status = 'Vinculado';

      $data=[
        "id"=>$this->idusuario,
        "user_name"=>$this->usuariotie,
        "email"=>$this->email,
        "date_expired_mp"=>$date,
        "status"=>$status,
      ];

      return $data;
    }


}
