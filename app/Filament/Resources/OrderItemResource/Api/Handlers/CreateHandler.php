<?php
namespace App\Filament\Resources\OrderItemResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\OrderItemResource;
use App\Filament\Resources\OrderItemResource\Api\Requests\CreateOrderItemRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = OrderItemResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create OrderItem
     *
     * @param CreateOrderItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateOrderItemRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}