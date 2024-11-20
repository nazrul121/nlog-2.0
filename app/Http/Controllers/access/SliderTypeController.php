<?php

namespace App\Http\Controllers\access;
use App\Http\Controllers\Controller;
use App\Models\Slider_type;
use Illuminate\Http\Request;

class SliderTypeController extends Controller
{
   
    public function index()
    {
        $types = Slider_type::all();
        return view('pages.sliders.types',compact('types'));
    }
}
