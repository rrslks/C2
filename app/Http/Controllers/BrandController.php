<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::where('brand_id', $brand_id)->get();
        $top5Manuals = Manual::where('brand_id', $brand_id)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return view('pages.manual_list', [
            "brand" => $brand,
            "manuals" => $manuals,
            "top5Manuals" => $top5Manuals
        ]);
    }

    public function showByLetter(Request $request, $letter)
    {
        // Get all brands that start with the given letter
        $brands = Brand::where('name', 'LIKE', $letter . '%')
            ->orderBy('name')
            ->get();

        // Get top 10 manuals for SEO
        $top10manuals = Manual::with(['brand'])
            ->orderBy('views', 'desc')
            ->take(10)
            ->get();

        return view('pages.brands_by_letter', [
            'brands' => $brands,
            'letter' => strtoupper($letter),
            'top10manuals' => $top10manuals
        ]);
    }
}
