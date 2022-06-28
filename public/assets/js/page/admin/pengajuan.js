CURRENT_PATH = ADMIN_PATH + "/pengajuan-cuti/";

function addFormInformasiUmum() {
    clearFormInput("#formInformasiUmum");
    addFormInput("#formInformasiUmum", [
        {
            type: "select2",
            name: "jenis_cuti",
            label: "Jenis Cuti",
            data: {
                0: "Tahunan",
                1: "Besar",
                2: "Sakit",
                3: "Melahirkan",
                4: "Karna Alasan Penting",
                5: "Bersama",
                6: "Diluar Tanggungan Negara",
            },
        },
        {
            type: "textarea2",
            name: "alasan",
            label: "Alasan",
        },
    ]);
}

function addFormLamaCuti() {
    clearFormInput("#formLamaCuti");
    addFormInput("#formLamaCuti", [
        {
            type: "date",
            name: "tgl_mulai",
            label: "Tanggal Mulai",
        },
        {
            type: "date",
            name: "tgl_selesai",
            label: "Tanggal Selesai",
        },
    ]);
}

function addFormAlamatKontak() {
    clearFormInput("#formAlamatKontak");
    addFormInput("#formAlamatKontak", [
        {
            type: "textarea2",
            name: "alamat_cuti",
            label: "Alamat Selama Menjalankan Cuti",
        },
        {
            type: "number",
            name: "kontak",
            label: "Kontak",
        },
    ]);
}

function addFormDokumenPendukung() {
    clearFormInput("#formDokumenPendukung");
    addFormInput("#formDokumenPendukung", [
        {
            type: "file",
            id: "dokumenPendukung",
            label: "Dokumen Pendukung (Max. 3MB)",
        },
    ]);
}

function addFormApproval() {
    clearFormInput("#formApproval");
    addFormInput("#formApproval", [
        {
            type: "select2",
            name: "approval_1",
            label: "Approval 1",
            api: {
                url: API_PATH + "data/options/users",
                option: {
                    value: "id",
                    caption: "{nip} - {nama}",
                },
                where: {
                    level: 1,
                },
                order: {
                    nama: "asc",
                },
            },
        },
        {
            type: "select2",
            name: "approval_2",
            label: "Approval Atasan",
            api: {
                url: API_PATH + "data/options/users",
                option: {
                    value: "id",
                    caption: "{nip} - {nama}",
                },
                where: {
                    level: 1,
                },
                order: {
                    nama: "asc",
                },
            },
        },
        {
            type: "select2",
            name: "approval_3",
            label: "Approval Pejabat Berwenang",
            api: {
                url: API_PATH + "data/options/users",
                option: {
                    value: "id",
                    caption: "{nip} - {nama}",
                },
                where: {
                    level: 1,
                },
                order: {
                    nama: "asc",
                },
            },
        },
    ]);
}

$(document).ready(function () {
    addFormInformasiUmum();
    addFormLamaCuti();
    addFormAlamatKontak();
    addFormDokumenPendukung();
    addFormApproval();
    $("#formInput").attr("action", CURRENT_PATH + "store");
});

$(`#formInput`).submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: $(this).attr("action"),
        type: "post",
        data: formData,
        processData: !1,
        contentType: !1,
        cache: !1,
        dataType: "JSON",
        beforeSend: function () {
            disableButton();
        },
        complete: function () {
            enableButton();
        },
        success: function (e) {
            validate(e.validate.input),
                e.validate.success == true
                    ? "ok" == e.status
                        ? toastSuccess(e.message)
                        : //   clearInput(e.validate.input)
                          toastWarning(e.message)
                    : toastWarning(e.message);
        },
        error: function (err) {
            errorCode(err);
        },
    });
});
