<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddMoneyRequest;

class WalletController extends Controller
{
    public function addMoney(AddMoneyRequest $request)
    {
        try {
            $user = auth()->user();
            $user->wallet = $user->wallet + $request->input('amount');
            $user->save();
            return response()->json([
                'message' => 'Money added successfully', 
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            Log::info($th);
            return response()->json([
                'message' => 'Server Error',
                'error_message' => $th->getMessage()
            ]);
        }
    }
}
