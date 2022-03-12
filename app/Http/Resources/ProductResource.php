<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'slug' => $this->slug,
            'details' => $this->details,
            'price' => $this->price,
            'status' => $this->status,
            'product_type' => $this->product_type,
            'brand' => $this->brand,
            'product_image' => $this->product_image,
            'product_url' => $this->product_url,
            'quantity' => $this->quantity,
        ];
    }
}
