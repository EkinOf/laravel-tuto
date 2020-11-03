<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        $rowAlreadyExists = Stock::where('bar_id', $request->input('bar_id'))
            ->where('drink_id', $request->input('drink_id'))
            ->exists();
        if ($rowAlreadyExists) {
            throw new Exception('La boisson est déjà associée au bar.');
        }

        $stock = new Stock;
        $stock->bar_id = $request->input('bar_id');
        $stock->drink_id = $request->input('drink_id');
        $stock->quantity = $request->input('quantity');
        $stock->save();

        return redirect()->route('bars.show', $stock->bar_id);
    }

    public function update(Request $request, int $id)
    {
        $stock = Stock::find($id);
        if (is_null($stock)) {
            return response()->json('Stock non trouvé', 404);
        }

        $stock->quantity = $request->input('quantity');
        $stock->save();
        return response()->json('La quantité a été msie à jour');
    }
}
