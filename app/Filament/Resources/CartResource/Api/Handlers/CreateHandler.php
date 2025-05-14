<?php
namespace App\Filament\Resources\CartResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\CartResource;
use App\Filament\Resources\CartResource\Api\Requests\CreateCartRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = CartResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Cart
     *
     * @param CreateCartRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateCartRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}