<?php

namespace App\Http\Controllers\Church;

use App\Http\Controllers\Controller;
use App\Http\Requests\Church\ChurchUpdateRequest;
use Igrejei\Church\Exceptions\ChurchNotUpdatedException;
use Illuminate\Http\Response;
use NoName\Church\ChurchUpdate;

class ChurchUpdateController extends Controller
{
    public function __construct(private readonly ChurchUpdate $action)
    {
    }

    /**
     * @throws ChurchNotUpdatedException
     */
    public function __invoke(ChurchUpdateRequest $request, int $churchId): Response
    {
        $this->action->handle($churchId, $request->validated());

        return response()->noContent();
    }
}
