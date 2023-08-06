<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Gallery;
use App\Models\Property;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class GalleryController extends Controller
{


    public function store(GalleryRequest $request, Property $property): RedirectResponse
    {
        if ($request->validated()) {
            $photo = $request->file('photo')->store('assets/gallery', 'public');
            $property->galleries()->create($request->except('photo') + ['photo' => $photo]);
        }

        return redirect()->route('admin.properties.edit', $property->id)->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }


    public function edit(Property $property, Gallery $gallery): View
    {
        return view('admin.galleries.edit', compact('gallery', 'property'));
    }

    public function update(GalleryRequest $request, Property $property, Gallery $gallery): RedirectResponse
    {
        if ($request->validated()) {
            if ($request->photo) {
                File::delete('storage/' . $gallery->photo);
                $photo = $request->file('photo')->store('assets/gallery', 'public');
                $gallery->update($request->except('photo') + ['photo' => $property]);
        } else {
            $gallery->update($request->validated());
        }}

        return redirect()->route('admin.properties.index', $property->id)->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Property $property, Gallery $gallery): RedirectResponse
    {
        File::delete('storage/'.$gallery->photo);
        $gallery->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
