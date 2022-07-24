<?php

declare(strict_types=1);

namespace App\Actions\Files;

use App\Models\File;

class Create
{
    public function handle(FileDTO $attributes): File
    {
        /** @var File $file */
        $file = File::query()->create([
            'path' => $attributes->getPath(),
            'title' => $attributes->getTitle(),
            'size' => $attributes->getSize(),
            'name' => $attributes->getName(),
        ]);

        return $file;
    }
}
