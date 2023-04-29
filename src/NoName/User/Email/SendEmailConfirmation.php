<?php

namespace NoName\User\Email;

use App\Mail\User\Email\SendEmailConfirmationMail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use NoName\User\DTO\SendEmailConfirmationDTO;
use Repositories\EmailConfirmation\EmailConfirmationRepository;
use Repositories\User\UserRepository;

readonly class SendEmailConfirmation
{
    public function __construct(
        private UserRepository $userRepository,
        private EmailConfirmationRepository $emailConfirmationRepository
    ) {
    }

    public function handle(int $userId): void
    {
        $user = $this->userRepository
            ->findById($userId);

        DB::transaction(function () use ($user) {
            $dto = new SendEmailConfirmationDTO(
                Str::uuid()->toString(),
                Carbon::now()
                    ->addMinutes(config('app.ttl_email_confirmation'))
                    ->format('Y-m-d H:i:s')
            );

            $emailConfirmation = $this->emailConfirmationRepository
                ->createByUser($user, $dto);

            Mail::to($user->email)
                ->send(new SendEmailConfirmationMail(
                    $user->toArray(),
                    $emailConfirmation->code
                ));
        });
    }
}
