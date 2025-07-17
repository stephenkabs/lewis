<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Leader;
use App\Models\Sign;
use App\Models\Hero;
use App\Models\About;
use App\Models\Setting;
use App\Models\Ministry;
use App\Models\Contact;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class InformationController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('permission:view news',['only'=> ['index','show']]);
    //    $this->middleware('permission:create news',['only'=> ['create','store']]);
    //    $this->middleware('permission:edit news',['only'=> ['update','edit']]);
    //    $this->middleware('permission:delete news',['only'=> ['destroy']]);

    // }
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
        $information = Information::all();
        // $information = Information::with('user')->findOrFail($id);
        $category = Category::all();

        $agent = new Agent();
        if ($agent->isMobile()) {
            // Load a separate view for mobile devices
            return view ('informations.index_mobile', compact('profileData','category','information'));
        }

        return view ('informations.index', compact('profileData','information','category'));
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
        $categories = Category::all();


        return view ('informations.create', compact('profileData','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profileImage = null; // Initialize the variable

        if ($image = $request->file('image')) {
            $destinationPath = 'information';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }

       $user = auth()->user();
        $post = new Information();
        $post->name = $request->input('name');
        $post->status = $request->input('status');
        $post->words = $request->input('words');
        $post->category_id = $request->input('category_id');
        $post->slug = Str::slug($request->name);
        $post->date = $request->input('date');
        $post->user_id = $user->id;
     // Set the image if it was uploaded
     if ($profileImage) {
        $post->image = $profileImage;
    }
        $post->save();
        return redirect('informations')->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
            // Retrieve the information along with the user who posted it


        $agent = new Agent();
        if ($agent->isMobile()) {
            // Load a separate view for mobile devices
            return view ('informations.show_mobile', compact('profileData','information'));
        }

        return view ('informations.show', compact('profileData','information'));
    }

    public function public_show(Information $information)
    {
        // Retrieve related data
        $signs = Sign::where('update_id', $information->id)->get();
        $heroes = Hero::where('status', 'published')->get();
        // $about = About::where('status', 'Published')->get();
        // $news = News::all();
        // $contact = Contact::all();
        $category = Category::all();

        // Fetch settings
        $generalSettings = Setting::all();
        $displaySettings = Setting::where('status', 'Published')->get();

        // Fetch random similar posts (excluding the current one)
        $similarInformation = Information::where('id', '!=', $information->id)
            ->inRandomOrder() // Random selection
            ->take(3) // Limit to 3 similar ministries
            ->get();

            $similarMinistries = Information::all();

            $agent = new Agent();
            if ($agent->isMobile()) {
                // Load a separate view for mobile devices
                return view('mobile.mobile_public_show', compact('information', 'signs', 'generalSettings', 'displaySettings', 'heroes',  'news', 'contact', 'similarInformation','similarMinistries','category'));
            }

        // Pass 'ministry', 'similarMinistries', and other variables to the view
        return view('informations.public_show', compact('information', 'signs', 'generalSettings', 'displaySettings', 'heroes',  'news', 'contact', 'similarInformation','similarMinistries','category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
        $categories = Category::all();

        return view ('informations.edit', compact('profileData','information','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
// In your InformationController
public function update(Request $request, Information $information)
{
    $input = $request->all();

    // Handle file upload
    if ($image = $request->file('image')) {
        // Delete the old image if it exists
        if ($information->image && file_exists(public_path('information/' . $information->image))) {
            unlink(public_path('information/' . $information->image));
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
    $information->update($input);

    return redirect('informations')->with('success', 'News Updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        $information->delete();
        return redirect('informations')->with('success', 'News Deleted successfully!');

}
}
