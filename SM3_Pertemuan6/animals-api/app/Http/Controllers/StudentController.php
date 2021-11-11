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

        # mengirim data (json) dan kode 2oo
        return response()->json($data, 200);
    }

    function show($id){
        $data = Student::find($id);
        if (!is_numeric($id)){
            $errormessage = ['message' => 'id yang dimasukan harus angka'];
                return response()->json($errormessage, 404);

        }
        //$nama = $data->nama;
            if ($data == null){
                $errormessage = ['message' => 'Data yang dicari tidak ada'];
                return response()->json($errormessage, 404);
            }else{
                return response()->json($data, 200);
            }
   //     echo "ok, $nama";
    }

    function create(Request $request){
        //menerima data request dari body
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

    # membuat method update
    public function update(Request $request, $id)
    {
        //get data dari body
        $nama = $request->nama;
        $nim = $request->nim;
        $email = $request->email;
        $jurusan = $request->jurusan;

        //cari data student berdasarkan id 
        $data = Student::find($id);

        //melakukan update, kalau ada berdasarkan id
        if ($data){
            // kalau nim yang diupdate selain angka 
            if (!is_numeric($nim)){
                $errormessage = ['message' => 'Nim yang dimasukan harus angka'];
                return response()->json($errormessage, 404);
            }else {
                  $data->update([
                  'nama'=> $nama,
                  'nim' => $nim,
                  'email' => $email,
                  'jurusan' =>$jurusan
              ]);
              return response()->json($data, 200);
            }
        }else{
             $errormessage = ['message' => 'data kosong'];
                 return response()->json($errormessage, 404);
        }        
    }

    # membuat method destroy
    public function destroy($id)
    {
        //cari data student berdasarkan id 
        $data = Student::find($id);
        if ($data){
            $data->delete();
            $message = ['message' => 'data dengan $id berhasil dihapus'];
            return response()->json($message, 200);
        }else{
            $errormessage = ['message' => 'data kosong'];
                return response()->json($errormessage, 404);
        }       
    }

}
