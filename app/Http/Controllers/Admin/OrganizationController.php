<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Organization, User};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class OrganizationController extends Controller
{

    public function index()
    {
        $records = Organization::all();

        return view('admin.organizations.index', compact('records'));
    }


    public function create()
    {
        return view('admin.organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $logoPath = '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('organizations', $filename, 'public');
            $logoPath = env('APP_URL') . '/storage/app/public/organizations/' . $filename;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('organization');

        Organization::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'logo' => $logoPath,
        ]);

        return redirect()->route('organizations.index')->with('success', 'Organization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $record = Organization::findOrFail($id);

        return view('admin.organizations.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {




        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'password' => 'nullable|string|min:6',
        ]);



        $user = User::findOrFail($request->user_id);


        $logoPath = $user->organization->logo ?? ''; // keep existing if not changed

        if ($request->hasFile('image')) {

            echo $user->organization->logo;
            echo "<br>";
            // $urlPrefix = env('APP_URL') . '/public/storage/';
            // echo $relativePath = str_replace($urlPrefix, '', $user->organization->logo);
            echo $relativePath = Str::after($user->organization->logo, '/storage/');

            if (Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
            }

            // die();

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('organizations', $filename, 'public');
            // $logoPath = env('APP_URL') . '/storage/app/public/organizations/' . $filename;
            $logoPath = asset('storage/organizations/'.$filename);
        }

        // Update user
        $user->name = $request->name;
        // $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Optional: update role if needed
        // $user->syncRoles(['organization']);

        // Update organization
        $organization = Organization::where('user_id', $user->id)->first();
        if ($organization) {
            $organization->update([
                'name' => $request->name,
                // 'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'logo' => $logoPath,
            ]);
        }

        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $organization = Organization::findOrFail($id);

        $user = $organization->user;

        $organization->delete();

        if ($user) {
            $user->delete();
        }

        return redirect()->route('organizations.index')->with('success', 'Organization and user deleted successfully.');
    }
}
