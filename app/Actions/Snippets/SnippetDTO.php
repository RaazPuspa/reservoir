<?php

declare(strict_types=1);

namespace App\Actions\Snippets;

use App\Http\Requests\Admin\SnippetRequest;

class SnippetDTO
{
    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly string $code,
    ) {
    }

    public static function fromSnippetRequest(SnippetRequest $request): SnippetDTO
    {
        return new self(
            $request->validated('title'),
            $request->validated('description'),
            $request->validated('code'),
        );
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
