<?php

namespace App\Http\Controllers\User\Email;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Email\EmailConfirmationRequest;
use Igrejei\User\Email\EmailConfirmation;
use Illuminate\Http\Response;

class EmailConfirmationController extends Controller
{
    public function __construct(private readonly EmailConfirmation $action)
    {
    }

    public function __invoke(EmailConfirmationRequest $request): Response
    {
        $this->action->handle($request->input('code'));

        return response()->noContent();
    }
}
