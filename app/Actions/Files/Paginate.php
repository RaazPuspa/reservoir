<?php

declare(strict_types=1);

namespace App\Actions\Files;

use App\Models\File;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Paginate
{
    public function handle(): LengthAwarePaginator
    {
        return File::query()->latest('created_at')->paginate();
    }
}
