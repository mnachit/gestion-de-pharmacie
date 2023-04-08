<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $tag_image = $request->file('image_pro');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($tag_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $location = 'img/blogs/';
        $tag_image->move($location,$img_name);

        // dd($img_name);
        $produit = new Produit;
        $produit->image = $img_name;
        $produit->date = $request->Date_P;
        $produit->type = $request->Produit;
        $produit->Name = $request->Nome_P;
        $produit->Description = $request->Description_P;
        $produit->Price = $request->Price_P;
        $produit->Sold = $request->Sold_P;
        $produit->Quantity = $request->Quantity_P;
        $produit->save();
    
        return redirect('/Add_Prduct')->with('success', 'User has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $Product = Produit::select('*')->orderby("id","ASC")->get();

        return view('Dash.add_prduct', ['Data_Product' => $Product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produit::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduitRequest  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id_product;
        $produit = Produit::find($id);
        $tag_image = $request->file('image_pro1');
        if(!empty($image))
        {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($tag_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $location = 'img/blogs/';
            $tag_image->move($location,$img_name);
            $produit->image = $img_name;
            $produit->date = $request->Date_P1;
            $produit->Name = $request->Nome_P1;
            $produit->Description = $request->Description_P1;
            $produit->Price = $request->Price_P1;
            $produit->Sold = $request->Sold_P1;
            $produit->Quantity = $request->Quantity_P1;
        }
        else
        {
            $produit->date = $request->Date_P1;
            $produit->Name = $request->Nome_P1;
            $produit->Description = $request->Description_P1;
            $produit->Price = $request->Price_P1;
            $produit->Sold = $request->Sold_P1;
            $produit->Quantity = $request->Quantity_P1;
        }
        $produit->update();

        return redirect('Add_Prduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Product = Produit::find($id);

         $Product->delete();

         return redirect('Add_Prduct');
    }

    public function k()
    {
        
    }
}
