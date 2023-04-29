<?php

namespace Igrejei\Post;

use App\Enums\FilePathEnum;
use App\Helpers\Base64Helper;
use App\Models\Post;
use App\Models\User;
use Igrejei\Integrations\AWS\S3\DTO\S3FileDTO;
use Igrejei\Integrations\AWS\S3\S3;
use Igrejei\Post\DTO\PostDTO;
use Igrejei\Post\DTO\PostFileDTO;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Repositories\Post\PostRepository;
use Repositories\PostFile\PostFileRepository;
use Repositories\User\UserRepository;

readonly class PostStore
{
    public function __construct(
        private UserRepository $userRepository,
        private PostRepository $postRepository,
        private PostFileRepository $postFileRepository
    ) {
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
            $path = sprintf(FilePathEnum::POST->path(), $user->getKey(), $post->getKey(), Str::uuid());

            $file = S3::bucket('no-name-dev')->upload(
                new S3FileDTO($file, sprintf('%s.%s', $path, Base64Helper::getType($file)))
            );

            $dto = new PostFileDTO($file->getUrl());

            $fileUploaded = $this->postFileRepository
                ->createByPost($post, $dto);

            $filesUploaded->push($fileUploaded);
        }

        return $filesUploaded;
    }
}
