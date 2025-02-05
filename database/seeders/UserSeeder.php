<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "admin",
            'role_id' => Role::where('name','admin')->first()->value('id'),
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'email' => 'admin@hgallery.com',
            'address' => 'Hgallery',
        ]);

        $json = base_path('database\seeders\data\user.json');

        $data = json_decode(File::get($json), true);

        $role = Role::where('name','user')->first()->value('id');

        foreach ($data as $d) {
            User::create([
                'name' => $d['name'],
                'role_id' => $role,
                'username' => $d['username'],
                'password' => bcrypt($d['password']),
                'email' => $d['email'],
                'address' => $d['address'],
            ]);
        }

    }
}
