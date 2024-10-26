<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Toko Online</title>
</head>

<body>
  <a href="{{ route('backend.beranda') }}">Beranda</a>
  <a href="#">User</a>
  <a href="#" onclick="event.preventDefault(); document.getElementById('keluar-app').submit();">Keluar</a>

  <p></p>

  <!-- @yieldawal -->
  @yield('content')
  <!-- @yieldakhir -->

  <!-- Keluar App -->
  <form action="{{ route('backend.logout') }}" method="POST" id="keluar-app" class="d-none">
    @csrf
  </form>
</body>

</html>
