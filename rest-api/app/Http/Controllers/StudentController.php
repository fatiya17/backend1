<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();

        $data = [
            'message' => 'get all resource student',
            'data' => $student
        ];

        return response()->json($data,200);
    }

    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $students = Student::create($input);

        $data = [
            'message' => 'Student is create success!!',
            'data' => $students,
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
{
    // Cari mahasiswa berdasarkan ID
    $student = Student::find($id);

    if ($student) {
        // Lakukan update data mahasiswa
        $student->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ]);

        $data = [
            'message' => 'Student updated successfully!',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }
    return response()->json(['message' => 'Student not found!'], 404);}

    public function destroy($id)
{
    // Cari mahasiswa berdasarkan ID
    $student = Student::find($id);

    if ($student) {
        // Hapus mahasiswa
        $student->delete();

        $data = [
            'message' => 'Student deleted successfully! {id}',
        ];

        return response()->json($data, 200);
    }

    return response()->json(['message' => 'Student not found!'], 404);
}


}