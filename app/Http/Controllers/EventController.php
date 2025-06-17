<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $records = Event::latest()->get();
        return view('admin.event.index', compact('records'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'start_date' => 'nullable|date',
            'islamic_date' => 'nullable|string',
            'image' => 'nullable|image',
            'language' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);
        return redirect()->route('events.index')->with('success', 'Event created');
    }

    public function edit(Event $event)
    {
        $record = $event;
        return view('admin.event.edit', compact('record'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'start_date' => 'nullable|date',
            'islamic_date' => 'nullable|string',
            'image' => 'nullable|image',
            'language' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);
        return redirect()->route('events.index')->with('success', 'Event updated');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted');
    }
}
