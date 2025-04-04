<?php

namespace Tests\Feature\Modules\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Modules\Users\Models\User;
use PHPUnit\Framework\Attributes\Test;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function pode_listar_usuarios(): void
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/usuarios');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    #[Test]
    public function pode_criar_um_usuario(): void
    {
        $payload = ['nome' => 'Daniel', 'sobrenome' => 'Moliari'];

        $response = $this->postJson('/api/usuarios', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment($payload);

        $this->assertDatabaseHas('users', $payload);
    }

    #[Test]
    public function pode_buscar_usuario_pelo_id(): void
    {
        $user = User::factory()->create();

        $response = $this->getJson("/api/usuarios/{$user->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => $user->nome]);
    }

    #[Test]
    public function pode_atualizar_um_usuario(): void
    {
        $user = User::factory()->create();

        $update = ['nome' => 'Atualizado', 'sobrenome' => 'Novo'];

        $response = $this->putJson("/api/usuarios/{$user->id}", $update);

        $response->assertStatus(200)
                 ->assertJsonFragment($update);

        $this->assertDatabaseHas('users', $update);
    }

    #[Test]
    public function pode_deletar_um_usuario(): void
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/usuarios/{$user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
