<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view ('grade.all', [
            "title" => "Grades",
            "grades" => Kelas::all(),
        ]);
    }

    public function create() {
        return view ('grade.create', [
            'title' => 'Add Data',
            'grades' => Kelas::all()
        ]);
    }

    public function add(Request $request) {
        $validateData = $request->validate([
            "kelas_siswa" => "required"
        ]);

        $result = Kelas::create($validateData);
        if($result) {
            return redirect('/grade/all')->with('success', 'Data kelas berhasil ditambahkan');
        }
    }

    public function edit(Kelas $kelas) 
    {
        return view('grade.edit', [
            'title' => 'Edit Data',
            'grade' => $kelas
        ]);
    }

    public function update(Request $request, Kelas $kelas) {
        $validateData = $request->validate([
            "kelas_siswa" => "required",
        ]);

        $result = Kelas::where('id', $kelas->id)->update($validateData);
        if($result) {
            return redirect('/grade/all')->with('success', 'Data kelas berhasil diubah !');
        }
    }

    public function destroy(Kelas $kelas) 
    {
        $result = Kelas::destroy($kelas->id);
        
        if($result) {
            return redirect('/grade/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function show($kelas)
    {
        return view ('grade.detail', [
            'title' => 'detail-gride',
            'grade' => Kelas::find($kelas)
        ]);
    }
}
