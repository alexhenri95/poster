<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = User::create([
            'name' => 'Alex Joel Henriquez Suarez',
            'email' => 'alex.henriquez@gmail.com',
            'nickname' => 'alexhenri95',
            'slug' => Str::slug('alexhenri95'),
            'password' => bcrypt('123456789'),
        ]);

        $user = User::create([
            'name' => 'Pedro Gonzalez',
            'email' => 'jorge.gonzalez@gmail.com',
            'nickname' => 'pedroGonzalez',
            'slug' => Str::slug('pedroGonzalez'),
            'password' => bcrypt('123456789'),
        ]);

        $user = User::create([
            'name' => 'Jorge Martinez',
            'email' => 'jorge.martinez@gmail.com',
            'nickname' => 'jorgeMartin',
            'slug' => Str::slug('jorgeMartin'),
            'password' => bcrypt('123456789'),
        ]);

        $user = User::create([
            'name' => 'Ana Figueroa',
            'email' => 'ana.figueroa@gmail.com',
            'nickname' => 'anafigueroa',
            'slug' => Str::slug('anafigueroa'),
            'password' => bcrypt('123456789'),
        ]);
    }
}
