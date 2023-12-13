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
                  <li><a class="dropdown-item" href="/profile">Profile</a></li>
                  <li><a class="dropdown-item" href="/riwayat">Riwayat</a></li>
                  <li><a class="dropdown-item" href="/logout">Log out</a></li>
                </ul>
              </div>
            </div>
        </nav>
    </header>
    <div class="home w-12/12 overflow-auto p-4">
    <p class="text-prim text-xl" style="font-size: 28px;">Your Profile</p>
    <div class="mt-4">
        <form action="/updateprof" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="hidden" value="{{ Auth::user()->id }}" name="id">
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Nama</label>
                <div class="col-sm-10">
                    <input value="{{ Auth::user()->nama }}" type="text" class="form-control" placeholder="Nama" name="nama">
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">E-mail</label>
                <div class="col-sm-10">
                    <input value="{{ Auth::user()->email }}" type="text" class="form-control" placeholder="Email" name="email" readonly>
                </div>
            </div>
            <p>Masukan Password Anda yang Sekarang untuk Pengecekan Autorisasi</p>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-sm-2 col-form-label" for="exampleFormControlInput1">Konfirmasi Password</label>
                <div class="col-sm-10">
                    <input  type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" id = "konfirmasi" required>
                </div>
            </div>
            <div class="form-group mt-5" style="float: right;">
                <button type="submit" class="btn btn-edit mx-2" onclick="validateForm()" >Update</button>
            </div>
        </form>
    </div>

    <script>
    function validateForm() {
        
        var lahanInput = document.getElementById('konfirmasi');

        
        if (lahanInput.value === '') {
            Swal.fire({
                icon: 'error',
                title: 'Form tidak lengkap',
                text: 'Mohon isi semua field yang diperlukan'
            });
        } else {
            showSuccessNotification();
        }
    }

    function showSuccessNotification() {
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil diupdate',
            text: 'Data diri berhasil di update'
        });
    }
</script>
</html>
