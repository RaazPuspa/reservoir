<?php

declare(strict_types=1);

namespace App\Actions\Snippets;

use App\Models\Snippet;
use Throwable;

class Create
{
    /**
     * @throws Throwable
     */
    public function handle(SnippetDTO $attributes): Snippet
    {
        /** @var Snippet $snippet */
        $snippet = Snippet::query()->create([
            'title' => $attributes->getTitle(),
            'description' => $attributes->getDescription(),
            'code' => $attributes->getCode(),
        ]);

        return $snippet;
    }
}
