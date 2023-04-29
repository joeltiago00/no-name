<?php

namespace App\Http\Controllers\Church;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use NoName\Church\ChurchDelete;
use Noname\Church\Exceptions\ChurchNotDeletedException;

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
