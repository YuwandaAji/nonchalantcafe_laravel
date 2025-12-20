<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

public function edit()
{
    $customer = Auth::guard('customer')->user();
    return view('customer.edit', compact('customer'));
}

public function update(Request $request)
{
    $customer = Auth::guard('customer')->user();

    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_address' => 'required|string',
        'customer_img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Update data teks
    $customer->customer_name = $request->customer_name;
    $customer->customer_address = $request->customer_address;

    // Logika Upload Foto (customer_img)
    if ($request->hasFile('customer_img')) {
        // Hapus foto lama jika ada
        if ($customer->customer_img) {
            Storage::delete('public/customers/' . $customer->customer_img);
        }
        
        $fileName = time() . '.' . $request->customer_img->extension();
        $request->customer_img->storeAs('public/customers', $fileName);
        $customer->customer_img = $fileName;
    }

    $customer->save();

    return redirect()->route('customer.profile')->with('success', 'Profil berhasil diperbarui!');
}