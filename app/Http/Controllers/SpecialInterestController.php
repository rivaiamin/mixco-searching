<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SpecialInterest;

class SpecialInterestController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index() {
    	$data['special'] =  SpecialInterest::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->only(['code','interest']);

    	$special = SpecialInterest::where('code', $input['code']);

    	if (! $special->first()) {
	    	$save = SpecialInterest::create($input);

	    	if ($save) {
	    		$data['status'] = 'success';
	    		$data['message'] = 'special interest added';
	    		$data['special'] = $save;
	    	} else {
	    		$data['status'] = 'error';
	    		$data['message'] = 'special interest failed to add';
	    	}
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'code has been exist';
    	}
    	
    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->only('code','interest');

    	$special = SpecialInterest::where('id', $id)->first();
    	if ($special->update($input)) return response()->json(['success' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = SpecialInterest::where('id', $id)->delete();

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
