<?php
namespace App\Filament\Resources\CartItemResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\CartItemResource;
use Illuminate\Routing\Router;


class CartItemApiService extends ApiService
{
    protected static string | null $resource = CartItemResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
