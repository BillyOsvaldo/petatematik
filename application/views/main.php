<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Tematik | Kabupaten Purbalingga</title>

    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('/assets/css/app.css') ?>">
</head>
<body class="bg-light">
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <img src="https://upload.wikimedia.org/wikipedia/id/9/9c/Kabupaten_purbalingga.png" class="mb-3" width="80px" alt="logo purbalingga">
                <h2 class="jumbotron-heading">
                    PETA TEMATIK PURBALINGGA
                </h2>
            </div>
        </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" onclick="location.href='<?= site_url('/map/monitoring-corona') ?>'">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?= base_url('/assets/img/monitoring-corona.png') ?>"  alt="Card image cap">
                <div class="card-body text-center">
                    <a href="<?= site_url('/map/monitoring-corona') ?>">
                        Monitoring Covid-19
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="text-muted">
      <div class="container text-center">
        &copy; Dikembangkan oleh <a href="https://dinkominfo.purbalinggakab.go.id/" title="dinkominfo purbalingga" target="_blank">Dinkominfo Purbalingga</a>.
      </div>
    </footer>
</body>
</html>