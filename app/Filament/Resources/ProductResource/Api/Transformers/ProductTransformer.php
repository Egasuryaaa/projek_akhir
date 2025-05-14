<?php
namespace App\Filament\Resources\ProductResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

/**
 * @property Product $resource
 */
class ProductTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return $this->resource->toArray();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
        ];
    }
}
