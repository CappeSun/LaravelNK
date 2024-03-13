<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PunishmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_punishment()
    {
        $this->withoutMiddleware();

        $user = new User();
        $user->name = 'Harry Hill';
        $user->email = 'harry@hill.com';
        $user->password = Hash::make('RTG');

        $this->actingAs($user)->post('punishments/add', ['name' => 'Test Punishment']);

        $this->assertDatabaseHas('punishments', ['name' => 'Test Punishment']);
    }
}