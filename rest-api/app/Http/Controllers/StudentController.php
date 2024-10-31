<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();

        if ($student->isEmpty()) {
            $data = [
                'message' => 'No students found',
                'data' => []
            ];
            return response()->json($data, 200);
        }
        
        $data = [
            'message' => 'get all resource student',
            'data' => $student
        ];

        return response()->json($data,200);
    }

    public function store(Request $request)
{
    try {
        // Validasi input dengan pesan kustom
        $validated = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|numeric|unique:students,nim',
            'email' => 'required|email|unique:students,email',
            'jurusan' => 'required|string',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'jurusan.required' => 'Jurusan harus diisi.',
        ]);

        // Jika validasi berhasil, buat data student baru
        $student = Student::create($validated);

        // Respons sukses
        $data = [
            'message' => 'Student created successfully!',
            'data' => $student,
        ];

        return response()->json($data, 201);
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Respons jika validasi gagal
        return response()->json([
            'message' => 'Validation error',
            'errors' => $e->errors()
        ], 422);
    }
}


public function update(Request $request, $id)
{
    try {
        // Cari mahasiswa berdasarkan ID
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found!'], 404);
        }

        // Validasi data yang dikirimkan
        $request->validate([
            'nama' => 'sometimes|string',
            'nim' => 'sometimes|numeric|unique:students,nim,' . $id,
            'email' => 'sometimes|email|unique:students,email,' . $id,
            'jurusan' => 'sometimes|string',
        ]);

        // Lakukan update data mahasiswa
        $student->update([
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan,
        ]);

        $data = [
            'message' => 'Student updated successfully!',
            'data' => $student,
        ];

        return response()->json($data, 200);
    } catch (\Exception $e) {
        // Tangkap error dan kirimkan pesan error spesifik
        return response()->json([
            'message' => 'Failed to update student',
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function destroy($id)
{
    // Cari mahasiswa berdasarkan ID
    $student = Student::find($id);

    if ($student) {
        // Hapus mahasiswa
        $student->delete();

        $data = [
            'message' => 'Student deleted successfully with id {$id}!',
        ];

        return response()->json($data, 200);
    }

    return response()->json(['message' => 'Student not found!'], 404);
}

public function show($id)
{
    // Cari mahasiswa berdasarkan ID
    $student = Student::find($id);

    if ($student) {
        $data = [
            'message' => 'Get detail student',
            'data' => $student
        ];

        return response()->json($data, 200);
    } else {

        return response()->json(['message' => 'Student not found!'], 404);
    }
}

public function patchUpdate(Request $request, $id)
{
    // Cari mahasiswa berdasarkan ID
    $student = Student::find($id);

    if ($student) {
        // Lakukan update sebagian data mahasiswa
        $student->update($request->only(['nama', 'nim', 'email', 'jurusan']));

        $data = [
            'message' => 'Student partially up
            dated successfully!',
            'data' => $student,
        ];

        return response()->json($data, 200);
    }

    return response()->json(['message' => 'Student not found!'], 404);
}

}