<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Buat property animals (array) untuk menyimpan data hewan
    private $animals = ['kucing', 'ayam', 'ikan'];

    // Menampilkan semua data animals
    public function index() {
        echo "Menampilkan data animals: " . PHP_EOL;
        // Looping untuk menampilkan setiap hewan dalam array dengan tanda (-)
        foreach ($this->animals as $animal) {
            echo "- " . $animal . PHP_EOL; // Menambahkan tanda (-)
        }
    }

    // Menambahkan hewan baru
    public function store(Request $request)
    {
        // Validasi input, memastikan 'animal' diisi dan berupa string
        $request->validate([
            'animal' => 'required|string|max:255'
        ]);

        // Ambil data hewan baru dari request input
        $newAnimal = $request->input('animal');
        
        // Tambahkan hewan baru ke dalam array animals
        array_push($this->animals, $newAnimal);

        // Tampilkan pesan dan daftar hewan yang sudah di-update
        echo "Hewan baru ditambahkan: " . $newAnimal . PHP_EOL;
        echo "Menampilkan data animals: " . PHP_EOL;
        foreach ($this->animals as $animal) {
            echo "- " . $animal . PHP_EOL; // Menambahkan tanda (-)
        }
    }

    // Mengupdate data hewan berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input untuk memastikan ada input yang benar
        $request->validate([
            'animal' => 'required|string|max:255'
        ]);

        // Cek apakah ID hewan ada di dalam array
        if (!isset($this->animals[$id])) {
            echo "Hewan dengan ID $id tidak ditemukan." . PHP_EOL;
            return;
        }

        // Ambil data hewan baru dari request input dan perbarui array
        $updatedAnimal = $request->input('animal');
        $this->animals[$id] = $updatedAnimal;

        // Tampilkan pesan dan daftar hewan yang sudah di-update
        echo "Hewan dengan ID $id berhasil diupdate menjadi: " . $updatedAnimal . PHP_EOL;
        echo "Menampilkan data animals: " . PHP_EOL;
        foreach ($this->animals as $animal) {
            echo "- " . $animal . PHP_EOL; // Menambahkan tanda (-)
        }
    }

    // Menghapus data hewan berdasarkan ID
    public function destroy($id)
    {
        // Cek apakah ID hewan ada di dalam array
        if (!isset($this->animals[$id])) {
            echo "Hewan dengan ID $id tidak ditemukan." . PHP_EOL;
            return;
        }

        // Hapus hewan dari array berdasarkan ID
        array_splice($this->animals, $id, 1);

        // Tampilkan pesan bahwa hewan berhasil dihapus dan daftar hewan yang tersisa
        echo "Hewan dengan ID $id berhasil dihapus." . PHP_EOL;
        echo "Menampilkan data animals: " . PHP_EOL;
        foreach ($this->animals as $animal) {
            echo "- " . $animal . PHP_EOL; // Menambahkan tanda (-)
        }
    }
}

// <?php

// namespace App\Http\Controllers;
// use Illuminate\Http\Request;

// class AnimalController extends Controller
// {
//     // Buat property animals (array)
//     private $animals = ['kucing', 'ayam', 'ikan'];

//     // Menampilkan data animals
//     public function index() {
//         echo "Menampilkan data animals:" . PHP_EOL;
//         foreach ($this->animals as $animal) {
//             echo $animal . PHP_EOL;
//         }
//     }

//     // Menambahkan hewan baru
//     public function store(Request $animal)
//     {
//         echo "Menambahkan hewan baru" . PHP_EOL;
//         echo "Menampilkan data animals:" . PHP_EOL;
//         $newAnimal = $animal->input('animal');
//         array_push($this->animals, $newAnimal);

    
//         return response()->json($this->animals);
//     }

//     // Mengupdate data hewan
//     public function update(Request $animal, $id)
//     {
//         echo "Mengupdate data animal id $id" . PHP_EOL;
//         echo "Menampilkan data animals:" . PHP_EOL;
//         $updatedAnimal = $animal->input('animal');
//         if (isset($this->animals[$id])) {
//             $this->animals[$id] = $updatedAnimal;
//         }

//         return response()->json($this->animals);
//     }

//     // Menghapus data hewan
//     public function destroy($id)
//     {
//         echo "Menghapus data hewan id $id" . PHP_EOL;  
//         echo "Menampilkan data animals:" . PHP_EOL;  
//         if (isset($this->animals[$id])) {
//             array_splice($this->animals, $id, 1);
//         }

//         return response()->json($this->animals);
//     }
// }
