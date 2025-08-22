<table class="items-center w-full bg-transparent border-collapse">
  <thead class="sticky top-0 bg-blueGray-100 z-0">
    <tr>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 uppercase border-b text-left">Barang</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 uppercase border-b text-left">Jumlah</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 uppercase border-b text-left">Dipakai Oleh</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 uppercase border-b text-left">Tanggal</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 uppercase border-b text-left">Keterangan</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 uppercase border-b text-left">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($pengeluarans as $item)
      <tr class="hover:bg-blueGray-50">
        <td class="px-6 py-4 text-sm border-t text-blueGray-700">{{ $item->barang->nama_barang ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t">{{ $item->jumlah }}</td>
        <td class="px-6 py-4 text-sm border-t">{{ $item->dipakai_oleh }}</td>
        <td class="px-6 py-4 text-sm border-t">{{ \Carbon\Carbon::parse($item->tanggal_pengeluaran)->format('d M Y') }}</td>
        <td class="px-6 py-4 text-sm border-t">{{ $item->keterangan ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t">
          <div class="flex items-center space-x-2">
            <a href="{{ route('staff.pengeluaran.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 text-sm" title="Edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('staff.pengeluaran.destroy', $item->id) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button type="submit" class="btn-delete text-red-500 hover:text-red-700 text-sm" data-nama="{{ $item->barang->nama_barang ?? 'data ini' }}">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="6" class="px-6 py-4 text-center text-blueGray-400 text-sm">Belum ada data pengeluaran.</td>
      </tr>
    @endforelse
  </tbody>
</table>
