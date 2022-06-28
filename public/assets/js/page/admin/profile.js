CURRENT_PATH = ADMIN_PATH + "/profile/";
moveRoom(tableId);

$(document).ready(function () {
    addFormProfile();
    getProfile();
});

$("#reset").on("click", function () {
    getProfile();
});

function addFormProfile() {
    addFormInput("#formBody", [
        {
            type: "text",
            name: "email",
            label: "Email",
        },
        {
            type: "text",
            name: "nama",
            label: "Nama",
        },
        {
            type: "number",
            name: "nip",
            label: "NIP",
        },
    ]);
}

function getProfile() {
    return new Promise((resolve) => {
        $.ajax({
            dataType: "json",
            type: "post",
            url: API_PATH + "data/profile",
            data: {
                _token: TOKEN,
            },
            beforeSend: function () {
                disableButton();
            },
            complete: function () {
                enableButton();
            },
            success: function (result) {
                fillForm(result.data);
                $("#photoProfile").attr(
                    "src",
                    result.data.photo != ""
                        ? `${BASE_URL}/uploads/users/${result.data.photo}`
                        : `${BASE_URL}/uploads/users/default.png`
                );
            },
        }).done(function (result) {
            resolve(result);
        });
    });
}

$("#updateProfile").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: `${CURRENT_PATH}update`,
        type: "post",
        dataType: "json",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            disableButton();
        },
        complete: function () {
            enableButton();
        },
        success: function (result) {
            validate(result.validate.input);
            result.validate.success && "ok" == result.status
                ? (toastSuccess(result.message),
                  getProfile(),
                  socket.emit?.("teamChanged"),
                  $(`input[name="photo"]`).val(""),
                  updateInfo())
                : toastWarning(result.message);
            // validate(e.validate.input),e.validate.success&&("ok"==e.status?(toastSuccess(e.message),refreshData(),1==e.modalClose&&$("#modalForm").modal("hide"),clearInput(e.validate.input),socket.emit?.("affectDataTable", tableId)):toastWarning(e.message));
        },
        error: function (error) {
            errorCode(error);
        },
    });
});

function updateInfo() {
    $.get(CURRENT_PATH, function (data) {
        $("#userLoginInfo").html($(data).find("#userLoginInfo").html());
        $("#rotiId").html($(data).find("#rotiId").html());
    })
        .fail(function (err) {
            $("#contentId").html(
                `<div class="container">${err.statusText}</div>`
            );
            nanobar.go(100);
            errorCode(err);
        })
        .done(function () {
            nanobar.go(100);
        });
}

$("#formPassword").submit(function (e) {
    e.preventDefault();
    let data = new FormData(this);
    data.append("_token", TOKEN);
    $.ajax({
        url: `${CURRENT_PATH}set-password`,
        type: "post",
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            disableButton();
        },
        complete: function () {
            enableButton();
        },
        success: function (result) {
            validate(result.validate.input);
            console.log(result);
            if (result.status == "ok") {
                msgSweetSuccess(result.message);
                $("#passBaru").val("");
                $("#passLama").val("");
                $("#confirmPass").val("");
            }
            if (result.status == "fail") msgSweetError(result.message);
        },
        error: function (error) {
            errorCode(error);
        },
    });
});

$("#formInput").submit(function (e) {
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
                e.validate.success &&
                    ("ok" == e.status
                        ? (toastSuccess(e.message),
                          refreshData(),
                          1 == e.modalClose && $("#modalForm").modal("hide"),
                          clearInput(e.validate.input))
                        : toastWarning(e.message));
        },
        error: function (err) {
            errorCode(err);
        },
    });
});
