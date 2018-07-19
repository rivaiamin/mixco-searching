<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Parties;

class PartiesController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index() {
    	$data['parties'] =  Parties::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->only(['number']);
	
		$save = Parties::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'number of parties added';
    		$data['parties'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'number of parties failed to add';
    	}
	
    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->only('number');

    	$parties = Parties::where('id', $id)->first();
    	if ($parties->update($input)) return response()->json(['success' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = Parties::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'parties deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'parties failed to delete';
    	}

    	return json_encode($data);
    }
}
