<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nama' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'no_hp' => '081234567890',
            'role' => 'admin',
            'company' => 'Lorem Ipsum'
        ]);

        Admin::create([
            'nama' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'no_hp' => '081234567890',
            'role' => 'user',
            'company' => 'Lorem Ipsum'
        ]);

        Admin::create([
            'nama' => 'Pimpinan',
            'email' => 'pimpinan@pimpinan.com',
            'password' => bcrypt('pimpinan'),
            'no_hp' => '081234567890',
            'role' => 'pimpinan',
            'company' => 'Lorem Ipsum'
        ]);

        Admin::create([
            'nama' => 'Jhon',
            'email' => 'jhon@user.com',
            'password' => bcrypt('user'),
            'no_hp' => '081234567890',
            'role' => 'user',
            'company' => 'Lorem Ipsum'
        ]);

        Admin::create([
            'nama' => 'Doe',
            'email' => 'doe@user.com',
            'password' => bcrypt('user'),
            'no_hp' => '081234567890',
            'role' => 'user',
        ]);
    }
}
