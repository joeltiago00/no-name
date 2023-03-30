<?php

namespace App\Http\Controllers\User\Email;

use App\Http\Controllers\Controller;
use Igrejei\User\Email\SendEmailConfirmation;
use Illuminate\Http\Response;

class SendEmailConfirmationController extends Controller
{
    public function __construct(private readonly SendEmailConfirmation $action)
    {
    }

    public function __invoke(int $userId): Response
    {
        $this->action->handle($userId);

        return response()->noContent();
    }
}
