<?php

declare(strict_types=1);

namespace App\Actions\Links;

use App\Models\Link;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Paginate
{
    public function handle(): LengthAwarePaginator
    {
        return Link::query()->latest('created_at')->paginate();
    }
}
