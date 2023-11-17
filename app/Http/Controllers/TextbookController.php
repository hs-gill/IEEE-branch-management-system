<?php

namespace App\Http\Controllers;

use App\Models\Textbook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TextbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $textbooks = Textbook::all();
        return Inertia::render('Textbooks/Main', [
            'textbooks' => $textbooks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Textbooks/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $textbook = new Textbook();
        $textbook->title = $request->title;
        $textbook->author = $request->author;
        $textbook->save();
        return redirect('/textbooks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Textbook $textbook): Response
    {
        return Inertia::render('Textbooks/Show', [
            'textbook' => $textbook
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Textbook $textbook): Response
    {
        return Inertia::render('Textbooks/Edit', [
            'textbook' => $textbook
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Textbook $textbook): void
    {
        if ($request->title != null) { $textbook->title = $request->title; }
        if ($request->author != null) { $textbook->author = $request->author; }
        $textbook->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Textbook $textbook): void
    {
        $textbook->delete();
    }
}
