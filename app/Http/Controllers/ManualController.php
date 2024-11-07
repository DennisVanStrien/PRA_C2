<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }

    public function clicksAndRedirect($id){
        $manual = Manual::findOrFail($id);
        $manual->increment('clicks');

    if ($manual->locally_available) {
            return redirect()->away(route('manual.download', $manual->id));
    } else {
        return redirect()->away($manual->originUrl);
    }
}

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getTopManuals()
    {
        // Haal alle merken op en sorteer ze op naam
        $brands = Brand::all()->sortBy('name');

        // Haal de top 5 manuals op gesorteerd op aantal clicks
        $topManuals = Manual::orderBy('clicks', 'desc')->take(10)->pluck('name');

        // Stuur de gegevens naar de view: zowel 'brands', 'topManuals' als 'name'
        return view('pages.homepage', [
            'brands' => $brands,
            'topManuals' => $topManuals, // Gebruik topManuals in plaats van topItems
            'name' => 'Kenji en Dennis',
        ]);
    }
}
