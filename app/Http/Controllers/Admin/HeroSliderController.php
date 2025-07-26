<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSliderController extends Controller
{
    protected $viewPath = 'admin.hero_slide';
    protected $routePath = 'hero-slides';
    protected $title = 'Hero Slides';
    protected $singular = "Hero Slide";
    protected $plural = "Hero Slides";

    public function index()
    {
        $records = HeroSlider::latest()->get();
        return view("{$this->viewPath}.index", [
            'records'   => $records,
            'title'     => "All {$this->title}",
            'routePath'     => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,

        ]);
    }

    public function create()
    {
        return view("{$this->viewPath}.create", [
            'title'     => "All {$this->title}",
            'routePath'     => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,

        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads/hero_sliders', $filename, 'public');
        }

        HeroSlider::create([
            'name' => $request->name,
            'image' => $imagePath, // Absolute path
        ]);

        return redirect()->route("{$this->routePath}.index")->with('success', $this->singular . ' Created!');
    }



    public function edit(HeroSlider $heroSlider)
    {
        return view('hero_sliders.edit', compact('heroSlider'));
    }

    public function update(Request $request, HeroSlider $heroSlider)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($heroSlider->image);

            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            $resized = Image::make($image)->resize(1200, 500)->encode();
            Storage::disk('public')->put('hero_sliders/' . $filename, $resized);

            $heroSlider->image = 'hero_sliders/' . $filename;
        }

        $heroSlider->title = $request->title;
        $heroSlider->save();

        return redirect()->route("{$this->routePath}.index")->with('success', $this->singular . ' Updated!');
    }

    public function destroy(string $id)
    {
        $heroSlider = HeroSlider::findOrFail($id);

        if ($heroSlider->image)
        {
            Storage::disk('public')->delete($heroSlider->image);
        }

        $heroSlider->delete();

        return redirect()->route("{$this->routePath}.index")->with('success', "{$this->singular} Deleted!");

    }
}
