<?php
namespace App\Filament\Resources\AddressResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Address;

/**
 * @property Address $resource
 */
class AddressTransformer extends JsonResource
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
