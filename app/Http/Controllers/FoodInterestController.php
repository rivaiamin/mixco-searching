<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FoodInterest;

class FoodInterestController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index() {
    	$data['food'] =  FoodInterest::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->only(['code','interest']);

    	$save = FoodInterest::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'food interest added';
    		$data['food'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'food interest failed to add';
    	}
    	
    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->only('code','interest');

    	$food = FoodInterest::where('id', $id)->first();
    	if ($food->update($input)) return response()->json(['success' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = FoodInterest::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'interest deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'interest failed to delete';
    	}

    	return json_encode($data);
    }
}
