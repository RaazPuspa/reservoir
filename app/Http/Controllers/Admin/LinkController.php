<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Actions\Links\Paginate;
use App\Actions\Links\Create;
use App\Actions\Links\Delete;
use App\Actions\Links\LinkDTO;
use App\Actions\Links\Update;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LinkRequest;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class LinkController extends Controller
{
    public function index(Paginate $paginateAction): JsonResponse
    {
        return response()->json(
            $paginateAction->handle(),
            Response::HTTP_OK,
        );
    }

    public function store(LinkRequest $request, Create $createAction): JsonResponse
    {
        try {
            $link = $createAction->handle(LinkDTO::fromLinkRequest($request));
        } catch (Throwable $throwable) {
            return response()->json([
                'error' => $throwable->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json($link, Response::HTTP_CREATED);
    }

    public function show(Link $link): JsonResponse
    {
        return response()->json($link, Response::HTTP_OK);
    }

    public function update(LinkRequest $request, Link $link, Update $updateAction): JsonResponse
    {
        try {
            $link = $updateAction->handle($link, LinkDTO::fromLinkRequest($request));
        } catch (Throwable $throwable) {
            return response()->json([
                'error' => $throwable->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json($link, Response::HTTP_OK);
    }

    public function destroy(Link $link, Delete $deleteAction): JsonResponse
    {
        $deleteAction->handle($link);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
