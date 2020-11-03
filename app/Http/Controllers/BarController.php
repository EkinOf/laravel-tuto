<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use App\Models\Drink;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BarController extends Controller
{
    public function index()
    {
        $bars = Bar::all();
        return view('bars.index', compact('bars'));
    }

    public function create()
    {
        return view('bars.create');
    }

    public function store(Request $request)
    {
        $bar = new Bar;
        $bar->name = $request->input('name');
        $bar->location = $request->input('location');
        $bar->save();

        return redirect()->route('bars.index');
    }

    public function show(int $id)
    {
        $bar = Bar::find($id);
        if (is_null($bar)) {
            return redirect()->route('bars.index');
        }

        $bar->load('stocks.drink');
        $newDrinks = Drink::whereNotIn('id', $bar->stocks->pluck('drink_id')->toArray())->get();
        return view('bars.show', compact('bar', 'newDrinks'));
    }

    /**
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(int $id)
    {
        $bar = Bar::find($id);
        if (is_null($bar)) {
            return response()->json('Bar non trouvé', 404);
        }

        $bar->delete();
        return response()->json('Le bar a bien été supprimé.');
    }
}
