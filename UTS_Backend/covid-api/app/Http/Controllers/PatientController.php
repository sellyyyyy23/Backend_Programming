<?php

namespace App\Http\Controllers;
use App\Models\Patient;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    function index(){
        // Mencari seluruh data pasien
        $datapasien = Patient::all();
		$patientsNotExist = count($datapasien) == 0;

        // Jika tidak ada data pasien akan ada 'message' => 'Data is empty' dengan status kode 200
		if ($patientsNotExist) {
            $message = ['message' => 'Data is empty'];
            return response()->json($message, 200);
		}
        // Jika ada data pasien, maka akan menampilkan seluruh data pasien yang ada dengan status kode 200
        return response()->json($datapasien, 200);
    }

    public function show($id)
	{
		// Mencari data pasien berdasarkan id yang diinput
		$datapasien = Patient::find($id);
		$patientsNotExist = $datapasien == null;
		// jika tidak ada data pasien dengan id yang diinput, maka akan muncul 'message' => 'Resource not found' dengan status kode 404
		if ($patientsNotExist) {
			$message = ['message' => 'Resource not found'];
            return response()->json($message, 404);
		}
		// Jika ada data pasien dengan id yang input, maka akan menampilkan data pasien dengan id yang input dan status kode 200
		$response = [
			'message' => 'Get detail resource',
			'data' => $datapasien,
		];
        return response()->json($response, 200);
	}

    public function store(Request $request)
	{
		// buat rules 
		$aturan = [
			'name' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'status' => 'required',
			'in_date_at' => 'required',
			'out_date_at' => '',
		];
		// Validate 
		$validator = Validator::make($request->all(), $aturan);

		// jika ada validate required yang tidak diisi, masuk kesini
		if ($validator->fails()) {
			$response = ['message' => 'No content to send'];
            return response()->json($response, 204);
		}
		
		// create pasien 
		$datapasien = Patient::create($request->all());

		// menampilkan info jika create berhasil
		$response = [
			'message' => 'Resource is added successfully',
			'data' => $datapasien,
		];
        return response()->json($response, 201);
	}

    public function update(Request $request, $id)
	{
		// cari data pasien dengan id
		$datapasien = Patient::find($id);
		// cek data pasien ada atau tidak
		$patientsNotExist = $datapasien == null;
		
		if ($patientsNotExist) {
			$message = ['message' => 'Resource not found'];
            return response()->json($message, 404);
		}
		
		$datapasien->update($request->all());
		$response = [
			'message' => 'Resource is update successfully',
			'data' => $datapasien,
		];
		return response()->json($response, 200);
	}

    public function destroy($id)
	{
		// cari data pasien dengan id
		$datapasien = Patient::find($id);
		// cek data pasien ada atau tidak
		$patientNotExist = $datapasien == null;
		// jika tidak ada data pasien dengan id 
		if ($patientNotExist) {
			$message = ['message' => 'Resource not found'];
            return response()->json($message, 404);
		}
		// jika ada data pasien dengan id makan delete
		$datapasien->delete();
		$message = ['message' => 'Resource is delete successfully'];
		return response()->json($message, 200);
	}  

	public function search($name)
	{
		//Get data dengan where name like 
		$namapasien = Patient::where('name', 'like', "%$name%")->get();

		// jika data name yang dicari tidak ada
		if($namapasien->isEmpty()) {
            $message = ['message' => 'Resource not found'];
            return response()->json($message, 404);
        }

		// jika data name yang dicari ada
		$response = [
			'message' => 'Get searched resource',
			'data' => $namapasien,
		];
        return response()->json($response, 200);

	}
	public function positive() {
		//Get data dengan where status positive
        $positive_datapasien = Patient::where('status', '=', 'positive')->get();
        
		$response = [
            'message' => 'Get Positive Resource',
            'success' => true,
            'total' => count($positive_datapasien),
            'data' => $positive_datapasien
        ];

        return response()->json($response,200);
    }
	public function recovered() {
		//Get data dengan where status recovered
	   $recovered_patients = Patient::where('status', '=', 'recovered')->get();

	   $response = [
		   'message' => 'Get Recovered Resource',
		   'success' => true,
		   'total' => count($recovered_patients),
		   'data' => $recovered_patients
	   ];

	   return response()->json($response, 200);
   }

   public function dead() {
	   //Get data dengan where status dead
	   $dead_patients = Patient::where('status', '=', 'dead')->get();

	   $response = [
		   'message' => 'Get Dead Resource',
		   'success' => true,
		   'total' => count($dead_patients),
		   'data' => $dead_patients
	   ];

	   return response()->json($response, 200);
   }
}
