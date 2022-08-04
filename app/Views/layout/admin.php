<?php $session = \Config\Services::session(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Food</title>
  </head>
  <body>
      <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
          <h3>Admin Dashboard</h3>
          <div>
              <?php if($session->get('isAdminLoggedIn') == 'true'){ ?>
              <a href="/admin/logout" class="btn btn-danger">Logout</a>
              <?php }else{ ?>
              <a href="/admin/login" class="btn btn-outline-primary">Login</a>
              <?php } ?>
          </div>
      </div>
    </div>
  </header>
    <?= $this->renderSection('content')?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>