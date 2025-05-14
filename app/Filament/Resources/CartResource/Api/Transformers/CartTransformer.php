<?php
namespace App\Filament\Resources\CartResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Cart;

/**
 * @property Cart $resource
 */
class CartTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
