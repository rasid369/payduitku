<?php

namespace App\Http\Controllers;

use App\Models\Callback;
use App\Models\History;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CallbackController extends Controller
{
    public function handleCallback(Request $request)
    {
        try {
            $data = $request->all();

            $signature = md5($data['merchantCode'] . $data['amount'] . $data['merchantOrderId'] . env('DUITKU_API_KEY'));
            History::where('detail', $data['reference'])->update([
                'Status' => $data['resultCode'],
                'Dibayar' => $data['amount']
            ]);

            if ($data['signature'] == $signature) {
                Callback::create($data);


                return response()->json(['status' => 'OK']);
            } else {
                return response()->json(['status' => 'Invalid Signature'], 400);
            }
        } catch (\Exception $e) {
            Log::error('Error occurred: ' . $e->getMessage());
            return response()->json(['status' => 'Error occurred while handling callback'], 500);
        }
    }
}
