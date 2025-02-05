<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = base_path('database\seeders\data\roles.json');

        $data = json_decode(File::get($json), true);

        foreach ($data as $d) {
            Role::create([
                'name' => $d['name'],
            ]);
        }
    }
}
