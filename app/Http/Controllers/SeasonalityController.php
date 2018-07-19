<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Seasonality;

class SeasonalityController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index() {
    	$data['seasonality'] =  Seasonality::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->only(['seasonality']);
	
		$save = Seasonality::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'seasonality added';
    		$data['seasonality'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'seasonality failed to add';
    	}
	
    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->only('seasonality');

    	$seasonality = Seasonality::where('id', $id)->first();
    	if ($seasonality->update($input)) return response()->json(['success' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = Seasonality::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'seasonality deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'seasonality failed to delete';
    	}

    	return json_encode($data);
    }
}
