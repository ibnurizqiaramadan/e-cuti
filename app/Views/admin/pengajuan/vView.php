<?= $this->extend('admin/layouts/app'); ?>

<?= $this->section('content') ?>
<input type="hidden" readonly value="<?= $pengajuanId ?? "" ?>" id="pengajuanId">
<div class="container-fluid pb-3">
    <style>
    #signature {
        width: 300px;
        height: 200px;
    }

    #prev {
        width: 200px;
        height: 100px;
    }
    </style>
    <div class="row">
        <div class="col-md-12 col-lg-8 mb-3">
            <div class="card mb-0">
                <div class="card-header">Informasi Umum</div>
                <div class="card-body" id="formInformasiUmum">

                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-3">
            <div class="card mb-0">
                <div class="card-header">Lama Cuti</div>
                <div class="card-body" id="formLamaCuti">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 mb-3">
            <div class="card mb-0">
                <div class="card-header">Alamat & Kontak</div>
                <div class="card-body" id="formAlamatKontak">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-8 mb-3">
            <div class="card mb-0">
                <div class="card-header">Approval & Penandatangan</div>
                <div class="card-body" id="formApproval">

                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="card mb-0">
                <div class="card-header">Dokumen Pendukung</div>
                <div class="card-body" id="formDokumenPendukung">

                </div>
            </div>
        </div>
    </div>

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