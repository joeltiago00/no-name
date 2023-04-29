<?php

namespace App\Http\Controllers\Church;

use App\Http\Controllers\Controller;
use App\Http\Requests\Church\ChurchIndexRequest;
use App\Http\Resources\Church\ChurchResource;
use Igrejei\Church\ChurchIndex;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChurchIndexController extends Controller
{
    public function __construct(private readonly ChurchIndex $action)
    {
    }

    public function __invoke(ChurchIndexRequest $request): AnonymousResourceCollection
    {
        return ChurchResource::collection($this->action->handle($request->validated()));
    }
}
