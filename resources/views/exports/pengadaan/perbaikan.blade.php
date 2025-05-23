<h2 style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">
  Laporan Perbaikan Barang - Bulan {{ $namaBulan }} Tahun {{ $tahun }}
</h2>

<table>
  <thead>
    <tr>
      <th><strong>No</strong></th>
      <th><strong>Nama Barang</strong></th>
      <th><strong>Deskripsi</strong></th>
      <th><strong>Biaya Perbaikan</strong></th>
      <th><strong>Catatan</strong></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $i => $rusak)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $rusak->barang->nama_barang ?? '-' }}</td>
        <td>{{ $rusak->deskripsi }}</td>
        <td>Rp {{ number_format($rusak->biaya_perbaikan, 0, ',', '.') }}</td>
        <td>{{ $rusak->catatan_perbaikan ?? '-' }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

<br>

<p><strong>Total Perbaikan:</strong> Rp {{ number_format($total, 0, ',', '.') }}</p>
<p><strong>Total Keseluruhan (Pembelian + Perbaikan):</strong> Rp {{ number_format($grandTotal, 0, ',', '.') }}</p>

<p style="margin-top: 30px; font-size: 12px; color: #888;">
  Dicetak pada: {{ now()->format('d M Y, H:i') }}
</p>
