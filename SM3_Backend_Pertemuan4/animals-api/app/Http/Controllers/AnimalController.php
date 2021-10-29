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
		echo "Menampilkan Data Hewan: <br>  <br> ";
        foreach ($this->animals as $animal) {
			echo "$animal[name]  <br>";
		}
    }

    function create(Request $request){
        array_push($this->animals, $request);
		$this->index();
    }

    function update(Request $request, $id){
        
		echo 'Update Animals '.$this->animals[$id]['name'].' menjadi : animals '.$request->name.'<br><br>';
		$this->animals[$id]['name'] = $request->name;
        return $this->index();
    }

    function destroy($id){
        //echo "anda baru saja mengapus data animal dari id $id";
        echo "Menghapus data animals ID: $id <br><br>";
		array_splice($this->animals, $id, 1);
		$this->index();
    }
}
