<?php

declare(strict_types=1);

namespace App\Actions\Links;

use App\Http\Requests\Admin\LinkRequest;

class LinkDTO
{
    public function __construct(
        private readonly string $title,
        private readonly string $url,
        private readonly ?bool $inNewTab,
    ) {
    }

    public static function fromLinkRequest(LinkRequest $request): LinkDTO
    {
        return new self(
            $request->validated('title'),
            $request->validated('url'),
            $request->boolean('in_new_tab'),
        );
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getInNewTab(): ?bool
    {
        return $this->inNewTab;
    }
}
