<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EditorController extends Controller
{

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $extension = $file->getClientOriginalExtension();

            $filename = Str::random(20) . '.' . $extension;

            $file->storeAs('public/uploads', $filename);

            return response()->json([
                'location' => asset('storage/uploads/' . $filename)
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
