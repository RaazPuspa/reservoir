<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Actions\Files\Paginate;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class FileController extends Controller
{
    public function index(Paginate $paginateAction): Application|Factory|View
    {
        return view('home.files')
            ->with('files', $paginateAction->handle());
    }
}
