<?php

namespace App\Filament\Resources\MessageResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\MessageResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\MessageResource\Api\Transformers\MessageTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = MessageResource::class;
    public static bool $public = true;


    /**
     * Show Message
     *
     * @param Request $request
     * @return MessageTransformer
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

        return new MessageTransformer($query);
    }
}
