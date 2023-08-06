<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;


class PropertyController extends Controller
{
    public function index() {
        $properties = Property::get();
        return view('frontend.property.index', compact('properties'));
    }

    public function show(Property $property) {
        return view('frontend.property.single', compact('property'));
    }
}
