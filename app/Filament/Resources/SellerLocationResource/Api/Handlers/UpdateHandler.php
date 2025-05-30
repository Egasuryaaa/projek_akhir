<?php
namespace App\Filament\Resources\SellerLocationResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\SellerLocationResource;
use App\Filament\Resources\SellerLocationResource\Api\Requests\UpdateSellerLocationRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = SellerLocationResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update SellerLocation
     *
     * @param UpdateSellerLocationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateSellerLocationRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}