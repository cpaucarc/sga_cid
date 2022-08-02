<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('password');

        /* User Administrador */
        User::create([
            'name' => 'FLOYD GOMEZ',
            'email' => 'prueba@mail.com',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10),
            'esta_activo' => 1,
            'persona_id' => 3,
        ]);
        /* User Secretaria */
        User::create([
            'name' => 'LAURA VARGAS',
            'email' => 'secretaria@mail.com',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10),
            'esta_activo' => 1,
            'persona_id' => 4,
        ]);
    }
}
