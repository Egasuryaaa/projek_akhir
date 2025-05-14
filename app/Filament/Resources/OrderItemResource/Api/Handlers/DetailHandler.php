<?php

namespace App\Filament\Resources\OrderItemResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\OrderItemResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\OrderItemResource\Api\Transformers\OrderItemTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = OrderItemResource::class;
    public static bool $public = true;


    /**
     * Show OrderItem
     *
     * @param Request $request
     * @return OrderItemTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new OrderItemTransformer($query);
    }
}
