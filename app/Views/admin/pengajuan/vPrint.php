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

<body class="page">
    <h5 class="text-center text-bold">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h5>
    <table class="no-tanggal text-bold">
        <tr>
            <td class="fw-bold">Nomor</td>
            <td class="px-3">:</td>
            <td>E - 0099</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td class="px-3">:</td>
            <td>20-12-2022</td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-data-pegawai">
        <tr>
            <td colspan="3">I. DATA PEGAWAI</td>
            <td></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>Ibnu Rizqia Ramadan</td>
            <td>NIP</td>
            <td>123321</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>Ka Satlak Kec Sawah Besar</td>
            <td>Masa Kerja</td>
            <td>11 Tahun 5 Bulan</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td colspan="3">Suku Dinas Ketahanan Pangan, Kelautan dan Pertanian Kota Administrasi Jakarta Pusat</td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-data-cuti-yang-diambil">
        <tr>
            <td colspan="6">II. JENIS CUTI YANG DIAMBIL</td>
        </tr>
        <tr>
            <td class="cuti-nomor">1.</td>
            <td>Cuti Tahunan</td>
            <td class="text-center check-cuti">-</td>
            <td class="cuti-nomor">2.</td>
            <td>Cuti Besar</td>
            <td class="text-center check-cuti">-</td>
        </tr>
        <tr>
            <td class="cuti-nomor">3.</td>
            <td>Cuti Sakit</td>
            <td class="text-center check-cuti">-</td>
            <td class="cuti-nomor">4.</td>
            <td>Cuti Melahirkan</td>
            <td class="text-center check-cuti">-</td>
        </tr>
        <tr>
            <td class="cuti-nomor">5.</td>
            <td>Cuti Karena Alasan Penting</td>
            <td class="text-center check-cuti">&check;</td>
            <td class="cuti-nomor">6.</td>
            <td>Cuti di Luar Tanggungan Negara</td>
            <td class="text-center check-cuti">-</td>
        </tr>
    </table>

    <table class="border mt-3 w-100 table-alasan-cuti">
        <tr>
            <td>III. ALASAN CUTI</td>
        </tr>
        <tr>
            <td class="pb-3">Alasan untuk cuti</td>
        </tr>
    </table>


    <table class="border mt-3 w-100 table-lamanya-cuti">
        <tr>
            <td colspan="2">IV. LAMANYA CUTI</td>
        </tr>
        <tr>
            <td class="p-2 text-center w-50">Selama 5 Hari</td>
            <td class="p-2 text-center w-50">Tanggal 27 Juli s.d 2 Agustus 2021 </td>
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
            <td class="text-center check-cuti">5</td>
        </tr>

        <tr>
            <td class="text-center">Tahun</td>
            <td class="text-center">Sisa</td>
            <td class="text-center">Keterangan</td>
            <td class="cuti-nomor">3.</td>
            <td>CUTI SAKIT</td>
            <td class="text-center check-cuti">-</td>
        </tr>

        <tr>
            <td class="text-center">2019</td>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
            <td class="cuti-nomor">4.</td>
            <td>CUTI MELAHIRKAN</td>
            <td class="text-center check-cuti">-</td>
        </tr>
        <tr>
            <td class="text-center">2020</td>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
            <td class="cuti-nomor">5.</td>
            <td>CUTI KARENA ALASAN PENTING</td>
            <td class="text-center check-cuti">-</td>
        </tr>
        <tr>
            <td class="text-center">2021</td>
            <td class="text-center">-</td>
            <td class="text-center">-</td>
            <td class="cuti-nomor">6.</td>
            <td>CUTI DI LUAR TANGGUNGAN NEGARA</td>
            <td class="text-center check-cuti">-</td>
        </tr>

    </table>

    <table class="border mt-3 w-100 table-alamat-cuti">
        <tr>
            <td colspan="3">VI. ALAMAT SELAMA MENJALANKAN CUTI</td>
        </tr>
        <tr>
            <td rowspan="2" style="width: 500px"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Exercitationem minus error adipisci cum tenetur aperiam quo delectus provident facilis neque, rerum sed
                numquam quisquam minima deleniti voluptate assumenda atque dolorum? </td>
            <td>TELP.</td>
            <td>081932327997</td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                Hormat Saya,
                <p class="mt-5 m-0">Ibnu Rizqia Ramadan</p>
                <p class="m-0">NIP 197006191996031003</p>
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
                Kepala Sub Bagian Tata Usaha
                <p class="m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="198" height="98">
                        <g fill="none">
                            <rect x="0" y="0" width="198" height="98" />
                            <g fill="none" stroke="#000000" stroke-width="2">
                                <polyline
                                    points="85,42 85,41 86,40 87,38 87,37 89,34 90,30 90,27 90,25 90,23 90,22 90,21 91,21 91,22 92,23 94,26 95,30 96,33 97,36 99,39 99,42 99,44 100,45 100,47 100,48 100,49 101,51 101,52 101,54 102,56 102,58 102,62 102,64 102,66 102,69 102,71 102,74 102,76 102,78 102,79 101,81 101,82 100,83 99,84 97,86 96,87 94,87 93,87 91,88 89,88 88,88 87,88 86,88 85,87 84,86 81,83 81,81 81,79 81,75 81,73 82,69 83,66 84,64 85,63 87,60 89,58 91,55 94,53 97,49 100,45 102,42 103,38 105,34 106,30 107,27 107,23 107,20 107,17 107,18 104,22 101,31 100,38 100,43 101,46 101,47 102,47 105,47 108,47 114,46 115,46 115,48 112,51 110,53 110,54 115,54 119,53 119,54 119,55 119,57" />
                                <polyline points="114,67 115,66 118,65 121,63 131,62 136,60 137,59" />
                            </g>
                        </g>
                    </svg>
                </p>
                <p class="m-0">Muhamad Amin</p>
                <p class="m-0">NIP 197006191996031003</p>
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
                Kepala Suku Dinas Ketahanan Pangan, Kelautan dan Pertanian Kota Administrasi Jakarta Pusat
                <p class="m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="198" height="98">
                        <g fill="none">
                            <rect x="0" y="0" width="198" height="98" />
                            <g fill="none" stroke="#000000" stroke-width="2">
                                <polyline
                                    points="85,42 85,41 86,40 87,38 87,37 89,34 90,30 90,27 90,25 90,23 90,22 90,21 91,21 91,22 92,23 94,26 95,30 96,33 97,36 99,39 99,42 99,44 100,45 100,47 100,48 100,49 101,51 101,52 101,54 102,56 102,58 102,62 102,64 102,66 102,69 102,71 102,74 102,76 102,78 102,79 101,81 101,82 100,83 99,84 97,86 96,87 94,87 93,87 91,88 89,88 88,88 87,88 86,88 85,87 84,86 81,83 81,81 81,79 81,75 81,73 82,69 83,66 84,64 85,63 87,60 89,58 91,55 94,53 97,49 100,45 102,42 103,38 105,34 106,30 107,27 107,23 107,20 107,17 107,18 104,22 101,31 100,38 100,43 101,46 101,47 102,47 105,47 108,47 114,46 115,46 115,48 112,51 110,53 110,54 115,54 119,53 119,54 119,55 119,57" />
                                <polyline points="114,67 115,66 118,65 121,63 131,62 136,60 137,59" />
                            </g>
                        </g>
                    </svg>
                </p>
                <p class="m-0">Muhamad Amin</p>
                <p class="m-0">NIP 197006191996031003</p>
            </td>
        </tr>
    </table>

</body>