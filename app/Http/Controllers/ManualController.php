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
    public function visits($id){
    $manual = Manual::findOrFail($id);

    $manual=increment('clicks');
    dd($manual);

    if ($manual->locally_available) {
        return redirect("/{$manual->brand->id}/{$manual->brand->getNameUrlEncodeAttribute()}/{$manual->id}/");
    } else {
        return redirect($manual->url);
    }

    }
}
