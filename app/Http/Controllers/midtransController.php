<?php

namespace App\Http\Controllers;

use App\Models\Penitipan;
use Illuminate\Http\Request;

class midtransController extends Controller
{
    public function update(Request $request)
    {
        $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if ($hashedKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        if ($request->transaction_status === "settlement") {
            $penitipan = Penitipan::where('id', $request->order_id)->where('status', 'menunggu pembayaran')->first();
            if ($penitipan !== null) {
                if ($penitipan->isPickUp) {
                    $penitipan->update(['status' => 'menunggu penjemputan']);
                } else {
                    $penitipan->update(['status' => 'menunggu diantar ke pethouse']);
                }
            }
            ;
        }

        if ($request->transaction_status === "expired") {
            $penitipan = Penitipan::where('id', $request->order_id)->where('status', 'menunggu pembayaran')->update([
                'status' => 'Pembayaran Gagal'
            ]);
        }
        return response()->json(['message' => 'Callback received successfully']);
    }
}
