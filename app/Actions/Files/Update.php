<?php

declare(strict_types=1);

namespace App\Actions\Files;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Throwable;

class Update
{
    /**
     * @throws Throwable
     */
    public function handle(File $file, FileDTO $attributes): File
    {
        Storage::disk('local')->delete($file->path);

        $file->update([
            'path' => $attributes->getPath(),
            'title' => $attributes->getTitle(),
            'size' => $attributes->getSize(),
            'name' => $attributes->getName(),
        ]);

        return $file;
    }
}
