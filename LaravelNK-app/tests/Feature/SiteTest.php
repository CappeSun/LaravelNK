<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiteTest extends TestCase
{
    use RefreshDatabase;
        
    public function test_add_site()
    {
        $this->withoutMiddleware();

        $user = new User();
        $user->name = 'Harry Hill';
        $user->email = 'harry@hill.com';
        $user->password = Hash::make('RTG');
        $user->save();

        $this->actingAs($user)->post('punishments/add', ['name' => 'Test Punishment']);

        $this->actingAs($user)->post('sites/add', ['siteName' => 'Test Site', 'url' => 'https://test.com', 'punishment' => 1]);

        $this->assertDatabaseHas('sites', ['name' => 'Test Site']);
    }
        
    public function test_update_site()
    {
        $this->withoutMiddleware();

        $user = new User();
        $user->name = 'Harry Hill';
        $user->email = 'harry@hill.com';
        $user->password = Hash::make('RTG');
        $user->save();

        $this->actingAs($user)->post('punishments/add', ['name' => 'Test Punishment']);

        $this->actingAs($user)->post('sites/add', ['siteName' => 'Test Site', 'url' => 'https://test.com', 'punishment' => 1]);

        $this->actingAs($user)->post('sites/update/1', ['updSiteName' => 'Updated Site', 'updUrl' => null, 'updPunishment' => null]);

        $this->assertDatabaseHas('sites', ['name' => 'Updated Site']);
    }
        
    // public function test_delete_site()
    // {
    //     $this->withoutMiddleware();

    //     $user = new User();
    //     $user->name = 'Harry Hill';
    //     $user->email = 'harry@hill.com';
    //     $user->password = Hash::make('RTG');
    //     $user->save();

    //     $this->actingAs($user)->post('punishments/add', ['name' => 'Test Punishment']);

    //     $this->actingAs($user)->post('sites/add', ['siteName' => 'Test Site', 'url' => 'https://test.com', 'punishment' => 1]);

    //     $this->assertDatabaseHas('sites', ['name' => 'Test Site']);
    // }
}