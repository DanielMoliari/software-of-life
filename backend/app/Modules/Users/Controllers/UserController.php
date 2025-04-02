<?php

namespace App\Modules\Users\Controllers;

use App\Modules\Users\Services\UserService;
use App\Modules\Users\Requests\CriarUsuarioRequest;
use Illuminate\Http\JsonResponse;

class UserController
{
    public function __construct(protected UserService $service) {}

    public function store(CriarUsuarioRequest $request): JsonResponse
    {
        $usuario = $this->service->criar($request->toDTO());
        return response()->json($usuario);
    }
}