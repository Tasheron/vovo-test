<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const PAGINATE_COUNT = 20;

    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('q')) {
            $words = explode(' ', $request->input('q'));

            $search = collect($words)
                ->filter()
                ->map(fn($word) => '+' . $word . '*')
                ->implode(' ');

            $query->whereFullText('name', $search, ['mode' => 'boolean']);
        }

        if ($request->filled('price_from')) {
            $query->where('price', '>=', $request->input('price_from'));
        }

        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->input('price_to'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('in_stock')) {
            $query->where('in_stock', $request->boolean('in_stock'));
        }

        if ($request->filled('rating_from')) {
            $query->where('rating', '>=', $request->input('rating_from'));
        }

        if ($request->filled('sort')) {
            match ($request->input('sort')) {
                'price_asc' => $query->orderBy('price', 'asc'),
                'price_desc' => $query->orderBy('price', 'desc'),
                'rating_desc' => $query->orderBy('rating', 'desc'),
                'newest' => $query->orderBy('created_at', 'desc'),

                default => null,
            };
        } else {
            $query->orderBy('rating', 'desc');
        }

        return $query->paginate(self::PAGINATE_COUNT);
    }
}