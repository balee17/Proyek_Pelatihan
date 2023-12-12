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
        <div class="container">
            <div class="row">
              <div class="col">
                <h1>Selamat Datang di My Room</h1><br>
                <p>Selamat datang di "My Room", sebuah tempat di mana konsep peminjaman ruang bersama melebur dengan pengalaman yang tak terlupakan. Di tengah laju perkembangan dunia bisnis dan kreativitas yang tak ada habisnya, "My Room" hadir sebagai ruang yang tidak hanya menyediakan tempat untuk bekerja, tetapi menciptakan suasana yang mendorong kolaborasi dan inovasi.</p>
                <p>Ruang bersama kami tidak sekadar menawarkan meja dan kursi, melainkan merupakan wadah di mana ide-ide berkembang, dan mimpi-mimpi mengambil bentuk. Sebagai pemilik bisnis atau profesional yang mencari tempat kerja yang lebih dari sekadar kantor, "My Room" memberikan kesempatan untuk menjadi bagian dari komunitas yang dinamis dan beragam.</p>
                <p>Peminjaman ruang bersama di "My Room" memberikan akses tidak hanya ke fasilitas modern dan perangkat teknologi terkini, tetapi juga kepada jaringan profesional yang kuat. Dengan pertemuan-pertemuan berkala, lokakarya inspiratif, dan peluang kolaborasi, kami tidak hanya menciptakan ruang kerja, melainkan menghubungkan individu-individu kreatif dan berbakat.</p>
                <p>Di sini, setiap ruang memiliki identitasnya sendiri, mencerminkan karakter dan tujuan Anda. Mulai dari ruang santai yang cocok untuk brainstorming hingga ruang kerja pribadi yang menawarkan kenyamanan maksimal, "My Room" dirancang untuk mendukung produktivitas dan kreativitas Anda.</p>
                <p>Keunggulan "My Room" tidak hanya terletak pada fasilitasnya, tetapi juga pada lingkungan yang ramah dan inklusif. Kami percaya bahwa ide-ide brilian muncul ketika individu-individu berbakat berkumpul dan berbagi pandangan mereka. Oleh karena itu, "My Room" bukan hanya sekadar tempat kerja, tetapi sebuah komunitas tempat Anda dapat tumbuh bersama-sama dengan orang-orang yang memiliki visi dan semangat serupa.</p>
                <p>Ketika Anda memutuskan untuk melakukan peminjaman ruang bersama di "My Room", Anda memilih lebih dari sekadar tempat untuk bekerja. Anda bergabung dengan komunitas yang menghargai keragaman, inovasi, dan kesuksesan bersama. Inilah saatnya untuk menciptakan ruang Anda sendiri di "My Room" dan menghadapi setiap tantangan dengan semangat kolaboratif yang mengilhami pertumbuhan dan pencapaian luar biasa. Selamat datang di "My Room" – di mana setiap ruang adalah peluang baru dan setiap momen adalah bagian dari perjalanan menuju sukses yang tak terbatas.</p>
                <br><br><br>
                <a href="/listroom">
                        <button class="btn btn-outline-success me-2" type="submit">Lihat Ruangan</button>
                    </a>
              </div>
            </div>
      </section>
  </body>