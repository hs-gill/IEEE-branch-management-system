<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->where('user_id', Auth::user()->id)->first()->get();

        return Inertia::render('../Layouts/AppLayout', [
            'products' => $products,
        ]);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function addToCart(Request $request): void
    {
        $user = Auth::user();
        $item = Item::findOrFail($request->item['id']);
        $item->users()->attach($user);
    }

    /**
     * Add an item to the User's shopping cart.
     */
    public function removeFromCart(Request $request): void
    {
        $user = Auth::user();
        $item = Item::findOrFail($request->item['id']);
        $user->items()->detach($item);
    }

}
