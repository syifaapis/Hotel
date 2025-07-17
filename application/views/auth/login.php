<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= isset($title) ? $title : 'Login' ?> | Rosella</title>
  <link rel="icon" type="image/png" sizes="16x16" href="<?= site_url('assets/quixlab-master/images/favicon.png') ?>">
  <link href="<?= site_url('assets/quixlab-master/css/style.css') ?>" rel="stylesheet">
</head>

<body class="h-100">

  <div id="preloader">
    <div class="loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
      </svg>
    </div>
  </div>

  <div class="login-form-bg h-100">
    <div class="container h-100">
      <div class="row justify-content-center h-100">
        <div class="col-xl-6">
          <div class="form-input-content">
            <div class="card login-form mb-0">
              <div class="card-body pt-5">
                <h4 class="text-center">Rosella</h4>

                <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('auth/login') ?>">
                  <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                  <?php endif; ?>

                  <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                  <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                </form>

                <!-- Hapus baris berikut kalau tidak ada fitur register -->
                <!-- <p class="mt-5 login-form__footer text-center">Belum punya akun? <a href="#" class="text-primary">Hubungi Admin</a></p> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= site_url('assets/quixlab-master/plugins/common/common.min.js') ?>"></script>
  <script src="<?= site_url('assets/quixlab-master/js/custom.min.js') ?>"></script>
  <script src="<?= site_url('assets/quixlab-master/js/settings.js') ?>"></script>
  <script src="<?= site_url('assets/quixlab-master/js/gleek.js') ?>"></script>
  <script src="<?= site_url('assets/quixlab-master/js/styleSwitcher.js') ?>"></script>

</body>
</html>
