<?php

class Animal {
    // Property untuk menyimpan daftar hewan
    public $animals;

    // Constructor untuk inisialisasi daftar hewan awal
    public function __construct() {
        $this->animals = ["Kucing", "Koala", "Harimau"];
    }

    // Method index : untuk menampilkan seluruh hewan
    public function index() {
        foreach ($this->animals as $animal) {
            echo $animal . PHP_EOL;
        }
    }

    // Method store : untuk menambahkan hewan baru
    public function store($animal) {
        $this->animals[] = $animal;
        echo "$animal ditambahkan!" . PHP_EOL;
    }

    // Method update : untuk memperbarui data hewan
    public function update($index, $newAnimal) {
        $this->animals[$index] = $newAnimal;
        echo "Hewan di index $index diperbarui menjadi $newAnimal" . PHP_EOL;
    }

    // Method destroy : untuk menghapus hewan
    public function destroy($index) {
        unset($this->animals[$index]);
        echo "Hewan di index $index dihapus!" . PHP_EOL;
    }
}

// Contoh penggunaan class Animal
echo "-- Contoh penggunaan class animal : --" . PHP_EOL;
$animal = new Animal();
echo "-- Menampilkan semua hewan sebelum diubah: --" . PHP_EOL;
$animal->index();
echo "-- Menambahkan hewan: --" . PHP_EOL;
$animal->store("Kepiting");
echo "-- Memperbarui data hewan: --" . PHP_EOL;
$animal->update(1, "Kangguru");
echo "-- Menghapus data hewan: --" . PHP_EOL;
$animal->destroy(0);
echo "-- Menampilkan semua hewan: --" . PHP_EOL;
$animal->index();

?>
