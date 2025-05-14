<?php

namespace App\Filament\Resources\CartResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\CartResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\CartResource\Api\Transformers\CartTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = CartResource::class;
    public static bool $public = true;


    /**
     * Show Cart
     *
     * @param Request $request
     * @return CartTransformer
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

        return new CartTransformer($query);
    }
}
