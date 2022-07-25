<?php

declare(strict_types=1);

namespace App\Actions\Links;

use App\Models\Link;
use Throwable;

class Update
{
    /**
     * @throws Throwable
     */
    public function handle(Link $link, LinkDTO $attributes): Link
    {
        $link->update([
            'title' => $attributes->getTitle(),
            'url' => $attributes->getUrl(),
            'in_new_tab' => $attributes->getInNewTab(),
        ]);

        return $link;
    }
}
