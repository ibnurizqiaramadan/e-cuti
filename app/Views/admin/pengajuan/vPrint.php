<?= $this->include('admin/layouts/head'); ?>

<style>
* {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11pt;
}

body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 11pt "Arial";
}

* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.page {
    width: 21cm;
    min-height: 29.7cm;
    padding: 2cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 256mm;
    outline: 2cm #FFEAEA solid;
}

@page {
    size: A4;
    margin: 0;
}

@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}

.text-bold {
    font-weight: bold;
}

.border tr {
    border: 1px black solid !important;
}

.border tr td {
    border: 1px black solid !important;
    padding-left: 4px;
    padding-right: 4px;
}

.table-data-pegawai tr td:first-child {
    width: 100px
}

.check-cuti {
    width: 30px
}

.cuti-nomor {
    width: 20px
}

/* svg {
    width: 50px;
    height: 50px;
} */
</style>

<?php



?>

<body class="page">

    <div class="row">
        <div class="col-7"></div>
        <div class="col-5 d-flex justify-content-end">
            <table>
                <tr>
                    <td colspan="2" class="text-center">Jakarta, <?= date('d M Y') ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center pt-2">Kepada</td>
                </tr>
                <tr>
                    <td style="vertical-align: text-top;">Yth. </td>
                    <td><?= $approval3['jabatan']['nama'] ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">di Jakarta</td>
                </tr>
            </table>
        </div>
    </div>

    <h5 class="text-center text-bold mt-4">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h5>
    <table class="no-tanggal text-bold">
        <tr>
            <td class="fw-bold">Nomor</td>
            <td class="px-3">:</td>
            <td>E - <?= $nomorPengajuan ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td class="px-3">:</td>
            <td><?= date('d F Y', strtotime($data->pengajuan_dibuat)) ?></td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-data-pegawai">
        <tr>
            <td colspan="4">I. DATA PEGAWAI</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= $data->nama ?></td>
            <td>NIP</td>
            <td><?= $data->nip ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><?= $jabatan->nama ?></td>
            <td>Masa Kerja</td>
            <td><?= $masaKerja ?></td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td colspan="3"><?= $unitKerja->nama ?></td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-data-cuti-yang-diambil">
        <tr>
            <td colspan="6">II. JENIS CUTI YANG DIAMBIL</td>
        </tr>
        <tr>
            <td class="cuti-nomor">1.</td>
            <td>Cuti Tahunan</td>
            <td class="text-center check-cuti"><?= $data->jenis_cuti == 0 ? '&check;' : '-' ?></td>
            <td class="cuti-nomor">2.</td>
            <td>Cuti Besar</td>
            <td class="text-center check-cuti"><?= $data->jenis_cuti == 1 ? '&check;' : '-' ?></td>
        </tr>
        <tr>
            <td class="cuti-nomor">3.</td>
            <td>Cuti Sakit</td>
            <td class="text-center check-cuti"><?= $data->jenis_cuti == 2 ? '&check;' : '-' ?></td>
            <td class="cuti-nomor">4.</td>
            <td>Cuti Melahirkan</td>
            <td class="text-center check-cuti"><?= $data->jenis_cuti == 3 ? '&check;' : '-' ?></td>
        </tr>
        <tr>
            <td class="cuti-nomor">5.</td>
            <td>Cuti Karena Alasan Penting</td>
            <td class="text-center check-cuti"><?= $data->jenis_cuti == 4 ? '&check;' : '-' ?></td>
            <td class="cuti-nomor">6.</td>
            <td>Cuti di Luar Tanggungan Negara</td>
            <td class="text-center check-cuti"><?= $data->jenis_cuti == 5 ? '&check;' : '-' ?></td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-alasan-cuti">
        <tr>
            <td>III. ALASAN CUTI</td>
        </tr>
        <tr>
            <td class="pb-3"><?= $data->alasan ?></td>
        </tr>
    </table>


    <table class="border mt-3 w-100 table-lamanya-cuti">
        <tr>
            <td colspan="2">IV. LAMANYA CUTI</td>
        </tr>
        <tr>
            <td class="p-2 text-center w-50">Selama <?= $data->lama ?> Hari</td>
            <td class="p-2 text-center w-50">Tanggal <?= date('d F', strtotime($data->tgl_mulai)) ?> s.d
                <?= date('d F Y', strtotime($data->tgl_selesai)) ?>
            </td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-catatan-cuti">
        <tr>
            <td colspan="6">V. CATATAN CUTI</td>
        </tr>
        <tr>
            <td colspan="2">1. CUTI TAHUNAN</td>
            <td class="text-center">&check;</td>
            <td class="cuti-nomor">2.</td>
            <td>CUTI BESAR</td>
            <td class="text-center check-cuti"><?= $jmlCuti['cuti_besar'] ?></td>
        </tr>

        <tr>
            <td class="text-center">Tahun</td>
            <td class="text-center">Sisa</td>
            <td class="text-center">Keterangan</td>
            <td class="cuti-nomor">3.</td>
            <td>CUTI SAKIT</td>
            <td class="text-center check-cuti"><?= $jmlCuti['cuti_sakit'] ?></td>
        </tr>

        <tr>
            <td class="text-center"><?= date('Y') - 2 ?></td>
            <td class="text-center"><?= getSisaJatahTahunan(date('Y') - 2, $data->user_id) ?></td>
            <td class="text-center">-</td>
            <td class="cuti-nomor">4.</td>
            <td>CUTI MELAHIRKAN</td>
            <td class="text-center check-cuti"><?= $jmlCuti['cuti_melahirkan'] ?></td>
        </tr>
        <tr>
            <td class="text-center"><?= date('Y') - 1 ?></td>
            <td class="text-center"><?= getSisaJatahTahunan(date('Y') - 1, $data->user_id) ?></td>
            <td class="text-center">-</td>
            <td class="cuti-nomor">5.</td>
            <td>CUTI KARENA ALASAN PENTING</td>
            <td class="text-center check-cuti"><?= $jmlCuti['cuti_alasan_penting'] ?></td>
        </tr>
        <tr>
            <td class="text-center"><?= date('Y') ?></td>
            <td class="text-center"><?= getJatahTahunan($data->user_id) ?> </td>
            <td class="text-center">-</td>
            <td class="cuti-nomor">6.</td>
            <td>CUTI DI LUAR TANGGUNGAN NEGARA</td>
            <td class="text-center check-cuti"><?= $jmlCuti['cuti_tanggungan'] ?></td>
        </tr>

    </table>

    <table class="border mt-3 w-100 table-alamat-cuti">
        <tr>
            <td colspan="3">VI. ALAMAT SELAMA MENJALANKAN CUTI</td>
        </tr>
        <tr>
            <td rowspan="2" style="width: 500px; vertical-align: text-top;"> <?= $data->alamat_cuti ?> </td>
            <td>TELP.</td>
            <td><?= $data->kontak ?></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                Hormat Saya,
                <p class="mt-5 m-0"><?= $data->nama ?></p>
                <p class="m-0">NIP <?= $data->nip ?></p>
            </td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-pertimbangan-atasan-cuti">
        <tr>
            <td colspan="4">VII. PERTIMBANGAN ATASAN LANGSUNG</td>
        </tr>
        <tr class="text-center">
            <td>DISETUJUI</td>
            <td>PERUBAHAN</td>
            <td>DITANGGUHKAN</td>
            <td>TIDAK DISETUJUI</td>
        </tr>
        <tr class="text-center">
            <td>&check;</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr style="border: 0;">
            <td colspan="2" class="w-50">&nbsp;</td>
            <td colspan="2" class="w-50 text-center">
                <?= $approval2['jabatan']['nama'] ?>
                <p class="m-0">
                    <?= $approval2['signature'] ?>
                </p>
                <p class="m-0"><?= $approval2['user']['nama'] ?></p>
                <p class="m-0">NIP <?= $approval2['user']['nip'] ?></p>
            </td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-keputusan-cuti">
        <tr>
            <td colspan="4">VIII. VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</td>
        </tr>
        <tr class="text-center">
            <td>DISETUJUI</td>
            <td>PERUBAHAN</td>
            <td>DITANGGUHKAN</td>
            <td>TIDAK DISETUJUI</td>
        </tr>
        <tr class="text-center">
            <td>&check;</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr style="border: 0;">
            <td colspan="2" class="w-50" style="border: 0;">&nbsp;</td>
            <td colspan="2" class="w-50 text-center">
                <?= $approval3['jabatan']['nama'] ?>
                <p class="m-0">
                    <?= $approval3['signature'] ?>
                </p>
                <p class="m-0"><?= $approval3['user']['nama'] ?></p>
                <p class="m-0">NIP <?= $approval3['user']['nip'] ?></p>
            </td>
        </tr>
    </table>

    <script>
    window.print()
    </script>
</body>