<?= $this->extend('admin/layouts/app'); ?>

<?= $this->section('content') ?>
<div class="container-fluid pb-3">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="card border-0 shadow mb-0">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                aria-selected="true">Profile</a>

                            <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password"
                                role="tab" aria-controls="nav-password" aria-selected="false">Password</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- tab profile -->
                        <div class="tab-pane pt-3 show active" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <form id="updateProfile">
                                <div id="formBody">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                        <!-- tab profile -->
                        <!-- tab password -->
                        <div class="tab-pane pt-3" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                            <form id="formPassword">
                                <div class="form-group">
                                    <label>Masukan Password Lama</label>
                                    <input type="password" name="passwordLama" id="passLama" class="form-control"
                                        placeholder="Password" required>
                                    <div id="validate_passwordLama"></div>
                                </div>
                                <div class="form-group">
                                    <label>Masukan Password Baru</label>
                                    <input type="password" name="password" id="passBaru" class="form-control"
                                        placeholder="Password" required>
                                    <div id="validate_password"></div>
                                </div>
                                <div class="form-group">
                                    <label>Masukan Lagi Password</label>
                                    <input type="password" name="passwordConfirm" id="confirmPass" class="form-control"
                                        placeholder="Password" required>
                                    <div id="validate_passwordConfirm"></div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" id="btnUbahPass" class="btn btn-primary" disabled="true"> <i
                                            class="icon-copy dw dw-paper-plane"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!-- tab password -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/page/admin/profile.js') ?>" defer></script>
<?= $this->endSection() ?>