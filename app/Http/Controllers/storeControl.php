<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\History;
use App\Models\produk;
use Illuminate\Http\Request;

class storeControl extends Controller
{
    public function index(){
        $produk = produk::all();
        return view('store',['produk'=>$produk]);
    }

    public function Checkout(Request $request) {

        $produk = produk::where('id', $request->input('produk'))->first();

        $duitkuConfig = new \Duitku\Config("96e16b0c9499829364911796f25b4661", "DS18317");
        // false for production mode
        // true for sandbox mode
        $duitkuConfig->setSandboxMode(true);
        // set sanitizer (default : true)
        $duitkuConfig->setSanitizedMode(false);
        // set log parameter (default : true)
        $duitkuConfig->setDuitkuLogs(true);

        $awalan = "BE";
        $last = History::where('orderId', 'like', $awalan . '%')->latest()->first();

        if (!$last) {
            $orderid = $awalan . '00001';
        }else{
        $number = intval(substr($last->orderId, strlen($awalan)));
         $number++;
         $order = str_pad($number, 5, '0', STR_PAD_LEFT);
         $orderid = $awalan . $order;
        }

        // $paymentMethod      = ""; // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
        $paymentAmount      = $produk->harga; // Amount
        $email              = 'rasidokai@gmail.com'; // your customer email
        $phoneNumber        = "081234567890"; // your customer phone number (optional)
        $productDetails     = $produk->name;
        $merchantOrderId    = $orderid; // from merchant, unique
        $additionalParam    = ''; // optional
        $merchantUserInfo   = ''; // optional
        $customerVaName     = 'Rasiyd Shiddiq'; // display name on bank confirmation display
        $callbackUrl        = 'https://l.r45id.online/callback'; // url for callback
        $returnUrl          = 'https://l.r45id.online'; // url for redirect
        $expiryPeriod       = 60; // set the expired time in minutes

        // Customer Detail
        $firstName          = "Rasyid";
        $lastName           = "Shiddiq";



        $customerDetail = array(
            'firstName'         => $firstName,
            'lastName'          => $lastName,
            'email'             => $email,
        );

        // Item Details
        $item1 = array(
            'name'      => $productDetails,
            'price'     => $paymentAmount,
            'quantity'  => 1
        );

        $itemDetails = array(
            $item1
        );

        $params = array(
            'paymentAmount'     => $paymentAmount,
            'merchantOrderId'   => $merchantOrderId,
            'productDetails'    => $productDetails,
            'additionalParam'   => $additionalParam,
            'merchantUserInfo'  => $merchantUserInfo,
            'customerVaName'    => $customerVaName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'itemDetails'       => $itemDetails,
            'customerDetail'    => $customerDetail,
            'callbackUrl'       => $callbackUrl,
            'returnUrl'         => $returnUrl,
            'expiryPeriod'      => $expiryPeriod
        );

        try {
            // createInvoice Request
            $responseDuitkuPop = \Duitku\Pop::createInvoice($params, $duitkuConfig);
            $res = json_decode($responseDuitkuPop,true);

             $history = new History;
             $history->orderId= $orderid;
             $history->userid = 1;
             $history->nama = $firstName . ' ' . $lastName;
             $history->detail=  $productDetails;
             $history->Reference = $res['reference'];
             $history->total =  intval($res['amount']);
             $history->save();

            header('Content-Type: application/json');
            echo $responseDuitkuPop;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function cart(){
        $keranjang = cart::with('item:id,name,harga')->where('userid', 1)->where('status', null)->get();
        $total = 0;
        foreach($keranjang as $items){
            $total += $items->item->harga;
        }
        return view('cart', ['cart' => $keranjang,'total'=> $total]);
    }

    public function add(Request $request) {
        header("Access-Control-Allow-Origin: http://127.0.0.1:8000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
        $cek = cart::where('userid',1)->where('produkid',$request->input('id_item'))->where('status', null)->first();
        if($cek){
            return response()->json(['message' => 'Produk Udah ada di keranjang']);
        }else{
        $id_produk = $request->input('id_item');

        $keranjang = new cart;
        $keranjang->produkid = $id_produk;
        $keranjang->userid = 1;
        $keranjang->qty = 1;
        $keranjang->save();
        return response()->json(['message' => 'Produk berhasil ditambahkan ke dalam keranjang']);
        }
    }
    public function history(){
        $keranjang = cart::where('userid','1')->where('status', null)->get();
        return view('cart', ['cart'=>$keranjang]);
    }
    public function beli_langsung(){

    }
    public function checkoutCart(){
        $produk = cart::with('item:id,name,harga')->where('userid', 1)->where('status', null)->get();

        $duitkuConfig = new \Duitku\Config("96e16b0c9499829364911796f25b4661", "DS18317");
        // false for production mode
        // true for sandbox mode
        $duitkuConfig->setSandboxMode(true);
        // set sanitizer (default : true)
        $duitkuConfig->setSanitizedMode(false);
        // set log parameter (default : true)
        $duitkuConfig->setDuitkuLogs(true);

        // $paymentMethod      = ""; // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
        $awalan = "KE";
        $last = History::where('orderId', 'like', $awalan . '%')->latest()->first();

        if (!$last) {
            $orderid = $awalan . '00001';
        }else{
        $number = intval(substr($last->orderId, strlen($awalan)));
         $number++;
         $order = str_pad($number, 5, '0', STR_PAD_LEFT);
         $orderid = $awalan . $order;
        }

        $email              = 'rasidokai@gmail.com'; // your customer email
        $phoneNumber        = "081234567890"; // your customer phone number (optional)
        $merchantOrderId    = $orderid; // from merchant, unique
        $additionalParam    = ''; // optional
        $merchantUserInfo   = ''; // optional
        $customerVaName     = 'Rasyid Shiddiq'; // display name on bank confirmation display
        $callbackUrl        = 'https://l.r45id.online/callback'; // url for callback
        $returnUrl          = 'https://l.r45id.online'; // url for redirect
        $expiryPeriod       = 60; // set the expired time in minutes

        // Customer Detail
        $firstName          = "Rasyid";
        $lastName           = "Shiddiq";



        $customerDetail = array(
            'firstName'         => $firstName,
            'lastName'          => $lastName,
            'email'             => $email,
        );

        // Item Details

        $itemDetails = array();

        foreach ($produk as $item) {
            $productDetails = $item->item->name;
            $paymentAmount = $item->item->harga;

            $itemData = array(
                'name' => $productDetails,
                'price' => $paymentAmount,
                'quantity' => 1
            );
       $itemDetails[] = $itemData;
        }
        $total = 0;
        foreach($produk as $items){
            $total += $items->item->harga;
        }

        $params = array(
            'paymentAmount'     => $total,
            'merchantOrderId'   => $merchantOrderId,
            'productDetails'    => $productDetails,
            'additionalParam'   => $additionalParam,
            'merchantUserInfo'  => $merchantUserInfo,
            'customerVaName'    => $customerVaName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'itemDetails'       => $itemDetails,
            'customerDetail'    => $customerDetail,
            'callbackUrl'       => $callbackUrl,
            'returnUrl'         => $returnUrl,
            'expiryPeriod'      => $expiryPeriod
        );

        try {
            // createInvoice Request
            $responseDuitkuPop = \Duitku\Pop::createInvoice($params, $duitkuConfig);
            $res = json_decode($responseDuitkuPop,true);


             $history = new History;
             $history->orderId= $orderid;
             $history->userid = 1;
             $history->nama = $firstName . $lastName;
             $history->detail = $res['reference'];
             $history->total =  intval($res['amount']);
             $history->save();
             foreach ($produk as $cart) {
                $cart->status = $orderid;
                $cart->save();
            }

            header('Content-Type: application/json');
            echo $responseDuitkuPop;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }


    public function hapus($id)
    {
        $item = Cart::where([
                    ['userid', 1],
                    ['status', null]
                ])->where('id', $id)->first();

        if (!$item) {
            return redirect()->back()->with('error', 'Item tidak ditemukan di keranjang.');
        }

        $item->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function historyTrans(){
        $history = History::where('userid',1)->get();

        return view('history', compact('history'));
    }
    public function cash(){
        return view('cash');
    }

    public function Cashorder(Request $request) {


        $duitkuConfig = new \Duitku\Config("96e16b0c9499829364911796f25b4661", "DS18317");
        // false for production mode
        // true for sandbox mode
        $duitkuConfig->setSandboxMode(true);
        // set sanitizer (default : true)
        $duitkuConfig->setSanitizedMode(false);
        // set log parameter (default : true)
        $duitkuConfig->setDuitkuLogs(true);

        $awalan = "CA";
        $last = History::where('orderId', 'like', $awalan . '%')->latest()->first();

        if (!$last) {
            $orderid = $awalan . '00001';
        }else{
        $number = intval(substr($last->orderId, strlen($awalan)));
         $number++;
         $order = str_pad($number, 5, '0', STR_PAD_LEFT);
         $orderid = $awalan . $order;
        }

        // $paymentMethod      = ""; // PaymentMethod list => https://docs.duitku.com/pop/id/#payment-method
        $paymentAmount      = intval($request->input('amount')); // Amount
        $email              = 'rasidokai@gmail.com'; // your customer email
        $phoneNumber        = "081234567890"; // your customer phone number (optional)
        $productDetails     = 'Cash Rp ' . number_format($paymentAmount, 0, ',', '.');
        $merchantOrderId    = $orderid; // from merchant, unique
        $additionalParam    = ''; // optional
        $merchantUserInfo   = ''; // optional
        $customerVaName     = 'Rasiyd Shiddiq'; // display name on bank confirmation display
        $callbackUrl        = 'https://l.r45id.online/callback'; // url for callback
        $returnUrl          = 'https://l.r45id.online'; // url for redirect
        $expiryPeriod       = 60; // set the expired time in minutes

        // Customer Detail
        $firstName          = "Rasyid";
        $lastName           = "Shiddiq";



        $customerDetail = array(
            'firstName'         => $firstName,
            'lastName'          => $lastName,
            'email'             => $email,
        );

        // Item Details
        $item1 = array(
            'name'      => $productDetails,
            'price'     => $paymentAmount,
            'quantity'  => 1
        );

        $itemDetails = array(
            $item1
        );

        $params = array(
            'paymentAmount'     => $paymentAmount,
            'merchantOrderId'   => $merchantOrderId,
            'productDetails'    => $productDetails,
            'additionalParam'   => $additionalParam,
            'merchantUserInfo'  => $merchantUserInfo,
            'customerVaName'    => $customerVaName,
            'email'             => $email,
            'phoneNumber'       => $phoneNumber,
            'itemDetails'       => $itemDetails,
            'customerDetail'    => $customerDetail,
            'callbackUrl'       => $callbackUrl,
            'returnUrl'         => $returnUrl,
            'expiryPeriod'      => $expiryPeriod
        );

        try {
            // createInvoice Request
            $responseDuitkuPop = \Duitku\Pop::createInvoice($params, $duitkuConfig);
            $res = json_decode($responseDuitkuPop,true);

             $history = new History;
             $history->orderId= $orderid;
             $history->userid = 1;
             $history->nama = $firstName . ' ' . $lastName;
             $history->detail=  $productDetails;
             $history->Reference = $res['reference'];
             $history->total =  intval($res['amount']);
             $history->save();

            header('Content-Type: application/json');
            echo $responseDuitkuPop;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }


}
