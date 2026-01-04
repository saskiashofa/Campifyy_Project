<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Sewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('user.cart', compact('cart'));
    }

    public function add($id_prod)
    {
        $product = Produk::where('id_prod', $id_prod)->first();
        if(!$product){
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan'
            ]);
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id_prod])){
            $cart[$id_prod]['quantity']++;
        } else {
            $cart[$id_prod] = [
                'id_prod' => $product->id_prod,
                'nama' => $product->nama,
                'harga_day' => $product->harga_day,
                'gambar' => $product->gambar,
                'quantity' => 1,
                'start_date' => date('Y-m-d'),
                'end_date' => date('Y-m-d', strtotime('+1 day')),
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['status' => 'success']);
    }

    public function increase($id_prod)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id_prod])){
            $cart[$id_prod]['quantity']++;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function decrease($id_prod)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id_prod])){
            if($cart[$id_prod]['quantity'] > 1){
                $cart[$id_prod]['quantity']--;
            } else {
                unset($cart[$id_prod]);
            }
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function remove($id_prod)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id_prod]);
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function updateDates(Request $request, $id_prod)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id_prod])) {
            if ($request->type === 'start') {
                $cart[$id_prod]['start_date'] = $request->value;
            } else {
                $cart[$id_prod]['end_date'] = $request->value;
            }

            if (strtotime($cart[$id_prod]['end_date']) < strtotime($cart[$id_prod]['start_date'])) {
                $cart[$id_prod]['end_date'] = $cart[$id_prod]['start_date'];
            }
        }

        session()->put('cart', $cart);

        return response()->json(['status' => 'success']);
    }

    public function updateQuantity(Request $request, $id_prod)
    {
        $change = $request->change; 
        $cart = session()->get('cart', []);

        if(isset($cart[$id_prod])){
            $cart[$id_prod]['quantity'] += $change;
            if($cart[$id_prod]['quantity'] <= 0){
                unset($cart[$id_prod]);
            }
            session()->put('cart', $cart);
        }

        return response()->json(['status' => 'success']);
    }

    public function sewaPage()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)){
            return redirect()->route('cart.index')->with('error','Keranjang kosong!');
        }

        $totalHarga = 0;
        foreach($cart as $id_prod => $item){
            $days = (strtotime($item['end_date']) - strtotime($item['start_date']))/86400 + 1;
            $item['subtotal'] = $item['harga_day'] * $item['quantity'] * $days;
            $totalHarga += $item['subtotal'];
        }

        return view('user.sewa', compact('cart', 'totalHarga'));
    }

    public function processSewa(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kosong!');
        }

        $bukti = null;
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $bukti = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bukti'), $bukti);
        }

        foreach ($cart as $item) {
            $days = (strtotime($item['end_date']) - strtotime($item['start_date'])) / 86400 + 1;
            $subtotal = $item['harga_day'] * $item['quantity'] * $days;

            Sewa::create([
                'user_id'          => Auth::id(),
                'id_prod'          => $item['id_prod'],
                'total_hari'       => $days,
                'total_harga'      => $subtotal,
                'status'           => 'pending',
                'tgl_mulai'        => $item['start_date'],
                'tgl_selesai'      => $item['end_date'],
                'payment_method'   => $request->payment_method,
                'bukti_pembayaran' => $bukti,
            ]);
        }

        session()->forget('cart');

        return redirect()->route('history')
    ->with('success', 'Pesanan Anda telah berhasil dibuat');
    }
}
