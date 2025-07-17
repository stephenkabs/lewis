<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $service = Service::all();

        return view('services.index', compact('profileData', 'service'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $categories = Category::where('type', 'Services')->get(); // Fetch categories for services
        return view('services.create', compact('profileData','categories'));
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
        $post = new Service();
        $post->name = $request->input('name');
        $post->status = $request->input('status');
        $post->words = $request->input('words');
        $post->category_id = $request->input('category_id');
        $post->slug = Str::slug($request->name);
        $post->description = $request->input('description');
        $post->user_id = $user->id;
        // Set the image if it was uploaded
        if ($profileImage) {
            $post->image = $profileImage;
        }
        $post->save();
        return redirect('services')->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('services.show', compact('profileData', 'service'));
    }

    public function public_show(Service $service)
    {

        // Fetch random similar posts (excluding the current one)
        $similarService = Service::where('id', '!=', $service->id)
            ->inRandomOrder() // Random selection
            ->take(3) // Limit to 3 similar ministries
            ->get();

        // Pass 'ministry', 'similarMinistries', and other variables to the view
        return view('services.public_show', compact('service', 'similarService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id = Auth::user()->id;
        $profileData = User::find($id);
                $categories = Category::where('type', 'Services')->get(); // Fetch categories for services
        return view('services.edit', compact('profileData', 'service','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $input = $request->all();

        // Handle file upload
        if ($image = $request->file('image')) {
            // Delete the old image if it exists
            if ($service->image && file_exists(public_path('service/' . $service->image))) {
                unlink(public_path('service/' . $service->image));
            }

            // Save the new image
            $destinationPath = 'service';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            // If no new image is uploaded, keep the current image
            unset($input['image']);
        }

        // Update the information record with the new data
        $service->update($input);

        return redirect('services')->with('success', 'Service Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect('services')->with('success', 'Service Deleted successfully!');
    }
}
