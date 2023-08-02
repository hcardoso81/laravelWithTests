<?php

namespace Tests;

use App\Models\User;

trait CreateUser
{
    private User $user;

    private function createNewUser(bool $is_admin = false): User
    {
        $user = User::factory()->create([
            'email' => $is_admin ? 'admin@admin.com' : 'user@user.com',
            'password' => bcrypt('12345'),
            'is_admin' => $is_admin,
        ]);
        return $user;
    }
}
