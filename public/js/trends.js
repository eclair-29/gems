function loadOverallByFiscal(fiscal) {
    $.ajax({
        type: "get",
        url: `${BASE_URL}/trends/overall?fiscal=${fiscal}`,
        success: function (response) {
            console.log(response);
            getChartsByFiscalActual(response, fiscal);
        },
    });
}

function getChartsByFiscalActual(response, fiscal) {
    const actual = $("#fiscal_overall_trend");
    const datasets = [];

    response.reduce((acc, val) => {
        const budget = val.total_allocated_budget_php;
        const series = val.series_description;

        if (!acc[series]) {
            acc[series] = {
                series: series,
                budget: 0,
            };

            datasets.push(acc[series]);
        }

        acc[series].budget += budget;
        return acc;
    }, {});

    const labels = datasets.map((data) => data.series);
    const data = datasets.map((data) => data.budget);

    new Chart(actual, {
        type: "bar",
        labels,
        datasets: [],
    });

    console.log("datasets", datasets);
}

loadOverallByFiscal("2024_H1");
