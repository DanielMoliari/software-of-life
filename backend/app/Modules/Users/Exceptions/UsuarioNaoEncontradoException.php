<?php

namespace App\Modules\Users\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsuarioNaoEncontradoException extends NotFoundHttpException
{
    public function __construct(int $id)
    {
        parent::__construct("Usuário com ID {$id} não encontrado.");
    }
}