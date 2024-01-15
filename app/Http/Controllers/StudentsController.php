<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function create() {
        return view ('student.create', [
            'title' => 'Add Data',
        ]);
    }

    public function add(Request $request) {
        $validateData = $request->validate([
            "nis"           => "required|max:255",
            "nama"          => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas"         => "required",
            "alamat"        => "required",
        ]);

        $result = Student::create($validateData);
        if($result) {
            return redirect('/student/all')->with('success', 'Data siswa berhasil ditambahkan');
        }
    }

    public function edit(Student $student) 
    {
        return view('student.edit', [
            'title' => 'Edit Data',
            'student' => $student
        ]);
    }

    public function update(Request $request, Student $student) {
        $validateData = $request->validate([
            "nis"           => "required|max:255",
            "nama"          => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas"         => "required",
            "alamat"        => "required",
        ]);

        $result = Student::where('id', $student-> id)->update($validateData);
        if($result) {
            return redirect('/student/all')->with('success', 'Data siswa berhasil diubah !');
        }
    }

    public function destroy(Student $student) 
    {
        $result = Student::destroy($student->id);
        
        if($result) {
            return redirect('/student/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function index()
    {
        return view ('student.all', [
            "title" => "Students",
            "students" => Student::all(),
        ]);
    }

    public function show($student)
    {
        return view ('student.detail', [
            'title' => 'detail-student',
            'student' => Student::find($student)
        ]);
    }
}
