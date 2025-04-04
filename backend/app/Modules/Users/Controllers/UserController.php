<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Services\UserService;
use App\Modules\Users\Requests\CriarUsuarioRequest;
use App\Modules\Users\Requests\AtualizarUsuarioRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
    public function __construct(protected UserService $service) {}

    public function index(): JsonResponse
    {
        $usuarios = $this->service->buscarTodos();
        return response()->json($usuarios);
    }

    public function show(int $id): JsonResponse
    {
        $usuario = $this->service->buscarPorId($id);
        return response()->json($usuario);
    }

    public function store(CriarUsuarioRequest $request): JsonResponse
    {
        $usuario = $this->service->criar($request->toDTO());
        return response()->json($usuario, 201);
    }

    public function update(AtualizarUsuarioRequest $request, int $id): JsonResponse
    {
        $usuario = $this->service->atualizar($id, $request->toDTO());
        return response()->json($usuario);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->remover($id);
        return response()->json(null, 204);
    }
}