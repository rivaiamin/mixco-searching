<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

use App\Http\Requests;
use App\Video;

class VideoController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    public function index() {
    	$data['video'] =  Video::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->only(['title','filename']);
		
		$save = Video::create($input);

        if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'upload successfull';
    		$data['video'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'upload failed';
    	}

    	return json_encode($data);

    }

    public function update(Request $request, $id) {
    	$input = $request->only(['title']);

    	$video = Video::where('id', $id)->first();
    	if ($video->update($input)) return response()->json(['success' => 'data_dapat_diperbarui'], 200);
    	else return response()->json(['error' => 'cant_update_data'], 500);
    }

    public function delete($id) {
    	$delete = Video::where('id', $id)->delete();

    	if ($delete) {
    		$data['status'] = 'success';
    		$data['message'] = 'video deleted';
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'video failed to delete';
    	}

    	return json_encode($data);
    }

    public function upload(Request $r) {
	    

	    $video = Input::file('video');
    	
    	//var_dump($video);
    	if (Input::hasFile('video')) {
	        $destinationPath = base_path() . '/public/upload';
	        if(!$video->move($destinationPath, $video->getClientOriginalName())) {
	            return response()->json(['status' => 'error', 'message' => 'cant_upload'], 400);
	        } else {
	        	return response()->json(['status' => 'success', 'message' => 'upload'], 200);
	        }
		} else {
	        return response()->json(['status' => 'error', 'message' => 'kosong'], 400);
		}
        
    }
}
