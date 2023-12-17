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
                  <li><a class="dropdown-item" href="/riwayat">Transaksi</a></li>
                  <li><a class="dropdown-item" href="/logout">Log out</a></li>
                </ul>
              </div>
            </div>
        </nav>
    </header>

    <section class="sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">List Room</h1>
                <form action="{{ route('search') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari room...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            @foreach ($list as $l)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ $l->foto }}" alt="Gambar" class="img-fluid" style="width: 100%; height: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $l->nama }}</h5>
                            <p class="card-text">{{ $l->kode }}</p>
                            <h6 class="card-text">Harga Sewa : Rp {{ number_format($l->harga, 0, ',', '.') }} / Jam</h6>
                            <h6 class="card-title">Kapasistas Maksimal : {{ $l->kapasitas }} orang</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="{{ route('bayar', ['id' => $l->id]) }}" method="GET">
                                        @csrf
                                        <input type="number" name="hours" value="1" id="hourCount" min="1" max="5"> Jam <br><br>
                                        <button type="submit" class="btn btn-sm btn-outline-success  ">Sewa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

  </body>