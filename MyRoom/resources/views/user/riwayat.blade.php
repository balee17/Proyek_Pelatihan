<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyRoom</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Asset/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">My Room</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link active" href="/listroom">List Room</a>
                    </li>
                    </ul>
                </div>
                <div class="dropdown">
                <button class="btn btn-book-a-table dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->nama }}</button></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/profile">Profil</a></li>
                  <li><a class="dropdown-item" href="/transaksi">Transaksi</a></li>
                  <li><a class="dropdown-item" href="/logout">Log out</a></li>
                </ul>
              </div>
            </div>
        </nav>
    </header>

    <section class="sec" id = "tentang">
      <div class="row">
      <center><h1>Riwayat Transaksi</h1>
      <p>Ini adalah riwayat anda</p>
      <br><br></center>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
           <thead class = "table-success">
            <tr>
                <th>Nama Ruangan</th>
                <th>Kode Ruangan</th>
                <th>Durasi</th>
                <th>Harga</th>
                <th>Status Pesanan</th>
                <th>Beritahu admin jika sudah selesai</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $l)
                <tr>
                    <td>{{$l->nama_ruangan}}</td>
                    <td>{{$l->kode_ruangan}}</td>
                    <td>{{$l->durasi}} Jam</td>
                    <td>Rp{{ number_format($l->harga, 0, ',', '.') }}</td>    
                    <td>{{$l->status}}</td>
                    <td>
                    @if($l->status != 'Menunggu Konfirmasi' && $l->status != 'Admin akan mengecek ruangan')
                        <form id="changeStatusForm{{ $l->id }}" action="/status/{{ $l->id }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                        </form>
                        <button class="btn btn-outline-success me-2" onclick="submitForm('changeStatusForm{{ $l->id }}')">Beritahu</button>
                    @endif
            </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
    function submitForm(formId) {
        // Temukan formulir dengan ID tertentu dan kirimkan pengguna ke endpoint yang sesuai
        var form = document.getElementById(formId);
        form.submit();
    }
</script>
</body>
</html>