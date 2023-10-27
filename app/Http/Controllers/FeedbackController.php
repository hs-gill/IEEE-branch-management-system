<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $feedbacks = Feedback::with('user')->get();

        return Inertia::render('Feedbacks/Main', [
            'feedbacks' => $feedbacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Feedbacks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        $user = Auth::user();

        Feedback::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $user->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
