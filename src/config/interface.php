<?php

return [
    \Repositories\User\UserRepository::class => \Repositories\User\UserEloquentRepository::class,
    \Repositories\Post\PostRepository::class => \Repositories\Post\PostEloquentRepository::class,
    \Repositories\PostFile\PostFileRepository::class => \Repositories\PostFile\PostFileEloquentRepository::class,
    \Repositories\PostLike\PostLikeRepository::class => \Repositories\PostLike\PostLikeEloquentRepository::class,
    \Repositories\EmailConfirmation\EmailConfirmationRepository::class => \Repositories\EmailConfirmation\EmailConfirmationEloquentRepository::class,
];
