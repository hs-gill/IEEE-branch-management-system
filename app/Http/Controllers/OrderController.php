<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Inertia\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $orders = Order::with('user', 'items')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Orders/Main', [
            'orders' => $orders
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
    public function store(Request $request): void
    {
        $newOrder = null;
        if ($user_id = Auth::user()->id) {
            $newOrder = new Order();
            $newOrder->total = $request->total;
            $newOrder->user_id = $user_id;
            $newOrder->returned_at = $request->returned_at;
            $newOrder->save();
        }

        foreach ($request->items as $item) {
            $i = Item::findOrFail($item['id']);
            $newOrder->items()->attach($i);
        }

        Mail::to($request->user())->send(new NewOrder($newOrder));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): Response
    {
        $order = Order::with('user', 'items')
            ->where('user_id', Auth::user()->id)
            ->get();
        return Inertia::render('Orders/Show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): void
    {
        $order->delete();
    }

    /**
     * Display a listing of the resource.
     */
    public function userOrders(): Response
    {
        $orders = Order::with('user', 'items')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Orders/UserOrders', [
            'orders' => $orders
        ]);
    }
}
