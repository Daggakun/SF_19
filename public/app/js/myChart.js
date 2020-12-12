function drawMyChart(data) {
    console.log(data)

    let dataStructure = {
         "Semaine 1": {},
         "Semaine 2": {},
         "Semaine 3": {},
         "Semaine 4": {},
         "Semaine 5": {},
         "Semaine 6": {},
         "Semaine 7": {},
         "Semaine 8": {},
         "Semaine 9": {},
        "Semaine 10": {},
        "Semaine 11": {},
        "Semaine 12": {},
        "Semaine 13": {},
        "Semaine 14": {},
        "Semaine 15": {},
        "Semaine 16": {},
        "Semaine 17": {},
        "Semaine 18": {},
        "Semaine 19": {},
        "Semaine 20": {},
        "Semaine 21": {},
        "Semaine 22": {},
        "Semaine 23": {},
        "Semaine 24": {},
        "Semaine 25": {},
        "Semaine 26": {},
        "Semaine 27": {},
        "Semaine 28": {},
        "Semaine 29": {},
        "Semaine 30": {},
        "Semaine 31": {},
        "Semaine 32": {},
        "Semaine 33": {},
        "Semaine 34": {},
        "Semaine 35": {},
        "Semaine 36": {},
        "Semaine 37": {},
        "Semaine 38": {},
        "Semaine 39": {},
        "Semaine 40": {},
        "Semaine 41": {},
        "Semaine 42": {},
        "Semaine 43": {},
        "Semaine 44": {},
        "Semaine 45": {},
        "Semaine 46": {},
        "Semaine 47": {},
        "Semaine 48": {},
        "Semaine 49": {},
        "Semaine 50": {},
        "Semaine 51": {},
        "Semaine 52": {},
    }
    
    let ctx = $("#myChart")
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(dataStructure),
            datasets: [
            {
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }
        ]
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
