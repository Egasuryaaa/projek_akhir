<?php

namespace App\Filament\Resources\OrderResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\OrderResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\OrderResource\Api\Transformers\OrderTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = OrderResource::class;
    public static bool $public = true;


    /**
     * Show Order
     *
     * @param Request $request
     * @return OrderTransformer
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

        return new OrderTransformer($query);
    }
}
