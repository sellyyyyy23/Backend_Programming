<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    function index(){
        $datastudents = Student::all();
        $data = [
            'message' => 'Get all students',
            'data' => $datastudents
        ];

        # mengirim data (json) dan kode 200
        return response()->json($data, 200);
    }

    function create(Request $request){
        //menerima data request dari b0dy
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        //insert data ke database
        $student = Student::create([
            'nama' => $nama,
            'nim' => $nim,
            'email' => $email,
            'jurusan' =>$jurusan
        ]);

        $data = [
            'message' => 'student is created sukses',
            'data' => $student
        ];

        return response()->json($data,201);
    }

    public function update(Request $request, $id)
    {
       
    }

    # membuat method destroy
    public function destroy($id)
    {
       
    }

}
