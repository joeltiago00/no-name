<?php

namespace App\Http\Controllers\Church;

use App\Http\Controllers\Controller;
use Igrejei\Church\ChurchDelete;
use Igrejei\Church\Exceptions\ChurchNotDeletedException;
use Illuminate\Http\Response;

class ChurchDeleteController extends Controller
{
    public function __construct(private readonly ChurchDelete $action)
    {
    }

    /**
     * @throws ChurchNotDeletedException
     */
    public function __invoke(int $churchId): Response
    {
        $this->action->handle($churchId);

        return response()->noContent();
    }
}
