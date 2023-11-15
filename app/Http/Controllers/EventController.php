<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $events = Event::all();

        $eventsCollection = new EventCollection($events);

        return Inertia::render('Events/Main', [
            'events' => $eventsCollection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): Response
    {
        $eventResource = new EventResource($event);

        return Inertia::render('Events/Detail', [
            'event' => $eventResource
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): Response
    {
        return Inertia::render('Events/Edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): void
    {
        $event->delete();
    }
}
