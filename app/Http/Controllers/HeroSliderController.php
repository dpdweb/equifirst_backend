<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    public function index()
    {
        $records = HeroSlider::latest()->get();
        return view('admin.hero_sliders.index', compact('records'));
    }

    public function create()
    {
        return view('admin.hero_sliders.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $image = $request->file('image');
    //     $targetWidth = 1200;
    //     $targetHeight = 500;

    //     $filename = time() . '.' . $image->getClientOriginalExtension();
    //     $storagePath = storage_path('app/public/hero_sliders');

    //     // Ensure the directory exists
    //     if (!file_exists($storagePath)) {
    //         mkdir($storagePath, 0777, true);
    //     }

    //     $sourcePath = $image->getPathname();
    //     $destinationPath = $storagePath . '/' . $filename;

    //     list($width, $height) = getimagesize($sourcePath);
    //     $resizedImage = imagecreatetruecolor($targetWidth, $targetHeight);

    //     switch ($image->getClientOriginalExtension()) {
    //         case 'jpeg':
    //         case 'jpg':
    //             $sourceImage = imagecreatefromjpeg($sourcePath);
    //             break;
    //         case 'png':
    //             $sourceImage = imagecreatefrompng($sourcePath);
    //             imagealphablending($resizedImage, false);
    //             imagesavealpha($resizedImage, true);
    //             break;
    //         default:
    //             return back()->with('error', 'Unsupported image format');
    //     }

    //     imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    //     // Save resized image
    //     if (in_array($image->getClientOriginalExtension(), ['jpeg', 'jpg'])) {
    //         imagejpeg($resizedImage, $destinationPath, 90);
    //     } else {
    //         imagepng($resizedImage, $destinationPath);
    //     }

    //     imagedestroy($resizedImage);
    //     imagedestroy($sourceImage);

    //     $publicUrl = \Storage::url('hero_sliders/' . $filename);


    //     HeroSlider::create([
    //         'title' => $request->title,
    //         'image' => $publicUrl, // Absolute path
    //     ]);

    //     return back()->with('success', 'Hero image uploaded and saved.');
    // }

public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);


    $image = $request->file('image');
    $filename = time() . '.' . $image->getClientOriginalExtension();

    // Store file
    $path = $image->storeAs('hero_slider', $filename, 'public');


    HeroSlider::create([
        'title' => $request->title,
        'image' => env('APP_URL') . '/storage/app/public/hero_slider/' . $filename, // Absolute path
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
