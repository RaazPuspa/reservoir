<?php

declare(strict_types=1);

namespace App\Actions\Files;

use App\Http\Requests\Admin\FileRequest;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Throwable;

class FileDTO
{
    public function __construct(
        private readonly string $title,
        private readonly string $path,
        private readonly string $name,
        private readonly int $size,
    ) {
    }

    /**
     * @throws Throwable
     */
    public static function fromFileRequest(FileRequest $request): FileDTO
    {
        /** @var UploadedFile $attachment */
        $attachment = $request->validated('attachment');

        throw_unless(
            $attachmentPath = $attachment->store('files', ['disk' => 'public']),
            ServiceUnavailableHttpException::class,
            ['message' => trans('exceptions.files.upload')],
        );

        return new self(
            $request->validated('title'),
            $attachmentPath,
            $attachment->getClientOriginalName(),
            $attachment->getSize(),
        );
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
