<?php

use Illuminate\Support\Facades\Hash;
use App\Models\User;

// Autoload dan bootstrap Laravel
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

// Jalankan bootstrap kernel Laravel supaya bisa akses model dan Facades
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Ganti sesuai email admin kamu
$emailAdmin = 'admin@rumohaneuk.com';

// Ganti sesuai password baru yang kamu mau
$passwordBaru = 'Admin123';

$user = User::where('email', $emailAdmin)->first();

if ($user) {
    $user->password = Hash::make($passwordBaru);
    $user->save();
    echo "Password user dengan email {$emailAdmin} berhasil diupdate.\n";
} else {
    echo "User dengan email {$emailAdmin} tidak ditemukan.\n";
}
