<?= $this->extend('admin/layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid pb-3">
    <?php if (session('level') == '2') : ?>
    <div class="card shadow border-0">
        <div class="card-body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere cumque pariatur, laudantium voluptas eius
            officia eos, aspernatur numquam provident autem aliquam animi maiores iusto vel fuga quas laboriosam! Animi,
            rerum!
        </div>
    </div>
    <?php endif; ?>
    <?php if (session('level') != '2') : ?>
    <!-- <h4>Selamat datang <?= session('nama') ?></h3> -->
    <div class="row">

        <?php foreach ($cuti as $key) : ?>

        <div class="col-lg-2 col-md-3 col-xs-12">

            <div class="card shadow ">
                <div class="card-header text-center">
                    <?= $key['nama'] ?>
                </div>

                <div class="card-body text-center">
                    <h1><?= $key['jumlah'] ?></h2>
                        <p>Hari</p>
                </div>
            </div>

        </div>

        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script src="<?= base_url('assets/js/page/admin/dashboard.js') ?>" defer></script>
<?= $this->endSection(); ?>