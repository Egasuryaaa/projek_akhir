<?php

namespace App\Filament\Resources\CartItemResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\CartItemResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\CartItemResource\Api\Transformers\CartItemTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = CartItemResource::class;

    public static bool $public = true;


    /**
     * Show CartItem
     *
     * @param Request $request
     * @return CartItemTransformer
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

        return new CartItemTransformer($query);
    }
}
