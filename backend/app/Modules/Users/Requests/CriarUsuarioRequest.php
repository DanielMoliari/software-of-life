<?php

namespace App\Modules\Users\Requests;

use App\Modules\Users\DTOs\CriarUsuarioDTO;
use Illuminate\Foundation\Http\FormRequest;

class CriarUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'sobrenome' => ['required', 'string'],
        ];
    }

    public function toDTO(): CriarUsuarioDTO
    {
        return new CriarUsuarioDTO(
            nome: $this->input('nome'),
            sobrenome: $this->input('sobrenome')
        );
    }
}