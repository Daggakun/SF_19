function mapFr(rawData) {

    //Arranging data {week1->[town1...town422]...week52->[town1...town422]}
    //Also adding total positive cases by summing up all cases in total key for each week
    let data = {
        "1": [],
        "2": [],
        "3": [],
        "4": [],
        "5": [],
        "6": [],
        "7": [],
        "8": [],
        "9": [],
       "10": [],
       "11": [],
       "12": [],
       "13": [],
       "14": [],
       "15": [],
       "16": [],
       "17": [],
       "18": [],
       "19": [],
       "20": [],
       "21": [],
       "22": [],
       "23": [],
       "24": [],
       "25": [],
       "26": [],
       "27": [],
       "28": [],
       "29": [],
       "30": [],
       "31": [],
       "32": [],
       "33": [],
       "34": [],
       "35": [],
       "36": [],
       "37": [],
       "38": [],
       "39": [],
       "40": [],
       "41": [],
       "42": [],
       "43": [],
       "44": [],
       "45": [],
       "46": [],
       "47": [],
       "48": [],
       "49": [],
       "50": [],
       "51": [],
       "52": []
    }
    $.each(rawData, function(town, week) {
        week.total = week.asympCases + week.reaCases + week.sympCases + week.deathCases
        data[week.weekNum].push(week)
    })

    //Final variable to feed to map
    //dataStructure.week.areas: {department: {value, tooltip}}
    //dataStructure.week.plots: {town: value, tooltip}
    let dataStructure = {
        "1": {areas: {}, plots: {}},
        "2": {areas: {}, plots: {}},
        "3": {areas: {}, plots: {}},
        "4": {areas: {}, plots: {}},
        "5": {areas: {}, plots: {}},
        "6": {areas: {}, plots: {}},
        "7": {areas: {}, plots: {}},
        "8": {areas: {}, plots: {}},
        "9": {areas: {}, plots: {}},
       "10": {areas: {}, plots: {}},
       "11": {areas: {}, plots: {}},
       "12": {areas: {}, plots: {}},
       "13": {areas: {}, plots: {}},
       "14": {areas: {}, plots: {}},
       "15": {areas: {}, plots: {}},
       "16": {areas: {}, plots: {}},
       "17": {areas: {}, plots: {}},
       "18": {areas: {}, plots: {}},
       "19": {areas: {}, plots: {}},
       "20": {areas: {}, plots: {}},
       "21": {areas: {}, plots: {}},
       "22": {areas: {}, plots: {}},
       "23": {areas: {}, plots: {}},
       "24": {areas: {}, plots: {}},
       "25": {areas: {}, plots: {}},
       "26": {areas: {}, plots: {}},
       "27": {areas: {}, plots: {}},
       "28": {areas: {}, plots: {}},
       "29": {areas: {}, plots: {}},
       "30": {areas: {}, plots: {}},
       "31": {areas: {}, plots: {}},
       "32": {areas: {}, plots: {}},
       "33": {areas: {}, plots: {}},
       "34": {areas: {}, plots: {}},
       "35": {areas: {}, plots: {}},
       "36": {areas: {}, plots: {}},
       "37": {areas: {}, plots: {}},
       "38": {areas: {}, plots: {}},
       "39": {areas: {}, plots: {}},
       "40": {areas: {}, plots: {}},
       "41": {areas: {}, plots: {}},
       "42": {areas: {}, plots: {}},
       "43": {areas: {}, plots: {}},
       "44": {areas: {}, plots: {}},
       "45": {areas: {}, plots: {}},
       "46": {areas: {}, plots: {}},
       "47": {areas: {}, plots: {}},
       "48": {areas: {}, plots: {}},
       "49": {areas: {}, plots: {}},
       "50": {areas: {}, plots: {}},
       "51": {areas: {}, plots: {}},
       "52": {areas: {}, plots: {}}
    }

    //Feeding data to dataStruture
    //dataStructure.week.areas: {value, tooltip}
    //dataStructure.week.plots: {town: value, tooltip}
    $.each(data, function (week, towns) {
        $.each(towns, function(towns, town) {
            //Creating key (department-zip) so mapael can read it
            let key = 'department-'.concat(town.town.department.id)
            //Creating hrefs
            let deptHref = "/department/".concat(town.town.department.id)
            let townHref = "/town/".concat(town.town.id)

            //Corsica zipcode exception for mapael
            if (key === 'department-20') {
                if (town.town.name === 'Ajaccio') {
                    key = 'department-2B'
                } else {
                    key = 'department-2A'
                }
            }

            //Searching the key in the week.areas keys ; initializing it if doesn't exist
            if (key in dataStructure[week].areas === false) {
                dataStructure[week].areas[key] = {
                    value: 0,
                    href: deptHref
                }
            }

            //Updating dept total by adding up town total to value total
            dataStructure[week]["areas"][key]["value"] += town.total
            dataStructure[week]["areas"][key].tooltip = {
                content: "<b>" + town.town.department.name + "</b><br>Cases : " + dataStructure[week]["areas"][key]["value"]
            }
            //Creating plots entry for this week
            dataStructure[week]["plots"][town.town.name] = {
                value: town.total,
                href: townHref,
                tooltip: {
                    content: "<b>" + town.town.name + "</b><br>Cases : " + town.total
                }
            }
        })
    })


    //default plots variable
    let plots = {}

    //Feeding data to default town plots
    //plots.town = {lat, lng, text: {content: name}}
    $.each(rawData, function (town, weeks) {
        if (weeks.town.name in plots === false) {
            plots[weeks.town.name] = {
                latitude: parseFloat(weeks.town.lat),
                longitude: parseFloat(weeks.town.lng),
            }
        }
    })

    // Mapael container init
    let france = $("#map-container")

    //Slider init
    let slider = $("#weekNumSlider")
    let label = $("#weekNumLabel")
    label.text(slider.val())

    //On slider input, update label value and trigger map update
    slider.on('input', function() {
        label.text(slider.val())
        france.trigger('update', [{
            mapOptions: dataStructure[slider.val()],
            animDuration: 300
        }])
    })

    //Map object for mapael
    let map = {
        map: {
            name: "france_departments",
            tooltip: {
                cssClass: "mapTooltip",
            },
            defaultArea: {
                attrs: {
                    fill: "#555555",
                    stroke: "#fff",
                    "stroke-width": 0.3
                },
                attrsHover: {
                    fill: "#fff",
                    "font-weight": "bold",
                },
                tooltip: {
                    cssClass: "mapTooltip",
                }
            },
            defaultPlot: {
                attrs: {
                    fill: "#b4b4b4",
                    "font-weight": "normal"
                },
                attrsHover: {
                    fill: "#fff",
                    "font-weight": "bold"
                },
                tooltip: {
                    cssClass: "mapTooltip",
                }
            },
            //width: ""
            zoom: {
                enabled: false,
                step: 0.25,
                maxLevel: 20
            }
        },
        legend: {
            area: {
                cssClass: "areaLegend",
                display: true,
                title: "Department Cases",
                marginBottom: 7,
                slices: [{
                        max: 50,
                        attrs: {
                            fill: "#cdff88"
                        },
                        label: "Less than 50"
                    },
                    {
                        min: 50,
                        max: 100,
                        attrs: {
                            fill: "#ffd961"
                        },
                        label: "Between 50 and 100"
                    },
                    {
                        min: 100,
                        max: 400,
                        attrs: {
                            fill: "#ff6f11"
                        },
                        label: "Between 100 and 500"
                    },
                    {
                        min: 400,
                        attrs: {
                            fill: "#d00808"
                        },
                        label: "More than 500"
                    }
                ]
            },
            plot: {
                cssClass: "plotLegend",
                display: true,
                title: "City cases",
                marginBottom: 6,
                hideElemsOnClick: {
                    enabled: true,
                    opacity: 0
                },
                slices: [{
                    type: "circle",
                    max: 49,
                    attrs: {
                        fill: "#cfcfcf",
                        "stroke-width": 0.5
                    },
                    attrsHover: {
                        transform: "s1.5",
                        "stroke-width": 1
                    },
                    label: "Less than 50",
                    size: 10
                },
                {
                    type: "circle",
                    min: 50,
                    max: 120,
                    attrs: {
                        fill: "#ff6f11",
                        "stroke-width": 1
                    },
                    attrsHover: {
                        transform: "s1.5",
                        "stroke-width": 1
                    },
                    label: "Between 50 and 120",
                    size: 20
                },
                {
                    type: "circle",
                    min: 120,
                    attrs: {
                        fill: "#d00808",
                        "stroke-width": 1
                    },
                    attrsHover: {
                        transform: "s1.5",
                        "stroke-width": 1
                    },
                    label: "More than 120",
                    size: 30
                }]
            }
        },
        plots: $.extend(true, {}, dataStructure["1"]["plots"], plots),
        areas: dataStructure["1"]["areas"]
    }



    //Drawing map
    france.mapael(map)

    //Tooltip event observer
    //The default tooltip is hidden by {display : none} so we can get its data on DOM CHANGES event and putting it in our div
    let defTooltip = document.getElementsByClassName("mapTooltip")

    const config = { attributes: true, childList: true, subtree: true };

    let observer = new MutationObserver(() => $("#myTooltipContainer").html(defTooltip[0].innerHTML))
    observer.observe(defTooltip[0], config)

}
