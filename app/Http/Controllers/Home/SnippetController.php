<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Actions\Snippets\Paginate;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SnippetController extends Controller
{
    public function index(Paginate $paginateAction): Application|Factory|View
    {
        return view('home.snippets')
            ->with('snippets', $paginateAction->handle());
    }
}
