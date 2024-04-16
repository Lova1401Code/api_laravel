<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverstionController extends Controller
{
    public function convert(Request $request) {
        $request->validate([
            'amount' => 'required',
            'moneyTo' => 'required'
        ]);
        $amount = $request->amount;
        $moneyTo = $request->input('moneyTo');
        $moneyFrom = "Ariary";

        $convertionRate = ($moneyTo === 'EUR') ? 0.00023 : 0.00028;
        $convertedAmount = $amount * $convertionRate;

        return response()->json([
            'amount' => $amount,
            'currency_from' => $moneyFrom,
            'currencyTo' => $moneyTo,
            'converted_amount' => $convertedAmount]);
    }
}
