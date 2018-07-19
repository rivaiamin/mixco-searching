<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Budget;

class BudgetController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index() {
    	$data['budget'] =  Budget::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->only(['budget']);

	    	$save = Budget::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'budget/wise added';
    		$data['budget'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'budget/wise failed to add';
    	}
    	
    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->only('code','budget');

    	$budget = Budget::where('id', $id)->first();
    	if ($budget->update($input)) return response()->json(['success' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = Budget::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'budget/wise deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'budget/wise failed to delete';
    	}

    	return json_encode($data);
    }
}
