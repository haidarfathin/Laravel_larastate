<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Property;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {

        $sliders = Slider::get();
        $testimonials = Testimonial::get();
        $agents = Agent::get();
        $properties = Property::get();

        return view('frontend.homepage', compact('sliders', 'testimonials', 'agents', 'properties'));
    }
}
