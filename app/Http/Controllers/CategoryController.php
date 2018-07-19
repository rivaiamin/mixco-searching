<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index() {
    	$data['category'] =  Category::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->only(['code','category']);

    	$category = Category::where('code', $input['code']);

    	if (! $category->first()) {
	    	$save = Category::create($input);

	    	if ($save) {
	    		$data['status'] = 'success';
	    		$data['message'] = 'category added';
	    		$data['category'] = $save;
	    	} else {
	    		$data['status'] = 'error';
	    		$data['message'] = 'category failed to add';
	    	}
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'code has been exist';
    	}
    	
    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->only('code','category');

    	$category = Category::where('id', $id)->first();
    	if ($category->update($input)) return response()->json(['success' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = Category::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'category deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'category failed to delete';
    	}

    	return json_encode($data);
    }
}
