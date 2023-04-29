<?php

namespace NoName\User\Email;

use Illuminate\Support\Facades\DB;
use Repositories\EmailConfirmation\EmailConfirmationRepository;
use Repositories\User\UserRepository;

readonly class EmailConfirmation
{
    public function __construct(
        private EmailConfirmationRepository $emailConfirmationRepository,
        private UserRepository $userRepository
    ) {
    }

    public function handle(string $code): void
    {
        DB::transaction(function () use ($code) {
            $emailConfirmation = $this->emailConfirmationRepository
                ->getByValidCode($code);

            $this->emailConfirmationRepository
                ->setConfirmedAt($emailConfirmation);

            $user = $this->userRepository
                ->findById($emailConfirmation->user_id);

            $this->userRepository
                ->confirmEmail($user);
        });
    }
}
