<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $this->withoutMiddleware();

        $user = new User();
        $user->name = 'Harry Hill';
        $user->email = 'harry@hill.com';
        $user->password = Hash::make('RTG');

        $response = $this->followingRedirects()->post('login', ['email' => 'harry@hill.com', 'password' => 'RTG']);

        $response->assertSeeText('Hello there, Harry Hill!');
    }
}