<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Auth;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = Auth::user()->paymentMethods;
        return view('payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('payment_methods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'card_number' => 'required|string|max:16',
            
            'type' => 'required|string|max:255',
        ]);

        Auth::user()->paymentMethods()->create($request->all());

        return redirect()->route('payment-methods.index')->with('success', 'Método de pago añadido exitosamente.');
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()->route('payment-methods.index')->with('success', 'Método de pago eliminado exitosamente.');
    }
}
