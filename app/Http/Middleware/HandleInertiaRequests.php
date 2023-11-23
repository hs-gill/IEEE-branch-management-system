<?php

namespace App\Http\Middleware;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $items = null;
        if ($user = $request->user()) {
            $items = Item::with('price')
                ->whereHas('users', function($q) use($user) {
                    $q->where('user_id', $user->first()->id);
                })->get();
        }

        return array_merge(parent::share($request), [
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'role' => fn () => $request->user()
                ? $request->user()->first()->roles->first() : null,
            'products' => fn () => $items
        ]);
    }
}
