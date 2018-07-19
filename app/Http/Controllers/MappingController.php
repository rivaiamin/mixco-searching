<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mapping;
use App\Budget;
use App\Category;
use App\FoodInterest;
use App\Parties;
use App\Province;
use App\Seasonality;
use App\SpecialInterest;
use App\Video;

class MappingController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index','detail']]);
    }

    public function index() {
    	$data['mapping'] 		= Mapping::with(['video','category','province'])->get();
    	$data['budget'] 		= Budget::all();
    	$data['category'] 		= Category::all();
    	$data['foodInterest'] 	= FoodInterest::all();
    	$data['parties'] 		= Parties::all();
    	$data['province'] 		= Province::all();
    	$data['seasonality'] 	= Seasonality::all();
    	$data['specialInterest']= SpecialInterest::all();
    	$data['video'] 			= Video::all();

    	return json_encode($data);
    }

    public function detail($id) {
    	$data['mapping'] = Mapping::with(['video','category','province', 'budget','parties','foodInterest','specialInterest','seasonality'])
    	->where('id',$id)->get();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->all();

   		$save = Mapping::create($input);

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'mapping added';
            $mapping = Mapping::with(['video','category','province'])->find($save->id);
    		$data['mapping'] = $mapping;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'mapping failed to add';
    	}
    	
    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->all();

    	$mapping = Mapping::where('id', $id)->first();

    	if ($mapping->update($input)) {
           $data = Mapping::with(['video','category','province', 'budget','parties','foodInterest','specialInterest','seasonality'])
                    ->where('id',$id)->get();
           return response()->json(['mapping'=>$data, 'success' => 'data_dapat_diperbarui'], 200);
    	   
        } else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = Mapping::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'mapping deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'mapping failed to delete';
    	}

    	return json_encode($data);
    }
}
