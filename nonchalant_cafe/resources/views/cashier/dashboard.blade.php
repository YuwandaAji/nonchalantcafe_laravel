<div class="container">
    <h1>Panel Kasir - Pesanan Baru</h1>
    
    <table border="1" style="width: 100%; text-align: left;">
        <thead>
            <tr>
                <th>Pelanggan</th> <th>Metode Bayar</th> <th>Status Bayar</th> <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->customer->customer_name }}</td>
                <td>{{ $order->payment->payment_name }} ({{ $order->payment->payment_category }})</td>
                <td>
                    {{ $order->pay_status ? 'Lunas' : 'Belum Bayar' }}
                </td>
                <td>
                    <form action="{{ route('cashier.process', $order->sales_id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Proses ke Dapur</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>