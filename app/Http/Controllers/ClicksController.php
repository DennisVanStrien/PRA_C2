<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Click; // Zorg ervoor dat je het juiste model importeert

class ClicksController extends Controller
{
    public function index()
    {
        // Haal alle Click items op
        $manuals = Click::all();

        // Stuur de data naar de view
        return view('pages.manual_list', compact('manuals'));
    }

    public function updateClicks(Request $request)
    {
        $newClick = new Click;
        $newClick->click = $request->click;
        $newClick->save();
    }
}

?>
