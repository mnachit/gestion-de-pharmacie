<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Http\Controllers\PanierController;
use Carbon\Carbon;

class ShowDataController extends Controller
{
    public function show()
    {
        $Product = Produit::select('*')->orderby("id","ASC")->get();

        return view('G_P.shop', ['Data_Shop' => $Product]);
    }

    public function test()
    {
        $test = new PanierController;
        $test->check();

        return view('G_P.index');
    }

    public function shop_single($id)
    {
        $product = Produit::findOrFail($id);

        // dd($product);
        return view('G_P.shop-single', ['shop_single' => $product]);
        // return redirect();
    }

    public function showNew()
    {
        $test = new PanierController;
        $test->check();

        // return view('G_P.index');
        $startDate = Carbon::now()->subDays(5)->startOfDay();
        $endDate = Carbon::now();

        $Product = Produit::select('*')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
        return view('G_P.index', ['Data_Shop1' => $Product]);
    }

}
