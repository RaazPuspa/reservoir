<?php

declare(strict_types=1);

namespace App\Actions\Snippets;

use App\Models\Snippet;

class Delete
{
    public function handle(Snippet $snippet): void
    {
        $snippet->delete();
    }
}
