<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Models\Item;
use App\Models\Order;
use App\Models\Textbook;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $products = Item::with('users')
            ->where('user_id', Auth::user()->id)->get();

        return Inertia::render('../Layouts/AppLayout', [
            'products' => $products,
        ]);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function addItemToCart(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $item = Item::findOrFail($request->item['id']);
        $item->users()->attach($user);
        return redirect('/items/'.$request->item['id']);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function removeItemFromCart(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $item = Item::findOrFail($request->item['id']);
        $user->items()->detach($item);
        return redirect()->back();
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function addTextbookToCart(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $textbook = Textbook::findOrFail($request->textbook['id']);
        $textbook->users()->attach($user);
        return redirect('/textbooks/'.$request->textbook['id']);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function removeTextbookFromCart(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $textbook = Textbook::findOrFail($request->textbook['id']);
        $user->textbooks()->detach($textbook);
        return redirect()->back();
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function emptyCart(): RedirectResponse
    {
        $user = User::findOrFail(Auth::user()->id);
        foreach ($user->items as $item) { $user->items()->detach($item); }
        foreach ($user->textbooks as $textbook) { $user->textbooks()->detach($textbook); }
        return redirect()->back();
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function checkout(Request $request): RedirectResponse
    {
        app('App\Http\Controllers\OrderController')->store($request);
        $this->emptyCart();

        session()->flash('flash.banner', __('Thank you, :user! Your order has been created successfully.', ['user' => Auth::user()->name]));
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

}
