<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    protected $viewPath = 'admin.hero_sliders';
    protected $routePath = 'hero-sliders';
    protected $title = 'Hero Sliders';
    protected $singular = "Hero Slider";
    protected $plural = "Hero Sliders";

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
        return view('admin.hero_sliders.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/hero_sliders', $filename, 'public');
        }

        HeroSlider::create([
            'name' => $request->name,
            'image' => $imagePath, // Absolute path
        ]);

        return redirect()->route('hero-sliders.index')->with('success', 'Hero Slider Updated!');
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

        return redirect()->route('hero-sliders.index')->with('success', 'Hero Slider Updated!');
    }

    public function destroy(HeroSlider $heroSlider)
    {
        Storage::disk('public')->delete($heroSlider->image);
        $heroSlider->delete();

        return redirect()->route('hero-sliders.index')->with('success', 'Hero Slider Deleted!');
    }
}
