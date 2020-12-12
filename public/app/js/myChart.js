function drawMyChart(rawData) {

    //Creating datastructure to sort data
    let dataWeeks = {
         1: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
         2: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
         3: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
         4: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
         5: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
         6: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
         7: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
         8: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
         9: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        10: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        11: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        12: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        13: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        14: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        15: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        16: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        17: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        18: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        19: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        20: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        21: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        22: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        23: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        24: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        25: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        26: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        27: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        28: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        29: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        30: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        31: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        32: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        33: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        34: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        35: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        36: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        37: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        38: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        39: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        40: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        41: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        42: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        43: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        44: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        45: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        46: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        47: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        48: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        49: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        50: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        51: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
        52: { total: 0, symp: 0, asymp: 0, rea: 0, deaths: 0, tests: 0 },
    }

    //Arranging data, calculating totals by week
    $.each(rawData, function(records, record) {
        dataWeeks[record.weekNum].total += record.asympCases + record.sympCases + record.reaCases + record.deathCases
        dataWeeks[record.weekNum].symp += record.sympCases
        dataWeeks[record.weekNum].asymp += record.asympCases
        dataWeeks[record.weekNum].deaths += record.deathCases
        dataWeeks[record.weekNum].rea += record.reaCases
        dataWeeks[record.weekNum].tests += record.tests
    })

    //Declaring variables taking data for chart datasets
    let dataSetTotal = {
        label: 'Total Cases',
        data: [],
        pointRadius: 0,
        borderColor: '#9c9c9c',
        fill: false
    }
    let dataSetTests = {
        label: 'Tests',
        data: [],
        pointRadius: 0,
        borderColor: '#1d31d5',
        fill: false
    }
    let dataSetAsymp = {
        label: 'Asymptomatic Cases',
        data: [],
        pointRadius: 0,
        borderColor: '#3ca210',
        fill: false
    }
    let dataSetSymp = {
        label: 'Symptomatic Cases',
        data: [],
        pointRadius: 0,
        borderColor: '#dfd62d',
        fill: false
    }
    let dataSetRea = {
        label: 'Reanimation Cases',
        data: [],
        pointRadius: 0,
        borderColor: '#ff7f00',
        fill: false
    }
    let dataSetDeaths = {
        label: 'Deaths Cases',
        data: [],
        pointRadius: 0,
        borderColor: '#f91105',
        fill: false
    }

    //Feeding data to variables
    $.each(dataWeeks, function(weeks, record) {
        dataSetTotal.data.push(record.total)
        dataSetTests.data.push(record.tests)
        dataSetAsymp.data.push(record.asymp)
        dataSetSymp.data.push(record.symp)
        dataSetRea.data.push(record.rea)
        dataSetDeaths.data.push(record.deaths)
    })

    //Drawing chart, feeding datasets previously built
    let ctx = $("#myChart")
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(dataWeeks).map(x => "Week ".concat(x)),
            datasets: [dataSetTotal, dataSetTests, dataSetAsymp, dataSetSymp, dataSetRea, dataSetDeaths]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}
