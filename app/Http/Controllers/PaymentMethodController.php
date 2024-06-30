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
            'Name' => 'required|string|max:255',
            'Code' => 'required|string|max:20',
            'type_of_method' => 'required|string|max:255',
        ]);

        Auth::user()->paymentMethods()->create([
            'Name' => $request->input('Name'),
            'Code' => $request->input('Code'),
            'type_of_method' => $request->input('type_of_method')
        ]);

        return redirect()->route('payment-methods.index')->with('success', 'Método de pago añadido exitosamente.');
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()->route('payment-methods.index')->with('success', 'Método de pago eliminado exitosamente.');
    }
}
