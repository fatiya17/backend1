<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); // Ubah nama variabel menjadi plural

        $data = [
            'message' => 'Mendapatkan semua data siswa', // Mengubah pesan untuk lebih informatif
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:students',
            'email' => 'required|email|max:255|unique:students',
            'jurusan' => 'required|string|max:255',
        ]);

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'Siswa berhasil dibuat!',
            'data' => $student,
        ];

        return response()->json($data, 201); // Gunakan 201 untuk pembuatan sumber daya
    }
}
