<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Guest;

class GuestController extends Controller
{   
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['add']]);
    }

    public function index() {
    	$data['guest'] =  Guest::all();

    	return json_encode($data);
    }

    public function add(Request $request) {
    	$input = $request->only(['name','gender','age','email','phone','nationality']);
    	$save = Guest::create($input);

        Mail::send('emails.thanks', ['user' => $input], function ($m) use ($input) {
            $m->from("contact@mix.co", "Mix.co")
            ->to($input['email'], $input['name'])->subject('Thanks You');

        });

    	if ($save) {
    		$data['status'] = 'success';
    		$data['message'] = 'Thank you for information';
    		$data['guest'] = $save;
    	} else {
    		$data['status'] = 'error';
    		$data['message'] = 'there is a error';
    	}
    	
    	return json_encode($data);
    }
}
