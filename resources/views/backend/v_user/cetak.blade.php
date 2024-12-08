<style>
  table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #ccc;
  }

  table tr td {
    padding: 6px;
    font-weight: normal;
    border: 1px solid #ccc;
  }

  table th {
    border: 1px solid #ccc;
  }
</style>
<table>
  <!-- <tr>
  <td align="center">
  <img src="{{ asset('images/header.png') }}" width="50%">
  </td>
  </tr> -->
  <tr>
    <td align="left">
      Perihal : {{ $judul }} <br>
      Tanggal Awal: {{ $tanggalAwal }} s/d Tanggal Akhir: {{ $tanggalAkhir }}
    </td>
  </tr>
</table>
<p></p>
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Email</th>
      <th>Nama</th>
      <th>Role</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cetak as $row)
      <tr>
        <td> {{ $loop->iteration }} </td>
        <td> {{ $row->nama }} </td>
        <td> {{ $row->email }} </td>
        <td>
          @if ($row->role == 1)
            Super Admin
          @elseif($row->role == 0)
            Admin
          @endif
        </td>
        <td>
          @if ($row->status == 1)
            Aktif
          @elseif($row->status == 0)
            NonAktif
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
