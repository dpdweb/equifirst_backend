<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    protected $viewPath = 'admin.testimonials';
    protected $routePath = 'testimonials';
    protected $title = 'Testimonials';
    protected $singular = "Testimonial";
    protected $plural = "Testimonials";

    public function index()
    {
        $records = Testimonial::latest()->get();

        return view("{$this->viewPath}.index", compact('records') + [
            'title' => "All {$this->title}",
            'routePath' => $this->routePath,
            'singular' => $this->singular,
            'plural' => $this->plural,
        ]);
    }

    public function create()
    {
        return view("{$this->viewPath}.create", [
            'title' => "Create {$this->singular}",
            'routePath' => $this->routePath,
            'singular' => $this->singular,
            'plural' => $this->plural,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/testimonials', $filename, 'public');
        }

        Testimonial::create($request->only(['name', 'designation', 'description', 'rating']) + [
            'image' => $imagePath,
        ]);

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} created successfully.");
    }

    public function edit($id)
    {
        $record = Testimonial::findOrFail($id);

        return view("{$this->viewPath}.edit", compact('record') + [
            'title' => "Edit {$this->singular}",
            'routePath' => $this->routePath,
            'singular' => $this->singular,
            'plural' => $this->plural,
        ]);
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $testimonial->image;

        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            $image = $request->file('image');
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/testimonials', $filename, 'public');
        }

        $testimonial->update($request->only(['name', 'designation', 'description', 'rating']) + [
            'image' => $imagePath,
        ]);

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} updated successfully.");
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image && Storage::disk('public')->exists($testimonial->image)) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} deleted successfully.");
    }
}
