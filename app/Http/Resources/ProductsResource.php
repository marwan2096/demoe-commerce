<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name,
                'desc' => $this->desc,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                 'price' => $this->price,
                 'Category' => new CategoriesResource($this->Category),
                 'user' => new UserResource($this->user)
            ],
           
        ];
    }
}