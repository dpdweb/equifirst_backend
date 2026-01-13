<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    protected $viewPath = 'admin.teams';
    protected $routePath = 'teams';
    protected $title = 'Teams';
    protected $singular = "Team";
    protected $plural = "Teams";

    public function index()
    {
        $records = Team::orderBy('sort_id', 'asc')->get();

        return view("{$this->viewPath}.index", [
            'records'   => $records,
            'title'     => "{$this->title}",
            'routePath'     => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => "All {$this->plural}",

        ]);
    }

    public function create()
    {
        return view("{$this->viewPath}.create", [
            'title'     => "Create {$this->title}",
            'routePath'     => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => $request->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|max:255|unique:users,email' . ($user->id ?? '' ? ",$user->id" : ''),
            'phone' => 'required|string|max:20',
            'description' => 'required|string|max:1000',
        ]);

        $imagePath = '';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/teams', $filename, 'public');
        }


        Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'image' => $imagePath,
        ])->save();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->title} created successfully.");
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $record = Team::findOrFail($id);

        return view("{$this->viewPath}.edit", [
            'record'     => $record,
            'title'     => "Edit {$this->title}",
            'routePath'     => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,

        ]);
    }


    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

        $imagePath = $team->image ?? '';

        if ($request->hasFile('image'))
        {
            if ($request->image && Storage::exists('public/' . $request->image))
            {
                Storage::delete('public/' . $request->image);
            }

            $image = $request->file('image');
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/profiles', $filename, 'public');
        }

        $team->name = $request->name;
        $team->role = $request->role;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->phone = $imagePath;
        $team->description = $request->description;
        $team->save();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->title} updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        Storage::delete('public/' . $team->image);
        $team->delete();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->title} deleted successfully.");
    }

    public function sort()
    {

        $records = Team::orderBy('sort_id', 'asc')->get();

        return view("{$this->viewPath}.sort", [
            'records'   => $records,
            'title'     => "Sort {$this->title}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function sortSave(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:teams,id',
            'items.*.sort_id' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Team::where('id', $item['id'])->update([
                'sort_id' => $item['sort_id']
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => "{$this->title} order updated successfully."
        ]);
    }

}
