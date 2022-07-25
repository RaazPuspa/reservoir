<?php

declare(strict_types=1);

namespace App\Actions\Links;

use App\Models\Link;

class Delete
{
    public function handle(Link $link): void
    {
        $link->delete();
    }
}
