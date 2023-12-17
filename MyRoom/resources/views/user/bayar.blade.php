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
                  <li><a class="dropdown-item" href="/riwayat">riwayat</a></li>
                  <li><a class="dropdown-item" href="/logout">Log out</a></li>
                </ul>
              </div>
            </div>
        </nav>
    </header>


    <div class="container">
        <hr class="featurette-divider">
        <span class=" form-signin w-100 m-auto rounded" >
        <section>
    </span>
        <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../Image/foowd.png" alt="" width="100" height="">
        <div class="section-header">
                <h2>Invoice Anda</h2>
            </div>
        </div>

        <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="section-header">Your cart</span>
            </h4>
            <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">Nama ruangan</h6>
                <small class="text-muted">{{$list -> nama}}</small>
                </div>
                <div>
                <h7 class="my-0">kode ruangan</h7>
                <small class="text-muted">{{$list -> kode}}</small>
                </div>
                <span class="text-muted">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span>
            </li>
            </ul>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <form class="card p-2" method ="POST" action = "/checkout">
                @csrf 
                <input type="hidden" name="nama" value="{{$list -> nama}}">
                <input type="hidden" name="id_ruangan" value="{{ $roomId }}">
                <input type="hidden" name="kode" value="{{$list -> kode}}">
                <input type="hidden" name="durasi" value="{{ $hourCount }}">
                <input type="hidden" name="totalHarga" value="{{ $totalHarga }}">
                
                <img src="{{ $list->foto }}" alt="">
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Data Diri</h4>
                    <div class="row g-3">

                        <div class="col-12">
                        <label for="username" class="form-label">Name</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="username" placeholder="Name" required name="username" value ="{{ Auth::user()->nama}}" readonly>
                        <div class="invalid-feedback">
                            Your username is required.
                            </div>
                        </div>
                        </div>

                        <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" required name = "email_user"  value ="{{ Auth::user()->email}}" readonly>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check"  >
                        <input id="Card" name="pembayaran"value="Card" type="radio" class="form-check-input" checked required > 
                        <label class="form-check-label" for="Card">Credit Card</label>
                        </div>
                        <div class="form-check">
                        <input id="Bank transfer" name="pembayaran" type="radio" value = "Bank transfer" class="form-check-input" required>
                        <label class="form-check-label" for="Bank transfer">Bank transfer</label>
                        </div>
                        <div class="form-check">
                        <input id="Digital Wallet" name="pembayaran" type="radio" value="Digital Wallet" class="form-check-input" required>
                        <label class="form-check-label" for="Digital Wallet">Digital Wallet</label>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-success" type="submit" onclick="validateForm()" >Pay</button>
                    <div id="alert-section" class="mt-3"></div>
                    </form>
                </div>
                </div>
                <hr class="featurette-divider">
            </div>
    </section>
</html>