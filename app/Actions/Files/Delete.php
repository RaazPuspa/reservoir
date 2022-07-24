<?php

declare(strict_types=1);

namespace App\Actions\Files;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class Delete
{
    public function handle(File $file): void
    {
        Storage::disk('local')->delete($file->path);
        $file->delete();
    }
}
