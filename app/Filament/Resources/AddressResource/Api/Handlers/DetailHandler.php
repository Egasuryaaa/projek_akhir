<?php

namespace App\Filament\Resources\AddressResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\AddressResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\AddressResource\Api\Transformers\AddressTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = AddressResource::class;
    public static bool $public = true;


    /**
     * Show Address
     *
     * @param Request $request
     * @return AddressTransformer
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

        return new AddressTransformer($query);
    }
}
