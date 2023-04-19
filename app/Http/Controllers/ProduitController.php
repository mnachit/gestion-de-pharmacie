<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\orders;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\User;
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
        // $tag_image = $request->file('image_pro');
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($tag_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $location = 'img/blogs/';
        // $tag_image->move($location,$img_name);

        $result = Cloudinary::upload($request->file('image_pro')->getRealPath(), [
            "folder" => "product/",
            "public_id" => "poster_" . time(),
            "overwrite" => true
        ]);
        // dd($result);
        // dd($img_name);
        $produit = new Produit;
        $produit->image = $result->getSecurePath();
        $produit->date = $request->Date_P;
        $produit->type = $request->Produit;
        $produit->Name = $request->Nome_P;
        $produit->Description = $request->Description_P;
        $produit->Price = $request->Price_P;
        $produit->Sold = $request->Sold_P;
        $produit->Quantity = $request->Quantity_P;
        $produit->Quantité_O = $request->Quantity_P;
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
        $Product = Produit::select('*')->orderby("id", "ASC")->get();

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
        // dd($data);
        return response()->json($data);
    }

    public function Notification()
    {
        $orders = orders::get();
        $user_ids = $orders->pluck('user_id')->toArray();
        return response()->json($user_ids);
    }

    public function Show_User($id)
    {
        $data = User::find($id);
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
        if (!empty($image)) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($tag_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $location = 'img/blogs/';
            $tag_image->move($location, $img_name);
            $produit->image = $img_name;
            $produit->date = $request->Date_P1;
            $produit->Name = $request->Nome_P1;
            $produit->Description = $request->Description_P1;
            $produit->Price = $request->Price_P1;
            $produit->Sold = $request->Sold_P1;
            $produit->Quantity = $request->Quantity_P1;
        } else {
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

    public function Receiving()
    {
        $order = orders::select('*')->orderBy('id', 'desc')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('produit', 'produit.id', '=', 'orders.product_id')
            ->select('orders.created_at', 'orders.Status', 'orders.id', 'orders.Quantity', 'users.First', 'users.Address', 'users.Num_tele', 'users.Last', 'produit.Name', 'produit.Sold', 'produit.image', 'produit.Price', 'produit.Sold')
            ->get();

        // dd($order);
        return view('Dash.receiving_requests', ['Receiving' => $order]);
    }
    public function remove($id)
    {
        // $Product = orders::find($id);

        // $Product->delete();

        // return redirect()->back();
        $Cn = orders::find($id);
        $Cn->Status = "NO";

        $Cn->update();
        return redirect()->back();
    }
    public function Cn_Receiving($id)
    {
        $Cn = orders::find($id);
        $Cn->Status = "true";

        $Cn->update();
        return redirect()->back();
    }
    public function All_P()
    {
        $admin = User::select('*')->where('Role', 'ADMIN')->get();
        return view('Dash.pharmacy', ['Admin' => $admin]);
    }
    public function All_U()
    {
        $admin = User::select('*')->where('Role', 'USER')->get();
        return view('Dash.pharmacy', ['Admin' => $admin]);
    }

    public function dashbord()
    {
        $admin = User::where('Role', 'ADMIN')->count();
        $user = User::where('Role', 'USER')->count();
        $Product = Produit::count();
        $Product1 = Produit::select('*')->orderby("id", "ASC")->get();

        return view('Dash.dashbord', ['admin' => $admin, 'user' => $user, 'Product' => $Product, 'Product1' => $Product1]);
    }
}
