<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use NoName\Auth\Logout;

class LogoutController extends Controller
{
    public function __construct(private readonly Logout $action)
    {
    }

    /**
     * Logout
     *
     * Make user logout
     *
     * @responseFile ApiResponses/Auth/logout.json
     * @group        Auth
     */
    public function __invoke(Request $request): Response
    {
        $this->action->handle($request->user());

        return response()->noContent();
    }
}
