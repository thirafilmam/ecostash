<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat objek user
        $user = new \App\Models\Pengguna;
        $user->nama_nasabah = "admin";
        $user->nomor_telepon = "08966666";
        $user->jenis_kelamin = "laki-laki";
        $user->alamat = "Batu";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('123');
        $user->level = "admin";
        $user->save();

        $user = new \App\Models\Pengguna;
        $user->nama_nasabah = "thirafi";
        $user->nomor_telepon = "0896667566";
        $user->jenis_kelamin = "laki-laki";
        $user->alamat = "Malang";
        $user->email = "thirafi@gmail.com";
        $user->password = Hash::make('123');
        $user->level = "nasabah";
        $user->save();
    }
}
