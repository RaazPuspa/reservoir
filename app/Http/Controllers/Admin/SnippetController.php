<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Actions\Snippets\Paginate;
use App\Actions\Snippets\Create;
use App\Actions\Snippets\Delete;
use App\Actions\Snippets\SnippetDTO;
use App\Actions\Snippets\Update;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SnippetRequest;
use App\Models\Snippet;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class SnippetController extends Controller
{
    public function index(Paginate $paginateAction): JsonResponse
    {
        return response()->json(
            $paginateAction->handle(),
            Response::HTTP_OK,
        );
    }

    public function store(SnippetRequest $request, Create $createAction): JsonResponse
    {
        try {
            $snippet = $createAction->handle(SnippetDTO::fromSnippetRequest($request));
        } catch (Throwable $throwable) {
            return response()->json([
                'error' => $throwable->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json($snippet, Response::HTTP_CREATED);
    }

    public function show(Snippet $snippet): JsonResponse
    {
        return response()->json($snippet, Response::HTTP_OK);
    }

    public function update(SnippetRequest $request, Snippet $snippet, Update $updateAction): JsonResponse
    {
        try {
            $snippet = $updateAction->handle($snippet, SnippetDTO::fromSnippetRequest($request));
        } catch (Throwable $throwable) {
            return response()->json([
                'error' => $throwable->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json($snippet, Response::HTTP_OK);
    }

    public function destroy(Snippet $snippet, Delete $deleteAction): JsonResponse
    {
        $deleteAction->handle($snippet);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
