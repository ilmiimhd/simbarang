<table class="items-center w-full bg-transparent border-collapse">
  <thead class="sticky top-0 bg-blueGray-100 z-0">
    <tr class="text-blueGray-600 text-xs uppercase">
      <th class="px-6 py-3 text-left">Kode Barang</th>
      <th class="px-6 py-3 text-left">Nama Aset</th>
      <th class="px-6 py-3 text-left">No Reg</th>
      <th class="px-6 py-3 text-left">Merk/Type</th>
      <th class="px-6 py-3 text-left">Ukuran/CC</th>
      <th class="px-6 py-3 text-left">Bahan</th>
      <th class="px-6 py-3 text-left">Tahun Pembelian</th>
      <th class="px-6 py-3 text-left">Nomor Pabrik</th>
      <th class="px-6 py-3 text-left">Nomor Rangka</th>
      <th class="px-6 py-3 text-left">Nomor Mesin</th>
      <th class="px-6 py-3 text-left">Nomor Polisi</th>
      <th class="px-6 py-3 text-left">Nomor BPKB</th>
      <th class="px-6 py-3 text-left">Asal Usul</th>
      <th class="px-6 py-3 text-left">Harga Satuan</th>
      <th class="px-6 py-3 text-left">Keberadaan</th>
      <th class="px-6 py-3 text-left">Kondisi</th>
      <th class="px-6 py-3 text-left">Keterangan</th>
      <th class="px-6 py-3 text-left">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($asets as $aset)
      <tr class="hover:bg-blueGray-50">
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->kode_barang }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->nama_aset }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->no_reg ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->merk_type ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->ukuran_cc ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->bahan ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->tahun_pembelian ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->nomor_pabrik ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->nomor_rangka ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->nomor_mesin ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->nomor_polisi ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->nomor_bpkb ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $aset->asal_usul ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">Rp{{ number_format($aset->harga_satuan, 0, ',', '.') ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ ucfirst($aset->keberadaan) ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ ucfirst($aset->kondisi) ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ Str::limit($aset->keterangan, 30) ?? '-' }}</td>
        <td class="px-6 py-4 border-t border-blueGray-100">
          <div class="flex items-center space-x-2">
            <a href="{{ route('staff.aset.edit', $aset->id) }}" class="text-blue-500 hover:text-blue-700 text-sm" title="Edit">
              <i class="fas fa-edit"></i>
            </a>
            <form method="POST" action="{{ route('staff.aset.destroy', $aset->id) }}" class="form-delete">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:text-red-700 text-sm btn-delete"
                data-nama="{{ $aset->nama_aset }}">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="18" class="text-center text-blueGray-400 text-sm py-4">Belum ada data aset.</td>
      </tr>
    @endforelse
  </tbody>
</table>
