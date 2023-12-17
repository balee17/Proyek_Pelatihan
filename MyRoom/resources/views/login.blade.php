<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyRoom</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Asset/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <section>
    <div class="container center-form">
        <form class="form-box" action="ceklogin" method="POST">
          @csrf
            <h1>Selamat Datang di MyRoom</h1>
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @elseif(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
            @endif
            <div class="mb-3">
                <label for="Email_atau_Username" class="form-label">Email / Username</label>
                <input type="text" class="form-control" id="email" name="email_atau_username" aria-describedby="email_username" required>
                <div id="email_username" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <p>Belum Memiliki Akun?
            <a href="/register" class="">Daftar</a>
            </p>
            <button type="submit" class="btn btn-primary float-end">Login</button>
        </form>
    </div>
    </section>
  </body>
</html>