<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BuyCookieRequest;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function buyCookie(BuyCookieRequest $request)
    {
        try {
            $user = auth()->user();
            if ($user->wallet < $request->input('number_of_cookie')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Insufficient amount in wallet'
                ], 400);
            }

            $user->wallet = $user->wallet - $request->input('number_of_cookie');
            $user->cookie = $user->cookie + $request->input('number_of_cookie');
            $user->save();
            return response()->json([
                'message' => 'Cookie bought successfully',
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            Log::info($th);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
