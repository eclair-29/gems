function associateErrors(errors, fields) {
    const getMessage = (fieldErrors, field) =>
        fieldErrors.forEach((error) => {
            field.addClass("is-invalid");
            field
                .closest('[class*="col"]')
                .append(
                    '<span class="invalid-feedback fw-bold d-block">' +
                        error +
                        "</span>"
                );
        });

    if (errors.purchase) getMessage(errors.purchase, fields.purchase);
    if (errors.purchase_category)
        getMessage(errors.purchase_category, fields.purchase_category);
    if (errors.purchase_type)
        getMessage(errors.purchase_type, fields.purchase_type);
    if (errors.dept) getMessage(errors.dept, fields.dept);
    if (errors.status) getMessage(errors.status, fields.status);
    if (errors.allocated_budget_php)
        getMessage(errors.allocated_budget_php, fields.allocated_budget_php);
    if (errors.rate) getMessage(errors.rate, fields.rate);
}

function clearErrorMsg(fields) {
    Object.values(fields).forEach((field) => {
        field.attr("class", field.attr("class").replace(" is-invalid", ""));

        const invalidFeedback = field
            .closest('[class*="col"]')
            .find(".invalid-feedback");

        const hasFeedback = invalidFeedback.length > 0;

        hasFeedback && invalidFeedback.remove();
    });
}

function clearAlert(alert) {
    alert.attr("hidden", true);
    alert.attr("class", "alert").text("");
}

/* Validation process - Update action */
$("body").on("submit", ".update-purchase", function (e) {
    e.preventDefault();

    const action = $(this).attr("action");
    const id = $(this).attr("id").replace("update_purchase_fields_", "");

    const fields = {
        purchase: $(`#purchase_${id}`),
        allocated_budget_php: $(`#allocated_budget_php_${id}`),
    };

    clearErrorMsg(fields);

    const alert = $("#purchases").find(".alert");
    const updateModal = bootstrap.Modal.getOrCreateInstance(
        `#${$(this).closest(".popup").attr("id")}`
    );

    clearAlert(alert);

    $.ajax({
        url: action,
        type: "put",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: $(this).serialize(),
        success: function (data) {
            alert.attr("hidden", false);
            if (data.response === "success")
                alert.attr("class", "alert alert-success").text(data.alert);
            else alert.attr("class", "alert alert-danger").text(data.alert);

            getPurchases($("#series_select").val());

            updateModal.toggle();
        },
        error: function (error) {
            associateErrors(error.responseJSON.errors, fields);
        },
    });
});

/* Validation process - Add action */
$("#add_purchase_fields").on("submit", function (e) {
    e.preventDefault();

    const action = $(this).attr("action");

    const fields = {
        purchase: $("#purchase"),
        purchase_category: $("#purchase_category"),
        purchase_type: $("#purchase_type"),
        dept: $("#dept"),
        status: $("#status"),
        allocated_budget_php: $("#allocated_budget_php"),
    };

    clearErrorMsg(fields);

    const alert = $("#purchases").find(".alert");
    const updateModal = bootstrap.Modal.getOrCreateInstance(
        `#${$(this).closest(".popup").attr("id")}`
    );

    console.log(updateModal);

    clearAlert(alert);

    $.ajax({
        url: `${action}?series_id=${$("#series_select").val()}`,
        type: "post",
        data: $(this).serialize(),
        success: function (data) {
            alert.attr("hidden", false);
            if (data.response === "success")
                alert.attr("class", "alert alert-success").text(data.alert);
            else alert.attr("class", "alert alert-danger").text(data.alert);

            getPurchases($("#series_select").val());

            updateModal.hide();
            $("#add_purchase_fields").trigger("reset");
        },
        error: function (error) {
            associateErrors(error.responseJSON.errors, fields);
        },
    });
});

$("#dollar_rate_fields").on("submit", function (e) {
    e.preventDefault();

    const action = $(this).attr("action");

    const fields = {
        rate: $("#rate"),
    };

    console.log(fields.rate.val());

    clearErrorMsg(fields);

    const alert = $("#purchases").find(".alert");
    const updateModal = bootstrap.Modal.getOrCreateInstance(
        `#${$(this).closest(".popup").attr("id")}`
    );

    clearAlert(alert);

    $.ajax({
        url: `${action}?series_id=${$("#series_select").val()}`,
        type: "post",
        data: $(this).serialize(),
        success: function (data) {
            alert.attr("hidden", false);
            if (data.response === "success")
                alert.attr("class", "alert alert-success").text(data.alert);
            else alert.attr("class", "alert alert-danger").text(data.alert);

            getPurchases($("#series_select").val());

            updateModal.toggle();
            $("#dollar_rate_fields").trigger("reset");
        },
        error: function (error) {
            associateErrors(error.responseJSON.errors, fields);
        },
    });
});

function disableControls(toggle) {
    $("#add_purchase_btn").attr("disabled", toggle);
    $("#fork_btn").attr("disabled", toggle);
    $("#dollar_rate_btn").attr("disabled", toggle);
    $("#download_btn").attr(
        "class",
        toggle ? "btn btn-outline-success disabled" : "btn btn-outline-success"
    );
}

function getPurchases(series_id) {
    $.ajax({
        type: "get",
        url: `${BASE_URL}/purchases/all?series_id=${series_id}`,
        success: function (response) {
            purchases_table.clear();
            purchases_table.rows.add(response.data).draw();
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function getDollarRate(series_id) {
    $.ajax({
        type: "get",
        url: `${BASE_URL}/rates?series_id=${series_id}`,
        success: function (response) {
            $("#rate").val(response.rate);
        },
        error: function (error) {
            console.log(error);
        },
    });
}

// load datatable data
$("#series_select").on("change", function () {
    getPurchases($(this).val());
    getDollarRate($(this).val());
    disableControls(false);

    $("#rate_label").html(
        `Dollar to Peso rate for <span class="fw-bold text-success">${$(this)
            .find(":selected")
            .text()}</span>`
    );
});

disableControls(true);
