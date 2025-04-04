<?php

namespace App\Modules\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Users\DTOs\AtualizarUsuarioDTO;

class AtualizarUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
        ];
    }

    public function toDTO(): AtualizarUsuarioDTO
    {
        return new AtualizarUsuarioDTO(
            nome: $this->input('nome'),
            sobrenome: $this->input('sobrenome')
        );
    }
}
