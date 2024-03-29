<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dosen', function () {
    return view('dosen');
});

Route::get("/dosen/index", function() {
        return view('dosen.index');
});

Route::get('/fakultas', function() {
//  return view('fakultas.index', ["ilkom" => "Fakultas ilmu Komputer dan Rekayasa"]);
//  return view('fakultas.index', ["fakultas" => ["Fakultas Ilmu dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
//  return view('fakultas.index') -> with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas ilmu Ekonomi"]);
    $fakultas = ["Fakultas ilmu komputer dan Rekayasa", "Fakultas ilmu Ekonomi"];
    $kampus = "Universitas Multi Data Palembang";
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

// //toute with param (wajib)
// Route::get('/mahasiswa/{nama}', function ($nama = "Michael") {
//     echo "<h1>Nama Saya $nama</h1>";
// });

// //toute with param (tidak wajib)
// Route::get('/mahasiswa/{nama?}', function ($nama = "Michael") {
//     echo "<h1>Nama Saya $nama</h1>";
// });

// //toute with param > 1
// Route::get('/mahasiswa/{nama?}/{pekerjaan?}', function ($nama = "Michael", $pekerjaan = "Mahasiswa") {
//     echo "<h1>Nama Saya $nama. Saya adalah seorang $pekerjaan</h1>";
// });

//redirect
Route::get('/hubungi', function () {
    echo "<h1>Hubungi Kami</h1>";
})->name("call");

Route::Redirect("/contact", "/hubungi");

Route::get('/profile', function () {
   echo "<a href='". route('call') . "'>" . route('call'). "</a>";
});

//route group
//memudahkan pengelkompokan route per modul
Route::prefix("/dosen")->group(function(){
    Route::get("/jadwal", function() {
        echo "<h1>Jadwal Dosen</h1>";
    });
    Route::get("/materi", function() {
        echo "<h1>Materi Perkuliahan</h1>";
    });
    //dan lain2
});

Route::get('/prodi', [ProdiController::class, 'index']);

Route::resource("/kurikulum", KurikulumController::class);

Route::apiResource("/dosen", DosenController::class);

Route::get('/mahasiswa/insert', [MahasiswaController::class, 'insert']);

Route::get('/mahasiswa/update', [MahasiswaController::class, 'update']);

Route::get('/mahasiswa/delete', [MahasiswaController::class, 'delete']);

Route::get('/mahasiswa/select', [MahasiswaController::class, 'select']);

Route::get('mahasiswa/insert-qb', [MahasiswaController::class, 'insertQb']);

Route::get('mahasiswa/update-qb', [MahasiswaController::class, 'updateQb']);

Route::get('mahasiswa/delete-qb', [MahasiswaController::class, 'deleteQb']);

Route::get('mahasiswa/select-qb', [MahasiswaController::class, 'selectQb']);

Route::get('/mahasiswa/insert-elq', [MahasiswaController::class, 'insertElq']);

Route::get('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);

Route::get('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);

Route::get('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);
