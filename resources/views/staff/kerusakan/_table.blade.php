<table class="items-center w-full bg-transparent border-collapse">
  <thead class="sticky top-0 bg-blueGray-100 z-0">
    <tr>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Barang</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Kode Barang</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Kondisi</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Deskripsi</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Biaya</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Catatan</th>
      <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($kerusakan as $item)
      <tr class="hover:bg-blueGray-50">
        <td class="px-6 py-4 text-sm border-t text-blueGray-700">{{ $item->barang->nama_barang ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t text-blueGray-700">{{ $item->kode_barang ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t capitalize">
          @php
            $warna = match($item->kondisi) {
              'baik' => 'bg-green-500',
              'perbaikan' => 'bg-yellow-500',
              'rusak_berat' => 'bg-blueGray-700',
              default => 'bg-red-500'
            };
          @endphp
          <span class="inline-block px-2 py-1 rounded-full text-white text-xs font-bold whitespace-nowrap {{ $warna }}">
            {{ str_replace('_', ' ', $item->kondisi) }}
          </span>
        </td>
        <td class="px-6 py-4 text-sm border-t">{{ $item->deskripsi }}</td>
        <td class="px-6 py-4 text-sm border-t">
          @if($item->biaya_perbaikan)
            Rp {{ number_format($item->biaya_perbaikan, 0, ',', '.') }}
          @else
            -
          @endif
        </td>
        <td class="px-6 py-4 text-sm border-t">{{ $item->catatan_perbaikan ?? '-' }}</td>
        <td class="px-6 py-4 text-sm border-t">
          <div class="flex items-center space-x-2">
            @if (!in_array($item->kondisi, ['baik', 'rusak_berat']))
              <a href="{{ route('staff.kerusakan.edit', $item->id) }}"
                class="text-blue-500 hover:text-blue-700 text-sm" title="Edit">
                <i class="fas fa-edit"></i>
              </a>
            @else
              <span class="text-blueGray-300 text-sm cursor-not-allowed" title="Tidak bisa diedit">
                <i class="fas fa-edit"></i>
              </span>
            @endif
          </div>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="7" class="px-6 py-4 text-center text-blueGray-400 text-sm">Belum ada data kerusakan.</td>
      </tr>
    @endforelse
  </tbody>
</table>
