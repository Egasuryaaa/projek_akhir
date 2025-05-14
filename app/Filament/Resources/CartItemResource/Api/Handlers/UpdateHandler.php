<?php
namespace App\Filament\Resources\CartItemResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\CartItemResource;
use App\Filament\Resources\CartItemResource\Api\Requests\UpdateCartItemRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = CartItemResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update CartItem
     *
     * @param UpdateCartItemRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateCartItemRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}