<?php
namespace App\Filament\Resources\OrderItemResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\OrderItemResource;
use Illuminate\Routing\Router;


class OrderItemApiService extends ApiService
{
    protected static string | null $resource = OrderItemResource::class;

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
