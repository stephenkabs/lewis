<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class FeatureController extends Controller
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
        $feature = Feature::all();

        return view ('features.index', compact('profileData','feature'));
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
        return view ('features.create', compact('profileData'));
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
    {
                $profileImage = null; // Initialize the variable

        if ($image = $request->file('image')) {
            $destinationPath = 'feature';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }

       $user = auth()->user();
        $post = new Feature();
        $post->name = $request->input('name');
         $post->icon = $request->input('icon');
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
        return redirect('features')->with('success', 'Feature created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
                        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);

        return view ('features.show', compact('profileData','feature'));
    }

      public function public_show(Feature $feature)
    {
        // Retrieve related data
        // $signs = Sign::where('update_id', $information->id)->get();
        // $heroes = Hero::where('status', 'published')->get();
        // // $about = About::where('status', 'Published')->get();
        // $news = News::all();
        // $contact = Contact::all();
        // $category = Category::all();

        // // Fetch settings
        // $generalSettings = Setting::all();
        // $displaySettings = Setting::where('status', 'Published')->get();

        // Fetch random similar posts (excluding the current one)
        $similarService = Feature::where('id', '!=', $feature->id)
            ->inRandomOrder() // Random selection
            ->take(3) // Limit to 3 similar ministries
            ->get();

        // Pass 'ministry', 'similarMinistries', and other variables to the view
        return view('features.public_show', compact('feature','similarFeature'));
    }
    public function edit(Feature $feature)
    {
                     if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
        return view ('features.edit', compact('profileData','feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
                    $input = $request->all();

    // Handle file upload
    if ($image = $request->file('image')) {
        // Delete the old image if it exists
        if ($feature->image && file_exists(public_path('feature/' . $feature->image))) {
            unlink(public_path('feature/' . $feature->image));
        }

        // Save the new image
        $destinationPath = 'feature';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
    } else {
        // If no new image is uploaded, keep the current image
        unset($input['image']);
    }

    // Update the information record with the new data
    $feature->update($input);

    return redirect('features')->with('success', 'Feature Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
                        $feature->delete();
        return redirect('features')->with('success', 'Feature Deleted successfully!');
    }
}
