{{-- Export View: Laporan Harian SKPD ke Excel --}}

<table>
  <thead>
    <tr>
      <th colspan="8" style="font-weight: bold; font-size: 16px; text-align: center;">
        Laporan Harian SKPD – {{ $bulan }} {{ $tahun }}
      </th>
    </tr>
    <tr><td colspan="8"></td></tr> {{-- spasi kosong --}}
    <tr style="background-color: #f0f0f0; font-weight: bold;">
      <th style="border: 1px solid #000;">Tanggal</th>
      <th style="border: 1px solid #000;">Kode Kotak</th>
      <th style="border: 1px solid #000;">Lokasi</th>
      <th style="border: 1px solid #000;">Pemakaian (Lembar)</th>
      <th style="border: 1px solid #000;">No Seri Pemakaian</th>
      <th style="border: 1px solid #000;">Rusak (Lembar)</th>
      <th style="border: 1px solid #000;">Penambahan (Set)</th>
      <th style="border: 1px solid #000;">Sisa Harian</th>
    </tr>
  </thead>

  <tbody>
    @forelse ($laporans as $laporan)
      <tr>
        <td style="border: 1px solid #000;">{{ \Carbon\Carbon::parse($laporan->tanggal)->translatedFormat('d F Y') }}</td>
        <td style="border: 1px solid #000;">{{ $laporan->skpd->kode_kotak ?? '-' }}</td>
        <td style="border: 1px solid #000;">{{ ucfirst(str_replace('_', ' ', $laporan->lokasi_penggunaan)) }}</td>
        <td style="border: 1px solid #000;">{{ $laporan->penggunaan_lembar }}</td>
        <td style="border: 1px solid #000;">{{ $laporan->penggunaan_noseri }}</td>
        <td style="border: 1px solid #000;">{{ $laporan->jumlah_rusak ?? '-' }}</td>
        <td style="border: 1px solid #000;">{{ $laporan->penambahan ?? '-' }}</td>
        <td style="border: 1px solid #000;">{{ $laporan->jumlah_sisa_harian }}</td>
      </tr>
    @empty
      <tr>
        <td colspan="8" style="text-align: center; border: 1px solid #000;">Tidak ada data laporan.</td>
      </tr>
    @endforelse
  </tbody>
</table>

<br><br>
<p style="font-size: 12px; text-align: right;">
  Dicetak: {{ now()->translatedFormat('d F Y H:i') }}
</p>
