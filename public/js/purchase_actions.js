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

            updateModal.hide();
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

const date = new Date();
console.log("current date: " + date.getMonth());
