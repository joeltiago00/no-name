<?php

return [
    \Repositories\User\UserRepository::class => \Repositories\User\UserEloquentRepository::class,
    \Repositories\Post\PostRepository::class => \Repositories\Post\PostEloquentRepository::class,
    \Repositories\PostFile\PostFileRepository::class => \Repositories\PostFile\PostFileEloquentRepository::class,
    \Repositories\PostLike\PostLikeRepository::class => \Repositories\PostLike\PostLikeEloquentRepository::class,
    \Repositories\EmailConfirmation\EmailConfirmationRepository::class => \Repositories\EmailConfirmation\EmailConfirmationEloquentRepository::class,
    \Repositories\Church\ChurchRepository::class => \Repositories\Church\ChurchEloquentRepository::class,
    \Repositories\History\HistoryRepository::class => \Repositories\History\HistoryEloquentRepository::class,
];
