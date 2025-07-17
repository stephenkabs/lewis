<?php

namespace App\Http\Controllers;

use App\Models\Core;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class CoreController extends Controller
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
        $core = Core::all();

        return view ('cores.index', compact('profileData','core'));
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
        return view ('cores.create', compact('profileData'));
    }

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
    {
        $profileImage = null; // Initialize the variable

        if ($image = $request->file('image')) {
            $destinationPath = 'core';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }

       $user = auth()->user();
        $post = new Core();
        $post->name = $request->input('name');
         $post->core_value = $request->input('core_value');
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
        return redirect('cores')->with('success', 'Core created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Core $core)
    {
                            if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);

        return view ('cores.show', compact('profileData','core'));
    }


      public function public_show(Core $core)
    {

        $similarCore = Core::where('id', '!=', $core->id)
            ->inRandomOrder() // Random selection
            ->take(3) // Limit to 3 similar ministries
            ->get();

        // Pass 'ministry', 'similarMinistries', and other variables to the view
        return view('cores.public_show', compact('core','similarCore'));
    }
    public function edit(Core $core)
    {
                             if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
        return view ('cores.edit', compact('profileData','core'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Core $core)
    {
                         $input = $request->all();

    // Handle file upload
    if ($image = $request->file('image')) {
        // Delete the old image if it exists
        if ($core->image && file_exists(public_path('core/' . $core->image))) {
            unlink(public_path('core/' . $core->image));
        }

        // Save the new image
        $destinationPath = 'core';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = "$profileImage";
    } else {
        // If no new image is uploaded, keep the current image
        unset($input['image']);
    }

    // Update the information record with the new data
    $core->update($input);

    return redirect('cores')->with('success', 'Core Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Core $core)
    {
                                $core->delete();
        return redirect('cores')->with('success', 'Core Deleted successfully!');
    }
}
