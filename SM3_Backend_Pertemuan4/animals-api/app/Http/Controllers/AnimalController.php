<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = [
        [
			"name" => "Kupu-Kupu",
		],
		[
			"name" => "Kura-Kura",
		],
		[
			"name" => "Kucing"
		],
		[
			"name" => "Kambing"
		]
    ];

    function index(){
        // echo "ini adalah data animals";
        // return ([
        //     "name" => "cat",
        //     "warna" => "merah",
        // ]);
        foreach ($this->animals as $animal) {
			echo "Nama Hewan: $animal[name]  <br>";
		}
    }

    function create(Request $request){
        //echo "anda berhasil menambahkan data animals baru";
        array_push($this->animals, $request);
		$this->index();
    }

    function update(Request $request, $id){
        // $name = $request->nama;
        // $collor = $request->warna;

    
        // echo "anda baru saja memperbaruhi data animal dari id $id";
        // echo "<br>";
        // echo "nama terbaru adalah $name";
        // echo "<br>";
        // echo "dengan warna $collor";
        echo 'Update animals '.$this->animals[$id]['name'].' menjadi : animals '.$request->name.'<br>';
        echo "<br>";
		$this->animals[$id] = $request;
		$this->index();
    }

    function destroy($id){
        //echo "anda baru saja mengapus data animal dari id $id";
        echo "Menghapus data animals id: $id <br>";
		array_splice($this->animals, $id, 1);
		$this->index();
    }
}
