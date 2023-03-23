<?php

namespace Igrejei\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Repositories\Post\PostRepository;
use Repositories\PostFile\PostFileRepository;
use Repositories\User\UserRepository;

readonly class StorePost
{
    public function __construct(
        private UserRepository $userRepository,
        private PostRepository $postRepository,
        private PostFileRepository $postFileRepository
    )
    {
    }

    public function handle(int $userId, array $data): Post
    {
        $user = $this->userRepository->findById($userId);

        return $this->storePost($user, $data);
    }

    public function storePost($user, array $data): mixed
    {
        return DB::transaction(function () use ($user, $data) {
            $post = $this->postRepository->create($user, new PostDTO($data['text']));

            if (isset($data['files']) && !empty($data['files'])) {
                $files = $this->uploadFiles($data['files'], $user, $post);

                $post->files = $files;
            }

            return $post;
        });
    }

    private function uploadFiles(array $files, User $user, Post $post): Collection
    {
        $filesUploaded = collect();

        foreach ($files as $file) {
            //TODO:: create AWSS3 Service to handle with file uploads
            $path = sprintf('users/%s/post/%s/files/%s', $user->getKey(), $post->getKey(), Str::uuid());

            $dto = new PostFileDTO($path . 'link');

            $fileUploaded = $this->postFileRepository
                ->createByPost($post, $dto);

            $filesUploaded->push($fileUploaded);
        }

        return $filesUploaded;
    }
}
