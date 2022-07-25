<?php

declare(strict_types=1);

namespace App\Actions\Snippets;

use App\Models\Snippet;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Paginate
{
    public function handle(): LengthAwarePaginator
    {
        return Snippet::query()->latest('created_at')->paginate();
    }
}
