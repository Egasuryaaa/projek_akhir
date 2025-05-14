<?php
namespace App\Filament\Resources\CartResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\CartResource;
use Illuminate\Routing\Router;


class CartApiService extends ApiService
{
    protected static string | null $resource = CartResource::class;

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
