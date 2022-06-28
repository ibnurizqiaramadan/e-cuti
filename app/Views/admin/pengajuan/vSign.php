<?= $this->extend('admin/layouts/app'); ?>

<?= $this->section('content') ?>
<input type="hidden" readonly value="<?= $pengajuanId ?? "" ?>" id="pengajuanId">
<div class="container-fluid pb-3">
    <style>
    #signature,
    #prev {
        width: 100%;
        height: 200px;
    }
    </style>
    <?php if (session('level') == 1) : ?>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="m-0"><?= $nip . " - " . $nama ?></h4>
                <div>
                    <button class="btn btn-sm btn-success" id="approvalAccept"
                        data-id="<?= $approvalId ?? "" ?>">Terima</button>
                    <button class="btn btn-sm btn-danger" data-id="<?= $approvalId ?? "" ?>"
                        id="approvalReject">Tolak</button>
                    <!-- <button class="btn btn-sm btn-warning">Tangguhkan</button>
                    <button class="btn btn-sm btn-warning">Perubahan</button> -->
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="signature"></div>
        </div>
    </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="<?= base_url('assets/css/jquery.signature.css') ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer></script>
<script src="<?= base_url('assets/js/module/jquery.signature.min.js') ?>" defer></script>
<script src="<?= base_url('assets/js/module/jquery.ui.touch-punch.js') ?>" defer></script>
<script src="<?= base_url('assets/js/page/admin/pengajuanView.js') ?>" defer></script>
<?= $this->endSection() ?>