<?php

namespace App\Modules\Users\DTOs;

class AtualizarUsuarioDTO
{
    public function __construct(
        public readonly string $nome,
        public readonly string $sobrenome,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            nome: $data['nome'],
            sobrenome: $data['sobrenome'],
        );
    }
}