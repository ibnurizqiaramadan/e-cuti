CURRENT_PATH = ADMIN_PATH + "/pengajuan-cuti/";
tableId = "#listPengajuan";
moveRoom(tableId);

function refreshData() {
    table.ajax.reload(null, !1);
}
$(document).ready(function () {
    // $(tableId).attr("style", "width:115px; text-align:center;");
    table = $(tableId).DataTable({
        processing: !0,
        serverSide: !0,
        order: [],
        ajax: {
            url: API_PATH + "data/pengajuan",
            type: "POST",
            data: {
                _token: TOKEN,
            },
            complete: function (response) {},
            dataSrc: function (json) {
                json?.status == "401" &&
                    msgSweetWarning("Sesi Anda berakhir !").then((msg) => {
                        doLogoutAjax();
                    });
                json?.status == "fail" && toastError(json?.message, "Gagal");
                return json.data;
            },
            error: function (error) {
                errorCode(error);
            },
        },
        fnCreatedRow: function (nRow, aData, iDataIndex) {
            $(nRow).attr("data-id", aData.id);
        },
        columns: dataColumnTable([
            "id",
            "nama",
            "nip",
            "tgl_mulai",
            "tgl_selesai",
            "file_lampiran",
            // "approval",
        ]),
        columnDefs: [
            {
                targets: [0],
                orderable: !1,
                sClass: "text-center align-middle",
                render: function (data, type, row) {
                    return "#";
                },
            },
            {
                targets: [1],
                orderable: 1,
                sClass: "text-left align-middle",
                render: function (data, type, row) {
                    return `${row.nama} <br> NIP. ${row.nip}`;
                },
            },
            {
                targets: [2],
                orderable: 1,
                sClass: "text-center align-middle",
                render: function (data, type, row) {
                    jenis = {
                        0: "Tahunan",
                        1: "Besar",
                        2: "Dakit",
                        3: "Melahirkan",
                        4: "Karna Alasan Penting",
                        5: "Bersama",
                        6: "Diluar Tanggungan Negara",
                    };
                    return `${jenis[row.jenis_cuti]} / ${row.lama} Hari`;
                },
            },
            {
                targets: [3],
                orderable: 1,
                sClass: "text-center align-middle",
                render: function (data, type, row) {
                    return `${moment(row.tgl_mulai).format(
                        "Do MMMM YYYY"
                    )} s/d <br> ${moment(row.tgl_selesai).format(
                        "Do MMMM YYYY"
                    )}`;
                },
            },
            {
                targets: [4],
                orderable: !1,
                sClass: "text-left align-middle",
                render: function (data, type, row) {
                    return `${
                        row.file_lampiran == null
                            ? "Tidak ada lampiran"
                            : row.file_lampiran
                    }`;
                },
            },
            {
                sClass: "text-center align-middle",
                targets: [5],
                orderable: !0,
                render: function (data, type, row) {
                    let approval = {
                        0: "progress|info",
                        1: "diterima|success",
                        2: "ditolak|danger",
                        3: "ditangguhkan",
                        4: "perubahan",
                    };
                    return `<span class='btn btn-sm btn-${
                        approval[row.approval].split("|")[1]
                    }'>${approval[row.approval].split("|")[0]}</span>`;
                },
            },
            {
                sClass: "text-center align-middle",
                targets: [6],
                orderable: !0,
                render: function (data, type, row) {
                    let btn = `<button class='btn btn-info btn-sm' id='detail' data-id="${row.id}" title='Lihat Detail'><i class='fas fa-eye'></i></button>`;
                    if (row.approval == 1) {
                        btn += `<button class='btn btn-success btn-sm ml-2' id='print' data-id="${row.id}" title='Print Pengajuan'><i class='fas fa-print'></i></button>`;
                    }
                    return btn;
                },
            },
        ],
    });
});

$(tableId).delegate("#detail", "click", function () {
    let id = $(this).data("id");
    // alert(CURRENT_PATH);
    loadPage(`${CURRENT_PATH}view/${id}`);
});

$(tableId).delegate("#print", "click", function () {
    let id = $(this).data("id");
    // alert(CURRENT_PATH);
    redirect(`${CURRENT_PATH}print/${id}`, true);
});
