<?php

namespace App\Modules\Users\DTOs;

class CriarUsuarioDTO
{
    public function __construct(
        public string $nome,
        public string $sobrenome
    ) {}
}