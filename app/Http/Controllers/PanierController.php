<?php
namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use App\Models\Panier;
// use App\Models\orders;
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

    public function ShowPainer(Request $request)
    {
        $user = Auth::user();
        $panierItems = DB::table('panier')
        ->join('users', 'users.id', '=', 'panier.user_id')
        ->join('produit', 'produit.id', '=', 'panier.product_id')
        ->select('users.username', 'produit.Name', 'produit.Price', 'produit.image', 'produit.Price','produit.id','produit.Sold','produit.Quantity','panier.status')
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


        $uid = uniqid();
        session()->put('uid',$uid);
        

        return view('G_P.carte',['Carte' => $panierItems, 'PrixTotal' => $totalPrice,'uid'=>$uid]);
    }

    public function Checkout(Request $request, string $token)
    {
        dd($token,session()->get('uid'));

        if($token!=session()->get('uid')) {
            return redirect()->to('index');
        }

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

    public function nachit(Request $request)
    {
        for($i = 0; $i <= count($request->all())/2; $i++)
        {
            $ss = $request->input('product_id_'.$i);
            $ss1 = $request->input('product_qty_'.$i);
            
            if(isset($ss1) && !empty($ss1)) {
                $order = new orders;
                $order->Quantity = $ss1;
                $order->product_id = $ss;
                $order->user_id = Auth::user()->id;
                $order->Total = 20;

                $order->save();

            }
            $Product = Panier::where('product_id', $ss)
            ->where('user_id',Auth::user()->id)
            ->first();
            if($Product) {
                $Product->delete();
            }
        }
        
        return redirect()->back();
    }

    public function thankyou($token)
    {
        if($token!=session()->get('uid1')) {
            return redirect()->to('index');
        }
    }
    public function nachit1(Request $request,$token)
    {
        // dd($token,session()->get('uid'));

        if($token!=session()->get('uid')) {
            return redirect()->to('index');
        }

        // dd(count($request->all())/2);
        $orders = session()->get('orders', []);
        for($i = 0; $i <= count($request->all())/2; $i++)
        {
            $ss = $request->input('product_id_'.$i);
            $ss1 = $request->input('product_qty_'.$i);
            
            if (isset($ss1) && !empty($ss1)) {
                $order = [
                    'product_id' => $ss,
                    'Quantity' => $ss1,
                    'user_id' => Auth::user()->id,
                    'Total' => 20,
                ];
                $orders[] = $order;
            }
        }
        session()->put('orders', $orders);
        return view('G_P.Checkout');
    }

    public function Order_P()
    {
        $total = 0; // Define $total here
        // $orders = orders::select('*')->where('user_id',Auth::user()->id)
        // ->join('users', 'users.id', '=', 'orders.user_id')
        // ->join('produit', 'produit.id', '=', 'orders.product_id')
        // ->select('orders.created_at','orders.Status','orders.Quantity','users.First','users.Address','users.Num_tele','users.Last', 'produit.Name', 'produit.id','produit.Sold', 'produit.image', 'produit.Price','produit.Sold')
        // ->get();
            // $orders = DB::table('orders')
            // ->join('users', 'users.id', '=', 'orders.user_id')
            // ->join('produit', 'produit.id', '=', 'orders.product_id')
            // ->select('orders.created_at', 'orders.Status', 'orders.Quantity', 'users.First', 'users.Address', 'users.Num_tele', 'users.Last', 'produit.Name', 'produit.id', 'produit.Sold', 'produit.image', 'produit.Price', 'produit.Sold')
            // ->whereRaw('(product_id, user_id) IN (
            //                 SELECT product_id, user_id
            //                 FROM orders
            //                 GROUP BY product_id, user_id
            //                 HAVING COUNT(*) > 1
            //             )')
            // ->get();
            $results = DB::table('orders')
            ->select('created_at', 'user_id', DB::raw('sum(Quantity)'), DB::raw('MAX(Status) AS Status'), DB::raw('MAX(id) AS id'))
            ->groupBy('created_at', 'user_id')
            ->get();

        // foreach ($orders as $order) {
        //     $total += $order->Price * $order->Quantity;
        // }
        // dd($total);
            // dd($results);
        return view('G_P.order',['Receiving'=>$results]);
    }

    // public function PDF($id)
    // {
    //     # code...
    // }



}
