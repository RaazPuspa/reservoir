<?php

declare(strict_types=1);

namespace App\Actions\Snippets;

use App\Models\Snippet;
use Throwable;

class Update
{
    /**
     * @throws Throwable
     */
    public function handle(Snippet $snippet, SnippetDTO $attributes): Snippet
    {
        $snippet->update([
            'title' => $attributes->getTitle(),
            'description' => $attributes->getDescription(),
            'code' => $attributes->getCode(),
        ]);

        return $snippet;
    }
}
