<style>
  table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ccc;
  }

  table tr tr {
    padding: 6px;
    font-weight: normal;
    border: 1px solid #ccc;
  }

  table th {
    border: 1px solid #ccc;
  }
</style>

<table>
  <tr>
    <td align="left">
      Perihal : {{ $judul }} <br>
      Tanggal Awal : {{ $tanggalAwal }} s.d Tanggal Akhir {{ $tanggalAkhir }}
    </td>
  </tr>
</table>

<p></p>

<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Gambar</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Kategori</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cetak as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
          @if ($row->foto)
            <img src="{{ public_path('storage/img-produk/' . $row->foto) }}" width="50px">
          @else
            <img src="{{ public_path('storage/img-produk/img-default.jpg') }}" width="50px">
          @endif
        </td>
        <td>{{ $row->nama_produk }}</td>
        <td>Rp{{ number_format($row->harga, 0, ',', '.') }}</td>
        <td>{{ $row->stok }}</td>
        <td>{{ $row->kategori->nama_kategori }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
