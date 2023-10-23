<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert() {
        $result = DB::insert('insert into mahasiswa (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?, ?)', ['2226250047', 'Wijaya Michael', 'Palembang', '2000-01-01', 'Jl Rajawali', now()]);
        dump($result);
    }

    public function update() {
        $result = DB::update('update mahasiswa set nama_mahasiswa = "Ali", updated_at = now() where npm = ?', ['2226250047']);
        dump($result);
    }

    public function delete() {
        $result = DB::delete('delete from mahasiswa where npm = ?', ['2226250047']);
        dump($result);
    }

    public function select() {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswa');
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertQb() {
        $result = DB::table('mahasiswa')->insert(
            [
                'npm'=> '2226250048',
                'nama_mahasiswa' => 'Michael',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2001-02-02',
                'alamat' => 'Jl Soedirman',
                'created_at' => now()
            ]
        );
        dump($result);
    }

    public function updateQb() {
        $result = DB::table('mahasiswa')
            ->where('npm', '2226250048')
            ->update(
                [
                    'nama_mahasiswa' => 'usni',
                    'updated_at' => now()
                ]
            );
        dump($result);
    }

    public function deleteQb() {
        $result = DB::table('mahasiswa')
            ->where('npm', '=', '2226250048')
            ->delete();
        dump($result);
    }

    public function selectQb() {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswa')->get();
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertElq() {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->npm = '2226250049';
        $mahasiswa->nama_mahasiswa = 'Zainab';
        $mahasiswa->tempat_lahir = 'Bandung';
        $mahasiswa->tanggal_lahir = '2022-03-03';
        $mahasiswa->alamat = 'Jl bambang utoyo';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function updateElq() {
        $mahasiswa = Mahasiswa::where('npm', '2226250049')->first();
        $mahasiswa->nama_mahasiswa = 'khajidah';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq() {
        $mahasiswa = Mahasiswa::where('npm', '2226250049')->first();
        $mahasiswa->delete();
        dump($mahasiswa);
    }

    public function selectElq() {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }
}
