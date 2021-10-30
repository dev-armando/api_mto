<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class MercadopagoLogCollection extends JsonResource
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
        "id_campania"=>$this->id_campania,
        "id_operation"=>$this->id_operation,
        "email_client"=>$this->email,
        "name"=>$this->nombre . ' ' . $this->apellido ,
        "dni_client"=>$this->dni  ,
        "date"=>$this->fecha->format('d/m/Y'),
        "payment_status" => $this->situaciondepago,
        "fee_mto"=>$this->when($this->relationLoaded("marketplaceLog"),$this->marketplaceLog->fee_mto . '%'),
        "fixed_value"=>$this->when($this->relationLoaded("marketplaceLog"),$this->marketplaceLog->fixed_value ),
        "unit_price"=>$this->when($this->relationLoaded("marketplaceLog"),$this->marketplaceLog->unit_price ),
        "quantity"=>$this->when($this->relationLoaded("marketplaceLog"),$this->marketplaceLog->quantity ),
        "fee_total"=>$this->when($this->relationLoaded("marketplaceLog"),$this->marketplaceLog->fee_total ),
        "campania_title"=>$this->when($this->relationLoaded("campania"),$this->campania->nombreCampania ),
        "artist"=>$this->when($this->relationLoaded("campania"),$this->campania->artistaEvento )
      ];

      return $data;
    }
}
