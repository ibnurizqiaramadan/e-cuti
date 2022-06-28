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
            type: "text",
            name: "approval_1",
            label: "Approval 1",
        },
        {
            type: "text",
            name: "approval_2",
            label: "Approval Atasan",
        },
        {
            type: "text",
            name: "approval_3",
            label: "Approval Pejabat Berwenang",
        },
    ]);
}

function getData() {
    const id = $(`#pengajuanId`).val();
    $.ajax({
        url: API_PATH + "row/pengajuan/" + id,
        type: "post",
        dataType: "json",
        complete: function () {
            enableButton();
        },
        success: function (result) {
            "ok" == result.status
                ? fillForm(result.data)
                : msgSweetError(result.message);
        },
        error: function (err) {
            errorCode(err);
        },
    });
}

function approve(approvalId, signature = "") {
    $.ajax({
        url: `${CURRENT_PATH}approval/set`,
        type: "POST",
        data: {
            approval: approvalId,
            status: "1",
            signature: signature,
            reason: "",
        },
        dataType: "JSON",
        beforeSend: function () {},
        success: function (result) {
            "ok" == result.status
                ? msgSweetSuccess(result.message).then(() => {
                      loadPage(`${CURRENT_PATH}approval`);
                  })
                : msgSweetError(result.message);
        },
        error: function (err) {
            errorCode(err);
        },
    });
}

$(`#approvalAccept`).click(function (e) {
    const approvalId = $(this).data("id");
    $.ajax({
        url: `${API_PATH}row/approval/${approvalId}`,
        type: "POST",
        dataType: "JSON",
        beforeSend: function () {},
        success: function (result) {
            // console.log(result);
            const data = result.data;

            if (data.urut == "1") {
                confirmSweet("Anda yakin ingin menerima pengajuan ?").then(
                    (result) => {
                        if (isConfirmed(result)) {
                            approve(approvalId);
                        }
                    }
                );
            } else {
                // loadPage(`${CURRENT_PATH}sign-approval/${approvalId}`);
                $("#modalForm").modal("show");
                $("#modalTitle").html("Terima Pengajuan");
                $("#signature").signature();
            }
        },
        error: function (err) {
            errorCode(err);
        },
    });
});
$(`#approvalReject`).click(function (e) {
    const approvalId = $(this).data("id");
    confirmSweet("Apakah Anda yakin ingin menolak pengajuan ini ?").then(
        (result) => {
            if (isConfirmed(result)) {
                $("#modalReject").modal("show");
                $("#modalRejectTitle").html("Tolak Pengajuan");
                clearFormInput("#formBodyReject");
                addFormInput("#formBodyReject", [
                    {
                        type: "textarea2",
                        name: "rejectReason",
                        id: "rejectReason",
                        label: "Alasan",
                    },
                ]);
            }
        }
    );
});

$("#rejectRequest").click(function () {
    const approvalId = $(this).data("id");
    const reason = $("#rejectReason").val();
    $.ajax({
        url: `${CURRENT_PATH}approval/set`,
        type: "POST",
        data: {
            approval: approvalId,
            status: "2",
            signature: "",
            reason: reason,
        },
        dataType: "JSON",
        beforeSend: function () {
            $("#modalReject").modal("hide");
        },
        success: function (result) {
            "ok" == result.status
                ? msgSweetSuccess(result.message).then(() => {
                      loadPage(`${CURRENT_PATH}approval`);
                  })
                : msgSweetError(result.message);
        },
        error: function (err) {
            errorCode(err);
        },
    });
});

$(document).ready(function () {
    addFormInformasiUmum();
    addFormLamaCuti();
    addFormAlamatKontak();
    addFormDokumenPendukung();
    addFormApproval();
    setTimeout(() => {
        getData();
        $("input").prop("readonly", true);
        $("textarea").prop("readonly", true);
        $("select").prop("disabled", true);
    }, 500);
    // $("#signature").signature();
});

$("#resetSignature").click(function () {
    $("#signature").signature("clear");
});

$("#acceptSignature").click(function () {
    const approvalId = $(this).data("id");
    const output = $("#signature").signature("toSVG");
    // console.log(output);
    approve(approvalId, output);
    $("#modalForm").modal("hide");
});
