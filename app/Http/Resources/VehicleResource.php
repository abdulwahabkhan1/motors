<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"            =>  $this->id,
            "model_year"    =>  $this->model_year,
            "make"          =>  $this->make,
            "model"         =>  $this->model,
            "transmission"  =>  $this->transmission,
            "body"          =>  $this->body,
            "color"         =>  $this->color,
            "created_at"    =>  $this->created_at,
            "updated_at"    =>  $this->updated_at
        ];
    }
}
