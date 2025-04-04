<?php

namespace App\Modules\Users\Repositories;

use App\Modules\Users\DTOs\CriarUsuarioDTO;
use App\Modules\Users\DTOs\AtualizarUsuarioDTO;
use App\Modules\Users\Models\User;
use Illuminate\Support\Collection;

class UserRepository
{
    public function criar(CriarUsuarioDTO $dto): User
    {
        return User::create([
            'nome' => $dto->nome,
            'sobrenome' => $dto->sobrenome,
        ]);
    }

    public function atualizar(User $usuario, AtualizarUsuarioDTO $dto): User
    {
        $usuario->update([
            'nome' => $dto->nome,
            'sobrenome' => $dto->sobrenome,
        ]);

        return $usuario;
    }

    public function remover(User $usuario): bool
    {
        return $usuario->delete();
    }

    public function buscarTodos(): Collection
    {
        return User::all();
    }

    public function buscarPorId(int $id): ?User
    {
        return User::find($id);
    }
}