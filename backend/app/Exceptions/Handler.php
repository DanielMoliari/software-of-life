<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e)
    {
        // Resposta JSON para APIs
        if ($request->expectsJson()) {

            // Validação
            if ($e instanceof ValidationException) {
                return response()->json([
                    'message' => 'Erro de validação.',
                    'errors' => $e->errors(),
                ], 422);
            }

            // Não encontrado (Model)
            if ($e instanceof ModelNotFoundException) {
                $model = class_basename($e->getModel());
                return response()->json([
                    'message' => "Nenhum registro encontrado para {$model}.",
                ], 404);
            }

            // Autenticação
            if ($e instanceof AuthenticationException) {
                return response()->json([
                    'message' => 'Não autenticado.',
                ], 401);
            }

            // Outras HTTP exceptions (403, 404, etc)
            if ($e instanceof HttpExceptionInterface) {
                return response()->json([
                    'message' => $e->getMessage() ?: 'Erro HTTP',
                ], $e->getStatusCode());
            }

            // Erro interno
            return response()->json([
                'message' => 'Erro interno no servidor.',
                'exception' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }

        return parent::render($request, $e);
    }
}