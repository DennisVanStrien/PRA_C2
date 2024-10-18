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
        $manuals = Manual::all()->where('brand_id', $brand_id);

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals
        ]);

    }
    public function getTopManualsForBrand($brand_id, $brand_slug)
    {

        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);

        // Haal de top 5 manuals op voor het opgegeven brand_id
        $topBrandManuals = Manual::where('brand_id', $brand_id)
            ->orderBy('clicks', 'desc')
            ->take(5)
            ->get();

        // Controleer of er manuals zijn gevonden
        if ($topBrandManuals->isEmpty()) {
            // Hier kun je een foutmelding of een andere logica toevoegen
            return redirect()->back()->with('error', 'Geen manuals gevonden voor dit merk.');
        }

        // Zorg ervoor dat $brandId wordt doorgegeven aan de view
        return view('pages/manual_list', [
            'topBrandManuals' => $topBrandManuals,
            'brandId' => $brand_id, // Voeg brandId toe
            "brand" => $brand,
            "manuals" => $manuals
        ]);
    }
}
