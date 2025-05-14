<?php
namespace App\Filament\Resources\MessageResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\MessageResource;
use App\Filament\Resources\MessageResource\Api\Requests\CreateMessageRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = MessageResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create Message
     *
     * @param CreateMessageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateMessageRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}