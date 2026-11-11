<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    public function create(Request $request, Listing $listing)
    {
        $listing->load(['images']);
        return inertia('Realtor/ListingImage/Create',
            ['listing' => $listing]
        );
    }

    public function store(Request $request, Listing $listing)
    {
        if ($request->hasFile('images')) {
            $request->validate(
                [
                    'images.*' => 'mimes:jpeg,jpg,png|max:1024'
                ],
                [
                    'images.*.mimes' => 'Only jpeg, jpg, png files are allowed.',
                ]
            );

            foreach ($request->file('images') as $file) {
                $path = $file->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'file_name' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    public function destroy(Request $request, $listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->file_name);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
