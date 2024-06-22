<?php

// En PaymentMethodController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = auth()->user()->paymentMethods()->get(); // Asume que existe una relación entre usuarios y métodos de pago

        return view('payment-methods.index', compact('paymentMethods'));
    }
}
