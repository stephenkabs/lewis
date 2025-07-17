<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        $article = Article::all();

        return view('articles.index', compact('profileData', 'article'));
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
        $categories = Category::where('type', 'News')->get(); // Fetch categories for articles
        return view('articles.create', compact('profileData','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $profileImage = null; // Initialize the variable

        if ($image = $request->file('image')) {
            $destinationPath = 'article';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }

        $user = auth()->user();
        $post = new article();
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
        return redirect('articles')->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
                if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('articles.show', compact('profileData', 'article'));
    }

        public function public_show(Article $article)
    {

        // Fetch random similar posts (excluding the current one)
        $similarArticle = Article::where('id', '!=', $article->id)
            ->inRandomOrder() // Random selection
            ->take(3) // Limit to 3 similar ministries
            ->get();

        // Pass 'ministry', 'similarMinistries', and other variables to the view
        return view('articles.public_show', compact('article', 'similarArticle'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
                if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id = Auth::user()->id;
        $profileData = User::find($id);
                $categories = Category::where('type', 'News')->get(); // Fetch categories for articles
        return view('articles.edit', compact('profileData', 'article','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
                $input = $request->all();

        // Handle file upload
        if ($image = $request->file('image')) {
            // Delete the old image if it exists
            if ($article->image && file_exists(public_path('article/' . $article->image))) {
                unlink(public_path('article/' . $article->image));
            }

            // Save the new image
            $destinationPath = 'article';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            // If no new image is uploaded, keep the current image
            unset($input['image']);
        }

        // Update the information record with the new data
        $article->update($input);

        return redirect('articles')->with('success', 'article Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
                $article->delete();
        return redirect('articles')->with('success', 'Article Deleted successfully!');
    }
}
