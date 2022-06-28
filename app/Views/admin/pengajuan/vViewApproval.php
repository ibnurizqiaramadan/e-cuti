<?= $this->extend('admin/layouts/app'); ?>

<?= $this->section('content') ?>
<input type="hidden" readonly value="<?= $pengajuanId ?? "" ?>" id="pengajuanId">
<div class="container-fluid pb-3">
    <style>
    #signature {
        width: 200px;
        height: 100px;
    }

    #prev {
        width: 200px;
        height: 100px;
    }
    </style>
    <?php if (session('level') == 1) : ?>
    <!-- modal acc -->
    <div class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" id="formBody">

                    <div class="form-group">
                        <label for="">Tanda tangan</label>
                    </div>
                    <div id="signature"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="resetSignature">Reset</button>
                    <button type="submit" class="btn btn-primary" data-id="<?= $approvalId ?? "" ?>"
                        id="acceptSignature">Terima</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal reject -->
    <div class="modal fade" id="modalReject" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRejectTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="formBodyReject">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" data-id="<?= $approvalId ?? "" ?>"
                        id="rejectRequest">Tolak</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="m-0"><?= $nip . " - " . $nama ?></h4>
                <?php if ($allowAcc->user_id == session('userId')) : ?>
                <div>
                    <button class="btn btn-sm btn-success" id="approvalAccept"
                        data-id="<?= $approvalId ?? "" ?>">Terima</button>
                    <button class="btn btn-sm btn-danger" data-id="<?= $approvalId ?? "" ?>"
                        id="approvalReject">Tolak</button>
                    <!-- <button class="btn btn-sm btn-warning">Tangguhkan</button>
                    <button class="btn btn-sm btn-warning">Perubahan</button> -->
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
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