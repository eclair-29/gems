const Utils = ChartUtils.init();

function loadOverallByFiscal(fiscal) {
    $.ajax({
        type: "get",
        url: `${BASE_URL}/trends/overall?fiscal=${fiscal}`,
        success: function (response) {
            getChartsByFiscalActual(response);
        },
    });
}

function getChartsByFiscalActual(response) {
    // Filter out entries where purchase_category is null
    const filteredData = _.filter(response, (data) => data.purchase_category);

    // Group data by purchase_category
    const groupedData = _.groupBy(filteredData, "purchase_category");

    // Extract unique month labels and sort it by calendar series
    const labels = _.chain(filteredData)
        .flatMap("series_description")
        .uniq()
        .filter((series) => series !== "Apr") // Filter out April
        .sortBy((series) => new Date(series)) // Sort by calendar series
        .value();

    // Initialize datasets
    const datasets = [];

    // Iterate through each purchase category
    _.forEach(groupedData, (data, category) => {
        const dataValues = Array(labels.length).fill(0);

        // Fill dataValues with allocations
        data.forEach((data) => {
            const index = labels.indexOf(data.series_description);
            if (index !== -1) {
                dataValues[index] = data.total_allocated_budget_php || 0;
            }
        });

        datasets.push({
            label: category,
            data: dataValues,
        });
    });

    // revisit for checking
    // Fill nulled series with zeros for each dataset
    datasets.forEach((dataset) => {
        const fillableMonths = _.flatMap(labels, (series) => {
            const index = labels.indexOf(series);
            return index !== -1 ? dataset.data[index] : 0;
        });
        dataset.data = fillableMonths;
    });

    // Construct final result
    const result = {
        labels: _.flatMap(labels, (series) => series.slice(0, 3)), // Shorten month names to 3 characters
        datasets: datasets,
    };

    // Render chart
    const actual = $("#fiscal_trend_actual");

    Chart.defaults.elements.bar.borderWidth = 2;
    Chart.defaults.font.family = "Poppins";

    new Chart(actual, {
        type: "bar",
        data: result,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "right",
                },
                title: {
                    display: true,
                    text: "Chart.js Horizontal Bar Chart",
                },
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                },
            },
        },
    });
}

loadOverallByFiscal("2024_H1");
