<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use App\Models\User;
// use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\Auth;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use BaconQrCode\Encoder\QrCode;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($created_at)
    {
        // $users = Auth::user();
        $order = orders::select('*')
            ->where('user_id', Auth::user()->id)
            ->where('orders.created_at', $created_at) // prefix with table name
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('produit', 'produit.id', '=', 'orders.product_id')
            ->select('orders.created_at', 'orders.Shipping', 'orders.Status', 'orders.Quantity', 'users.First', 'users.Address', 'users.Num_tele', 'users.Last', 'produit.Name', 'produit.id', 'produit.Sold', 'produit.image', 'produit.Price', 'produit.Sold', 'produit.Description')
            ->get();
        // $code = QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9');
        
        // dd($order);
        // dd($order->produit->image);
        // $data = [
        //     'order' => $order,
        //     'users' => $users
        // ]; 

        // $pdf = PDF::loadView('G_P.pdf', ['order'=>$order]);

        // return $pdf->download('itsolutionstuff.pdf');
        $pdf = PDF::loadView('G_P.pdf', ['order' => $order]);
        return $pdf->stream('G_P.pdf');
    }
}
