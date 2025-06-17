<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{

    public function index()
    {
        $records = \App\Models\Team::all();

        return view('admin.team.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('teams', $filename, 'public');


        Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'image' => env('APP_URL') . '/storage/app/public/teams/' . $filename,
        ])->save();

        return redirect()->route('teams.index')->with('success', 'Team member created successfully.');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $record = Team::findOrFail($id);

        return view('admin.team.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

        if ($request->hasFile('image')) {

            echo $urlPrefix = env('APP_URL') . '/public/storage/';
            echo "<br>";
            echo $relativePath = str_replace($urlPrefix, '', $team->image);



            if (Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('teams', $filename, 'public');

            $team->image = env('APP_URL') . '/public/storage/teams/' . $filename;
        }

        $team->name = $request->name;
        $team->role = $request->role;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->description = $request->description;
        $team->save();

        return redirect()->route('teams.index')->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team member deleted successfully.');
    }
}
