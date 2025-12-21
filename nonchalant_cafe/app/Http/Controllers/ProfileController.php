<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Menampilkan profil customer.
     */
    public function show(Request $request): View
    {
        // Ambil data customer yang sedang login melalui guard customer
        $customer = Auth::guard('customer')->user();

        return view('customer.profile', [
            'customer' => $customer,
        ]);
    }

    /**
     * Menampilkan form edit profil.
     */
    public function edit(Request $request): View
    {
        return view('customer.edit', [
            'customer' => Auth::guard('customer')->user(),
        ]);
    }

    /**
     * Update informasi profil customer.
     */
    public function update(Request $request): RedirectResponse
    {
        $customer = Auth::guard('customer')->user();

        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:customer,customer_email,' . $customer->customer_id . ',customer_id',
            'customer_address' => 'nullable|string',
            'customer_number' => 'nullable|string',
        ]);

        $customer->update($data);

        return Redirect::route('customer.profile')->with('status', 'profile-updated');
    }
}