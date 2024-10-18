<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Buat property animals (array)
    private $animals = ['kucing', 'ayam', 'ikan'];

    // Menampilkan data animals
    public function index() {
        echo "Menampilkan data animals:" . PHP_EOL;
        foreach ($this->animals as $animal) {
            echo $animal . PHP_EOL;
        }
    }

    // Menambahkan hewan baru
    public function store(Request $request)
    {
        echo "Menambahkan hewan baru" . PHP_EOL;
        echo "Menampilkan data animals:" . PHP_EOL;
        $newAnimal = $request->input('animal');
        array_push($this->animals, $newAnimal);

        return response()->json($this->animals);
    }

    // Mengupdate data hewan
    public function update(Request $request, $id)
    {
        echo "Mengupdate data animal id $id" . PHP_EOL;
        echo "Menampilkan data animals:" . PHP_EOL;
        $updatedAnimal = $request->input('animal');
        if (isset($this->animals[$id])) {
            $this->animals[$id] = $updatedAnimal;
        }

        return response()->json($this->animals);
    }

    // Menghapus data hewan
    public function destroy($id)
    {
        echo "Menghapus data hewan id $id" . PHP_EOL;  
        echo "Menampilkan data animals:" . PHP_EOL;  
        if (isset($this->animals[$id])) {
            array_splice($this->animals, $id, 1);
        }

        return response()->json($this->animals);
    }
}
