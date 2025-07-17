<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('permission:view client',['only'=> ['index','show']]);
    //    $this->middleware('permission:create client',['only'=> ['create','store']]);
    //    $this->middleware('permission:edit client',['only'=> ['update','edit']]);
    //    $this->middleware('permission:delete client',['only'=> ['destroy']]);

    // }
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');  // Redirect to login if not authenticated
        }
        $id=Auth::user()->id;
        $profileData = User::find($id);
        $clients = Client::where('user_id','=',$id)->get();
        return view ('client.index', compact('profileData','clients'));
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
        return view ('client.create', compact('profileData'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([

            'client_address' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:clients,phone',
            'email' => 'required|email|max:255|unique:clients,email',
            'client_tpin' => 'required|string|max:20',
            'employee_no' => 'required|string|max:50',
            'nrc' => 'required|string|max:20',
            // 'status' => 'required|in:approved,blacklisted',
        ]);

        $slug = Str::slug($request->client_name);
        $originalSlug = $slug;
        $count = 1;

        while (Client::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $client = new Client();
        $client->client_name = $request->input('client_name');
        $client->client_address = $request->input('client_address');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');
        $client->status = $request->input('status');
        $client->client_tpin = $request->input('client_tpin');
        $client->employee_no = $request->input('employee_no');
        $client->nrc = $request->input('nrc');
        $client->slug = $slug;
        $client->user_id = $user->id;
        $client->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'client' => $client,
            ]);
        }

        return redirect('client')->with('success', 'Client created successfully.');
    }


    public function checkUnique(Request $request)
{
    $field = $request->input('field');
    $value = $request->input('value');

    $exists = Client::where($field, $value)->exists();

    return response()->json(['exists' => $exists]);
}



/**
 * Display the specified resource.
 */
public function show(Client $client)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $profileData = Auth::user();
    return view('client.show', compact('client', 'profileData'));
}

// public function updateStatus(Request $request)
// {
//     $request->validate([
//         'client_slug' => 'required|exists:clients,slug',
//         'status' => 'required|in:approved,blacklisted',
//     ]);

//     $client = Client::where('slug', $request->client_slug)->firstOrFail();
//     $client->status = $request->status;
//     $client->save();

//     return redirect()->back()->with('success', 'Client status updated!');
// }

public function updateStatus(Request $request, $slug)
{
    $request->validate([
        'status' => 'required|in:approved,blacklisted',
    ]);

    $client = Client::where('slug', $slug)->firstOrFail();
    $client->status = $request->status;
    $client->save();

    return redirect()->back()->with('success', 'Client status updated!');
}

// public function approved()
// {
//     if (!Auth::check()) {
//         return redirect()->route('login'); // Redirect to login if not authenticated
//     }

//     $clients = Client::where('status', 'approved')->get();
//     return view('client.approved', compact('clients'));
// }






/**
 * Show the form for editing the specified resource.
 */
public function edit(Client $client)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $profileData = Auth::user();
    return view('client.edit', compact('client', 'profileData'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Client $client)
{
    $request->validate([
        'client_name' => 'required|string|max:255',
        'client_address' => 'required|string|max:255',
        // 'phone' => 'required|string|max:15',
        // 'email' => 'required|email|max:255',
        // 'client_tpin' => 'required|string|max:20',
    ]);

    $slug = Str::slug($request->client_name);
    $originalSlug = $slug;
    $count = 1;

    while (Client::where('slug', $slug)->where('id', '!=', $client->id)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    $client->update([
        'client_name' => $request->input('client_name'),
        'client_address' => $request->input('client_address'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'client_tpin' => $request->input('client_tpin'),
        'status' => $request->input('status'),
        'employee_no' => $request->input('employee_no'),
        'nrc' => $request->input('nrc'),
        'slug' => $slug,
    ]);

    return redirect()->route('client.index')->with('success', 'Client updated successfully.');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Client $client)
{
    $client->delete();

    return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
}

}
