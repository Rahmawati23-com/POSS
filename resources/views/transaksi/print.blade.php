<h2>Struk Transaksi</h2>
<p>Kode: {{ $transaksi->kode }}</p>
<p>Tanggal: {{ $transaksi->tanggal }}</p>
<p>Kasir: {{ $transaksi->user->name }}</p>
<p>Pembayaran: {{ $transaksi->pembayaran }}</p>

<hr>

<table>
    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi->details as $detail)
            <tr>
                <td>{{ $detail->produk->nama }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>Rp{{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<hr>
<p>Total: <strong>Rp{{ number_format($transaksi->total, 0, ',', '.') }}</strong></p>
