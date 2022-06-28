<?= $this->include('admin/layouts/head'); ?>
<?= $this->include('admin/layouts/js'); ?>
<script src="<?= base_url('assets/js/page/login.js') ?>" defer></script>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- <img src="<?= base_url('assets/img/logo.png') ?>" alt="logo" class="logo-app"> -->
        <div class="login-logo">
            <a href=" <?= base_url() ?>"><b>E - Cuti</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masuk untuk melanjutkan</p>
                <form action="<?= base_url(ADMIN_PATH . '/login/action') ?>" method="post" id="formLogin">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="nrk" placeholder="nrk">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div id="validate_nrk"></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div id="validate_password"></div>
                    </div>
                    <div class="w-100 align-right">
                        <div class="row d-flex justify-content-center">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>