<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PurchaseHistory;
use Illuminate\Http\Request;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $results = PurchaseHistory::all();

        return view('admin.purchase-history.index', compact('results'));
    }

    public function destroy($id)
    {
        $item = PurchaseHistory::query()->firstWhere('id', $id);
        $item->delete();

        return back();
    }

    public function confirm($id)
    {
        $item = PurchaseHistory::query()->firstWhere('id', $id);
        $item->update(['status' => 2]);

        return back();
    }
}
