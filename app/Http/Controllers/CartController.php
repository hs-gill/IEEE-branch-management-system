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
    public function addItemToCart(Request $request): void
    {
        $user = Auth::user();
        $item = Item::findOrFail($request->item['id']);
        $item->users()->attach($user);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function removeItemFromCart(Request $request): void
    {
        $user = Auth::user();
        $item = Item::findOrFail($request->item['id']);
        $user->items()->detach($item);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function addTextbookToCart(Request $request): void
    {
        $user = Auth::user();
        $textbook = Textbook::findOrFail($request->textbook['id']);
        $textbook->users()->attach($user);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function removeTextbookFromCart(Request $request): void
    {
        $user = Auth::user();
        $textbook = Textbook::findOrFail($request->textbook['id']);
        $user->textbooks()->detach($textbook);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function emptyCart(): void
    {
        $user = User::findOrFail(Auth::user()->id);
        foreach ($user->items as $item) { $user->items()->detach($item); }
        foreach ($user->textbooks as $textbook) { $user->textbooks()->detach($textbook); }
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function checkout(Request $request): RedirectResponse
    {
//        dd($request);
        app('App\Http\Controllers\OrderController')->store($request);
        $this->emptyCart();

        session()->flash('flash.banner', __('Thank you, :user! Your order has been created successfully.', ['user' => Auth::user()->name]));
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

}
