<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaniaListCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $data=[
        "id"=>$this->id_campania,
        "name"=>$this->nombreCampania
      ];

      return $data;
    }
}
