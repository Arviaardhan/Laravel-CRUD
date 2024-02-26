<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function all()
    {

        return view('dashboard.all.all', [
            "title" => "Dashboard"
        ]);
    }

    public function studentAll()
    {

        $students = Student::paginate(5);

        return view ('dashboard.student.all', [
            "title" => "Students",
            "students" => $students,
        ]);
    }


    public function studentSearch(Request $request)
    {

        $search = $request->input('search');

        $students = Student::where('nama', 'LIKE', "%$search%")
                           ->orWhere('nis', 'LIKE', "%$search%")
                           ->paginate(5); // Mengatur pagination menjadi 5

        return view('dashboard.student.all', [
            'title' => 'Students',
            'students' => $students,
        ]);
    }

    public function studentShow($student)
    {

        return view ('dashboard.student.detail', [
            'title' => 'detail-student',
            'student' => Student::find($student)
        ]);
    }
    
    public function studentCreate() 
    {
        return view ('dashboard.student.create', [
            'title' => 'Add Data',
            'grades' => Kelas::all()
        ]);
    }

    public function studentAdd(Request $request) 
    {
        $validateData = $request->validate([
            "nis"           => "required|max:255",
            "nama"          => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas_id"      => "required",
            "alamat"        => "required",
        ]);
    
        $dataNis = Student::where('nis',$validateData['nis'])->first();
        if ($dataNis) {
            return back()->withInput()->with('errorNis', 'NIS Siswa sudah terdaftar');
        }

        $result = Student::create($validateData);

        if($result) {
            return redirect('dashboard/student/all')->with('success', 'Data siswa berhasil ditambahkan');
        }
    }

    public function studentEdit(Student $student) 
    {
        return view('dashboard.student.edit', [
            'title' => 'Edit Data',
            'student' => $student,
            'grades' => Kelas::all(),
        ]);
    }

    public function studentUpdate(Request $request, Student $student) 
    {
        $validateData = $request->validate([
            "nis"           => "required|max:255",
            "nama"          => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas_id"      => "required",
            "alamat"        => "required",
        ]);

        $result = Student::where('id', $student-> id)->update($validateData);
        if($result) {
            return redirect('dashboard/student/all')->with('success', 'Data siswa berhasil diubah !');
        }
    }

    public function studentDestroy(Student $student) 
    {
        $result = Student::destroy($student->id);
        
        if($result) {
            return redirect('dashboard/student/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function gradeAll()
    {
        return view ('dashboard.grade.all', [
            "title" => "Grades",
            "grades" => Kelas::all(),
        ]);
    }

    public function gradeSearch(Request $request)
    {
        $search = $request->input('search');

        $kelas = Kelas::where('kelas_siswa', 'LIKE', "%$search%")
                           ->get();

        return view('dashboard.grade.all', [
            'title' => 'Grades',
            'grades' => $kelas,
        ]);
    }

    public function gradeCreate() 
    {
        return view ('dashboard.grade.create', [
            'title' => 'Add Data',
            'grades' => Kelas::all()
        ]);
    }

    public function gradeAdd(Request $request) 
    {
        $validateData = $request->validate([
            "kelas_siswa" => "required"
        ]);

        $result = Kelas::create($validateData);
        if($result) {
            return redirect('dashboard/grade/all')->with('success', 'Data kelas berhasil ditambahkan');
        }
    }

    public function gradeEdit(Kelas $kelas) 
    {
        return view('dashboard.grade.edit', [
            'title' => 'Edit Data',
            'grade' => $kelas
        ]);
    }

    public function gradeUpdate(Request $request, Kelas $kelas) 
    {
        $validateData = $request->validate([
            "kelas_siswa" => "required",
        ]);

        $result = Kelas::where('id', $kelas->id)->update($validateData);
        if($result) {
            return redirect('dashboard/grade/all')->with('success', 'Data kelas berhasil diubah !');
        }
    }

    public function gradeDestroy(Kelas $kelas) 
    {
        $result = Kelas::destroy($kelas->id);
        
        if($result) {
            return redirect('dashboard/grade/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function gradeShow($kelas)
    {
        return view ('dashboard.grade.detail', [
            'title' => 'detail-gride',
            'grade' => Kelas::find($kelas)
        ]);
    }
}
