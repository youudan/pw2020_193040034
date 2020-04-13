<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>193040034</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 id="internet-status" class="alert-heading"></h4>
        <hr>
        <p id="internet-tips"></p>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <h3>Profile</h3>
          <div class="card">
            <div class="row">
              <div class="col-md">
                <img src="assets/img/193040034.jpg" class="card-img-top rounded-circle" style="width: 200px; height: 200px; margin: 10px;" alt="...">
              </div>
              <div class="col-md">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item card-title h5">Wijdan Muhammad R</li>
                  <li class="list-group-item">193040034</li>
                  <li class="list-group-item">SENIN13</li>
                  <li class="list-group-item">@youudan</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <h3>Menu</h3>
          <ul class="list-group list-tugas">
            <!-- load data tugas dari array -->
          </ul>
        </div>
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        let status = document.getElementById("internet-status");
        let tips = document.getElementById("internet-tips");
        let alert = document.querySelector(".alert");
        let listTugas = document.querySelector(".list-tugas");
        let tugas = [
          {judul: 'LATIHAN3A', link:'Latihan3a.php'},
          {judul: 'LATIHAN3B', link:'Latihan3b.php'},
          {judul: 'LATIHAN3C', link:'Latihan3c.php'},
          {judul: 'LATIHAN3D', link:'Latihan3d.php'}
        ];
        for(index in tugas){
          listTugas.innerHTML += `<li class="list-group-item"><a href="${tugas[index].link}" target="contents">${tugas[index].judul}</li>`;
        }
        setInterval(function() {
          alert.className = navigator.onLine ? 'alert alert-success' : 'alert alert-warning';
          status.className = navigator.onLine ? 'online' : 'offline';
          status.innerHTML = navigator.onLine ? 'Akang/Teteh sedang online' : 'Akang/Teteh sedang offline';
          tips.innerHTML = navigator.onLine ? 'Terimakasih telah mengakses halaman ini dengan koneksi internet :))' : 'Saya merekomendasikan untuk terhubung dengan internet untuk tampilan yang lebih baik :))';
        }, 100);
      </script>
  </body>
</html>