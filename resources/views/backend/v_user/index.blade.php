@extends('backend.v_layouts.app')
@section('content')
  <h3>{{ $judul }}</h3>
  <a href="{{ route('backend.user.create') }}">
    <button type="button">Tambah</button>
  </a>

  <div class="card mt-4">
    <div class="card-body">
      <table class="table">
        <tr>
          <th>No</th>
          <th>Email</th>
          <th>Nama</th>
          <th>Role</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        @foreach ($index as $row)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->role }}</td>
            <td>{{ $row->status }}</td>
            <td>
              <a href="{{ route('backend.user.edit', $row->id) }}">
                <button type="button" class="btn btn-warning">Ubah</button>
              </a>

              <form action="{{ route('backend.user.destroy', $row->id) }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection
