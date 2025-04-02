<?php

namespace App\Modules\Users\Repositories;

use App\Modules\Users\DTOs\CriarUsuarioDTO;
use App\Modules\Users\Models\User;

class UserRepository
{
    public function criar(CriarUsuarioDTO $dto): User
    {
        return User::create((array) $dto);
    }
}