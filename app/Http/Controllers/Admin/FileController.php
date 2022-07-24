<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Actions\Files\Create;
use App\Actions\Files\Delete;
use App\Actions\Files\FileDTO;
use App\Actions\Files\Paginate;
use App\Actions\Files\Update;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FileRequest;
use App\Models\File;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class FileController extends Controller
{
    public function index(Paginate $paginateAction): JsonResponse
    {
        return response()->json(
            $paginateAction->handle(),
            Response::HTTP_OK,
        );
    }

    public function store(FileRequest $request, Create $createAction): JsonResponse
    {
        try {
            $file = $createAction->handle(FileDTO::fromFileRequest($request));
        } catch (Throwable $throwable) {
            return response()->json([
                'error' => $throwable->getMessage(),
            ], $throwable->getCode());
        }

        return response()->json($file, Response::HTTP_CREATED);
    }

    public function show(File $file): JsonResponse
    {
        return response()->json($file, Response::HTTP_OK);
    }

    public function update(FileRequest $request, File $file, Update $updateAction): JsonResponse
    {
        try {
            $file = $updateAction->handle($file, FileDTO::fromFileRequest($request));
        } catch (Throwable $throwable) {
            return response()->json([
                'error' => $throwable->getMessage(),
            ], $throwable->getCode());
        }

        return response()->json($file, Response::HTTP_OK);
    }

    public function destroy(File $file, Delete $deleteAction): JsonResponse
    {
        $deleteAction->handle($file);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
