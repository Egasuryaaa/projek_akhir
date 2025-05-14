<?php
namespace App\Filament\Resources\MessageResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Message;

/**
 * @property Message $resource
 */
class MessageTransformer extends JsonResource
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
