<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostTag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    protected $viewPath = 'admin.tags';
    protected $routePath = 'tags';
    protected $title = 'Tags';
    protected $singular = 'Tag';
    protected $plural = 'Tags';

    public function index()
    {

        $records = PostTag::orderBy('created_at', 'desc')->get();

        return view("{$this->viewPath}.index", [
            'records'   => $records,
            'title'     => "All {$this->plural}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function create()
    {

        return view("{$this->viewPath}.create", [
            'title'     => "Add {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:post_tags,name',
        ]);

        $slug = Str::slug($request->name);

        $originalSlug = $slug;
        $count = 1;

        while (PostTag::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }


        PostTag::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} Created!");
    }

    public function edit(PostTag $tag)
    {
        return view("{$this->viewPath}.edit", [
            'record'    => $tag,
            'title'     => "Edit {$this->singular}",
            'routePath' => $this->routePath,
            'singular'  => $this->singular,
            'plural'    => $this->plural,
        ]);
    }

    public function update(Request $request, PostTag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:post_tags,name,' . $tag->id,
        ]);

        $slug = Str::slug($request->name);

        if ($tag->name !== $request->name) {

            $originalSlug = $slug;
            $count = 1;

            while (
                PostTag::where('slug', $slug)
                    ->where('id', '!=', $tag->id)
                    ->exists()
            ) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

        } else {
            $slug = $tag->slug;
        }


        $tag->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);



        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} Updated!");
    }

    public function destroy(PostTag $tag)
    {
        $tag->delete();

        return redirect()->route("{$this->routePath}.index")
            ->with('success', "{$this->singular} Deleted!");
    }

}
