<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\DTOs\CriarUsuarioDTO;
use App\Modules\Users\DTOs\AtualizarUsuarioDTO;
use App\Modules\Users\Models\User;
use App\Modules\Users\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use App\Modules\Users\Exceptions\UsuarioNaoEncontradoException;

class UserService
{
    public function __construct(protected UserRepository $repository) {}

    public function criar(CriarUsuarioDTO $dto): User
    {
        return $this->repository->criar($dto);
    }

    public function atualizar(int $id, AtualizarUsuarioDTO $dto): User
    {
        $usuario = $this->repository->buscarPorId($id);

        if (!$usuario) {
            throw new UsuarioNaoEncontradoException($id);
        }    

        return $this->repository->atualizar($usuario, $dto);
    }

    public function remover(int $id): bool
    {
        $usuario = $this->repository->buscarPorId($id);

        if (!$usuario) {
            throw new UsuarioNaoEncontradoException($id);
        }    

        return $this->repository->remover($usuario);
    }

    public function buscarTodos(): Collection
    {
        return $this->repository->buscarTodos();
    }

    public function buscarPorId(int $id): User
{
    $usuario = $this->repository->buscarPorId($id);

    if (!$usuario) {
        throw new UsuarioNaoEncontradoException($id);
    }

    return $usuario;
    }
}