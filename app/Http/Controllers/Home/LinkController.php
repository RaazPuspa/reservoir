<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Actions\Links\Paginate;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class LinkController extends Controller
{
    public function index(Paginate $paginateAction): Application|Factory|View
    {
        return view('home.links')
            ->with('links', $paginateAction->handle());
    }
}
