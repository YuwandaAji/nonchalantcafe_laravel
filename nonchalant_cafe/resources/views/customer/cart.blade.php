<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>Rp {{ number_format($details['price']) }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>Rp {{ number_format($details['price'] * $details['quantity']) }}</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="right"><strong>Total</strong></td>
            <td><strong>Rp {{ number_format($total) }}</strong></td>
        </tr>
    </tfoot>
</table>