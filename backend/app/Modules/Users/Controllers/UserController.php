<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Services\UserService;
use App\Modules\Users\Requests\CriarUsuarioRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
    public function __construct(protected UserService $service) {}

    // GET /api/usuarios
    public function index(): JsonResponse
    {
        return response()->json($this->service->listar());
    }

    // POST /api/usuarios
    public function store(CriarUsuarioRequest $request): JsonResponse
    {
        $usuario = $this->service->criar($request->toDTO());
        return response()->json($usuario, 201);
    }

    // GET /api/usuarios/{id}
    public function show(int $id): JsonResponse
    {
        return response()->json($this->service->buscarPorId($id));
    }

    // PUT /api/usuarios/{id}
    public function update(Request $request, int $id): JsonResponse
    {
        // Aqui você pode criar um UpdateUsuarioRequest com validações específicas
        $usuario = $this->service->atualizar($id, $request->only(['nome', 'sobrenome']));
        return response()->json($usuario);
    }

    // DELETE /api/usuarios/{id}
    public function destroy(int $id): JsonResponse
    {
        $this->service->deletar($id);
        return response()->json(null, 204);
    }
}