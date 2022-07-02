<?= $this->extend('admin/layouts/app'); ?>

<?= $this->section('content') ?>
<div class="container-fluid pb-3">

    <form id="formInput">
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
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit"> <i class="fas fa-paper-plane"></i> Kirim</button>
                    </div>
                </div>
            </div>
    </form>
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
<script src="<?= base_url('assets/js/page/admin/pengajuan.js') ?>" defer></script>
<?= $this->endSection() ?>