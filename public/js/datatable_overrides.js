const purchasesTableCols = [
    {
        data: "id",
        render: (data, type, row) => `
            <a 
                href="#"
                data-bs-toggle="modal"
                data-bs-target="#edit_purchase_popup_${data}"
                class="link-success fw-bold"
            >
                Edit
            </a>
        `,
    },
    { data: "dept" },
    {
        render: (data, type, row, index) => index.row + 1,
    },
    { data: "description" },
    { data: "purchase_category" },
    { data: "purchase_type" },
    { data: "dollar_rate" },
    { data: "allocated_budget_php" },
    { data: "allocated_budget_usd" },
    { data: "fiscal" },
    { data: "series" },
    { data: "status" },
    { data: "notes" },
    { data: "updated_at" },
];

const purchasesTableColDefs = [
    {
        targets: 0,
        className: "text-center",
    },
    {
        targets: 5,
        className: "text-capitalize",
    },
    {
        targets: 6,
        className: "text-capitalize",
    },
    {
        targets: 8,
        className: "notes-cell",
    },
];

let purchases_table = new DataTable("#purchases_table", {
    pageLength: 25,
    data: [],
    columns: purchasesTableCols,
    columnDefs: purchasesTableColDefs,
    order: [[12, "desc"]],
});

function overrideTable(id) {
    const entries = $(`#${id}_table_length`);
    const search = $(`#${id}_table_filter`);
    const top_controls =
        "<div class='table-top-controls d-flex align-items-center justify-content-between' id='" +
        id +
        "_table_top_controls'></div>";

    $(`#${id}_table`).wrap("<div class='table-responsive'></div>");

    entries.wrap(top_controls);
    search.detach().appendTo("#" + id + "_table_top_controls");
}

overrideTable("purchases");

// load datatable data on page load
