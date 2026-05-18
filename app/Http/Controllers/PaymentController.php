<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use KHQR\BakongKHQR;
use KHQR\Helpers\KHQRData;
use KHQR\Models\IndividualInfo;
use SebastianBergmann\Environment\Console;

class PaymentController extends Controller
{
    public function checkout($id)
    {
        $product = Product::findOrFail($id);
        // Your merchant info (replace with real Bakong account)
        $merchant = new IndividualInfo(
            bakongAccountID: 'heangravid@bkrt',
            merchantName: 'Heang Ravid',
            merchantCity: 'Phnom Penh',
            currency: KHQRData::CURRENCY_KHR,
            amount: $product->price
        );
        $qrResponse = BakongKHQR::generateIndividual($merchant);
        return view('products.checkout', [
            'product' => $product,
            'qr' => $qrResponse->data['qr'] ?? null,
            'md5' => $qrResponse->data['md5'] ?? null,
        ]);
    }
    public function verifyForm()
    {
        return view('payments.verify');
    }
    public function verifyTransaction(Request $request)
    {
        $request->validate([
            'md5' => 'required|string',
        ]);
        try {
            // Your Bakong API token from https://api-bakong.nbc.gov.kh/register
            $token = env('BAKONG_TOKEN'); // put it in .env
            $bakong = new \KHQR\BakongKHQR($token);
            $result = $bakong->checkTransactionByMD5($request->md5);
            return response()->json($result);
            // return view('payments.result', ['result' => $result]);
        } catch (\Exception $e) {
            // return back()->withErrors(['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function paymentResult()
    {
        return view('payments.result');
    }
}
