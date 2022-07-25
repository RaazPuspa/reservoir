<?php

declare(strict_types=1);

namespace App\Actions\Links;

use App\Models\Link;
use Throwable;

class Create
{
    /**
     * @throws Throwable
     */
    public function handle(LinkDTO $attributes): Link
    {
        /** @var Link $link */
        $link = Link::query()->create([
            'title' => $attributes->getTitle(),
            'url' => $attributes->getUrl(),
            'in_new_tab' => $attributes->getInNewTab(),
        ]);

        return $link;
    }
}
