<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function update(Request $request, Click $click)
    {
        $click->click += 1;
        $click->save();

        return redirect()->route('click');
    }
}
