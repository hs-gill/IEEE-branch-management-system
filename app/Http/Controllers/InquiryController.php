<?php

namespace App\Http\Controllers;

use App\Mail\NewInquiry;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request): void
    {
        $newInquiry = new Inquiry();
        $newInquiry->name = $request->name;
        $newInquiry->email = $request->email;
        $newInquiry->message = $request->message;
        $newInquiry->save();

        Mail::to($request->user())->send(new NewInquiry($newInquiry));

        session()->flash('flash.banner', __('Thank you, :user! Our team have successfully received your inquiry.', ['user' => Auth::user()->name]));
        session()->flash('flash.bannerStyle', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inquiry $inquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        //
    }
}
