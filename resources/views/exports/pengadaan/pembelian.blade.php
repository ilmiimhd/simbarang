<h2 style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">
  Laporan Pembelian Barang - Bulan {{ $namaBulan }} Tahun {{ $tahun }}
</h2>

<table>
  <thead>
    <tr>
      <th><strong>No</strong></th>
      <th><strong>Nama Barang</strong></th>
      <th><strong>Jenis</strong></th>
      <th><strong>Jumlah</strong></th>
      <th><strong>Harga Satuan</strong></th>
      <th><strong>Subtotal</strong></th>
      <th><strong>Tanggal Masuk</strong></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $i => $barang)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $barang->nama_barang }}</td>
        <td>{{ ucfirst($barang->jenis_barang) }}</td>
        <td>{{ $barang->jumlah }}</td>
        <td>Rp {{ number_format($barang->harga_satuan, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($barang->jumlah * $barang->harga_satuan, 0, ',', '.') }}</td>
        <td>{{ \Carbon\Carbon::parse($barang->tanggal_masuk)->format('d-m-Y') }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

<br>

<p><strong>Total Pembelian:</strong> Rp {{ number_format($total, 0, ',', '.') }}</p>

<p style="margin-top: 30px; font-size: 12px; color: #888;">
  Dicetak pada: {{ now()->format('d M Y, H:i') }}
</p>
