<?php

return [
    \Repositories\User\UserRepository::class => \Repositories\User\UserEloquentRepository::class,
    \Repositories\Post\PostRepository::class => \Repositories\Post\PostEloquentRepository::class,
    \Repositories\PostFile\PostFileRepository::class => \Repositories\PostFile\PostFileEloquentRepository::class
];
