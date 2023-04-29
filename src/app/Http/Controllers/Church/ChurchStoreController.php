<?php

namespace App\Http\Controllers\Church;

use App\Http\Controllers\Controller;
use App\Http\Requests\Church\ChurchStoreRequest;
use App\Http\Resources\Church\ChurchResource;
use Igrejei\Church\ChurchStore;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ChurchStoreController extends Controller
{
    public function __construct(private readonly ChurchStore $action)
    {
    }

    public function __invoke(ChurchStoreRequest $request): JsonResponse
    {
        return ChurchResource::make(
            $this->action->handle(
                array_merge($request->validated(), ['user_create_id' => auth()->user()->getKey()])
            )
        )
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
