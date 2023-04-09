<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanierController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->check();
    // }
    public function addToPanier($id)
    {
        // dd($id);
        $user = Auth::user();
        $products = Panier::where('user_id', $user->id)->get();
        foreach ($products as $product) {
            if ($id == $product->product_id) {
                // The product already exists in the user's panier
                // return "Product already exists in the panier.";
                return back()->with('message1', 'Your message has been sent!');
            }
        }
        // return ;
        $panier = new Panier();
        $panier->product_id = $id;
        $panier->user_id = auth()->user()->id;
        $panier->save();

        $test = new PanierController;
        $test->check();

        return back()->with('message11', 'Your message has been sent!');
    }


    public function check()
    {
        $user = Auth::user();
        // return $user->id;
        if ($user)
        {
            $products = Panier::where('user_id', $user->id)->get();
            $num_columns = $products->count();
            // dd($num_columns);
            session()->put('number', $num_columns);
            if ($num_columns == 0)
            {
                session()->forget('number');
            }
        }
    }

    public function ShowPainer()
    {
        $user = Auth::user();
        $panierItems = DB::table('panier')
        ->join('users', 'users.id', '=', 'panier.user_id')
        ->join('produit', 'produit.id', '=', 'panier.product_id')
        ->select('users.username', 'produit.Name', 'produit.Price', 'produit.image', 'produit.Price','produit.id','produit.Sold','panier.status')
        ->where('status', '=', 'false')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        $totalPrice = 0;
        
        foreach ($panierItems as $item) {
            if ($item->Sold == 0) {
                $totalPrice += $item->Price;
            } else {
                $totalPrice += $item->Sold;
            }
        }
        return view('G_P.carte',['Carte' => $panierItems, 'PrixTotal' => $totalPrice]);
    }

    public function Checkout()
    {
        Session::put('index_page_visited', true);

        return view('G_P.Checkout');
    }

    public function DeletePr($id)
    {
        $Carte = Panier::where('product_id',$id);

        if ($Carte) {
            $Carte->delete();
        }

        return redirect('/Carte');
    }
    
    public function Shhow($id)
    {
        $user = Auth::user();

        $panierItems = DB::table('panier')
        ->join('users', 'users.id', '=', 'panier.user_id')
        ->join('produit', 'produit.id', '=', 'panier.product_id')
        ->select('users.username', 'produit.Name', 'produit.Price', 'produit.image', 'produit.Price','produit.id','produit.Sold','panier.status','panier.id')
        ->where('status', '=', 'false')
        ->where('panier.product_id', '=', $id)
        ->get();

        $totalPrice = 0;
        
        foreach ($panierItems as $item) {
            if ($item->Sold == 0) {
                $totalPrice += $item->Price;
            } else {
                $totalPrice += $item->Sold;
            }
        }
        return response()->json($totalPrice);
    }


    public function index()
    {
        Session::put('index_page_visited', true);

        // return view or redirect to the index page
    }

}
