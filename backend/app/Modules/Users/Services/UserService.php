<?php

namespace App\Modules\Users\Services;

use App\Modules\Users\DTOs\CriarUsuarioDTO;
use App\Modules\Users\Repositories\UserRepository;

class UserService
{
    public function __construct(protected UserRepository $repository) {}

    public function criar(CriarUsuarioDTO $dto)
    {
        return $this->repository->criar($dto);
    }
}