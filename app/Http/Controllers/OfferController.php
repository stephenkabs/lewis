<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
        $service = Offer::all();

        return view ('offer.index', compact('profileData','service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
        return view ('offer.create', compact('profileData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $profileImage = null; // Initialize the variable

        if ($image = $request->file('image')) {
            $destinationPath = 'service';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }

       $user = auth()->user();
        $post = new Offer();
        $post->name = $request->input('name');
        $post->status = $request->input('status');
        $post->words = $request->input('words');
        $post->slug = Str::slug($request->name);
        $post->description = $request->input('description');
        $post->user_id = $user->id;
     // Set the image if it was uploaded
     if ($profileImage) {
        $post->image = $profileImage;
    }
        $post->save();
        return redirect('offer')->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
                        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);

        return view ('offer.show', compact('profileData','service'));
    }

          public function public_show(Offer $offer)
    {

        $similarService = Offer::where('id', '!=', $offer->id)
            ->inRandomOrder() // Random selection
            ->take(3) // Limit to 3 similar ministries
            ->get();

        // Pass 'ministry', 'similarMinistries', and other variables to the view
        return view('offer.public_show', compact('service','similarService'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
                     if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
        return view ('offer.edit', compact('profileData','offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
                    $input = $request->all();

    // Handle file upload
    if ($image = $request->file('image')) {
        // Delete the old image if it exists
        if ($offer->image && file_exists(public_path('offer/' . $offer->image))) {
            unlink(public_path('offer/' . $offer->image));
        }

        // Save the new image
        $destinationPath = 'information';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
    } else {
        // If no new image is uploaded, keep the current image
        unset($input['image']);
    }

    // Update the information record with the new data
    $offer->update($input);

    return redirect('offer')->with('success', 'Service Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
                        $offer->delete();
        return redirect('offer')->with('success', 'Service Deleted successfully!');
    }
}
