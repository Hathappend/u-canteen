<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->id = Uuid::uuid4()->toString();
        $user->first_name = 'Asep';
        $user->last_name = 'Suryaman';
        $user->username = 'asep';
        $user->password = Hash::make('rahasia');
        $user->email = 'asep.10122004@mahasiswa.unikom.ac.id';
        $user->save();
    }
}
