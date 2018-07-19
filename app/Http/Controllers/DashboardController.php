<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Budget;
use App\FoodInterest;
use App\Guest;
use App\Mapping;
use App\Parties;
use App\Seasonality;
use App\SpecialInterest;
use App\Video;

class DashboardController extends Controller
{
    public function index() {
	    $data['category'] = Category::count();
	    $data['budget'] = Budget::count();
	    $data['food'] = FoodInterest::count();
	    $data['guest'] = Guest::count();
	    $data['mapping'] = Mapping::count();
	    $data['parties'] = Parties::count();
	    $data['seasonality'] = Seasonality::count();
	    $data['special'] = SpecialInterest::count();
	    $data['video'] = Video::count();

	    return json_encode($data);
    }
}
