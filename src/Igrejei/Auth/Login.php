<?php

namespace Igrejei\Auth;

use App\Models\User;
use Igrejei\Auth\Exceptions\InvalidCredentialsException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class Login
{
    /**
     * @throws InvalidCredentialsException
     */
    public function handle(array $data): Authenticatable
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            throw new InvalidCredentialsException();
        }

        /** @var User $user */
        $user = Auth::user();

        $token = $user->createToken('jwt');

        $user->token = $token->plainTextToken;

        return $user;
    }
}
