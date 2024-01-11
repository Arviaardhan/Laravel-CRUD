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
            "nis" => "required|max:255",
            "nama" => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas" => "required",
            "alamat" => "required",
        ]);
        Student::create($validateData);

        return redirect('/student/all')->with('success', 'Data siswa berhasil ditambahkan');
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
