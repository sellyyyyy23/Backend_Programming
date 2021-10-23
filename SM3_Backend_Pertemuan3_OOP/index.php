<?php

# membuat class Animal
class Animal
{
  # property animals
  public $animals;

  # method constructor - mengisi data awal
  # parameter: data hewan (array)
  public function __construct($data)
  {
    $this->animals = $data;
  }

  # method index - menampilkan data animals
  public function index()
  {
    # gunakan foreach untuk menampilkan data animals (array)
    foreach ($this->animals as $value) {
      echo $value."<br>";
    }
  }

  # method store - menambahkan hewan baru
  # parameter: hewan baru
  public function store($data)
  {
    # gunakan method array_push untuk menambahkan data baru
    array_push($this->animals, $data);
  }

  # method update - mengupdate hewan
  # parameter: index dan hewan baru
  public function update($index, $data)
  {
    $this->animals[$index] = $data;
  }

  # method delete - menghapus hewan
  # parameter: index
  public function destroy($index)
  {
    # gunakan method unset atau array_splice untuk menghapus data array
    unset($this->animals[$index]);
  }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['Kelinci','Kupu-Kupu','Kangguru']);

echo "INDEX - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "ST0RE - Menambahkan hewan baru <br>";
$animal->store('Burung');
$animal->index();
echo "<br>";

echo "UPDATE - Mengupdate hewan <br>";
$animal->update(3, 'Kucing');
$animal->index();
echo "<br>";

echo "DESTR0Y - Menghapus hewan <br>";
$animal->destroy(2);
$animal->index();
echo "<br>";