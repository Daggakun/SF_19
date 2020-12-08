function mapFr(data) {
    //Data goes here, need to generate from DB. Enter twig variable in function call.

    // Knob initialisation (for selecting a year)
    // $(".knob").knob({
    //     release: function(value) {
    //         $(".world").trigger('update', [{
    //             mapOptions: data[value],
    //             animDuration: 300
    //         }]);
    //     }
    // });

    // Mapael initialisation
    $france = $("#map-container");
    $france.mapael({
        map: {
            name: "france_departments",
            defaultArea: {
                attrs: {
                    fill: "#fff",
                    stroke: "#232323",
                    "stroke-width": 0.3
                }
            },
            //width: ""
            defaultPlot: {
                text: {
                    attrs: {
                        fill: "#b4b4b4",
                        "font-weight": "normal"
                    },
                    attrsHover: {
                        fill: "#fff",
                        "font-weight": "bold"
                    }
                }
            },
            zoom: {
                enabled: true,
                step: 0.25,
                maxLevel: 20
            }
        },
        legend: {
            area: {
                display: true,
                title: "Country population",
                marginBottom: 7,
                slices: [{
                        max: 5000000,
                        attrs: {
                            fill: "#6ECBD4"
                        },
                        label: "Less than 5M"
                    },
                    {
                        min: 5000000,
                        max: 10000000,
                        attrs: {
                            fill: "#3EC7D4"
                        },
                        label: "Between 5M and 10M"
                    },
                    {
                        min: 10000000,
                        max: 50000000,
                        attrs: {
                            fill: "#028E9B"
                        },
                        label: "Between 10M and 50M"
                    },
                    {
                        min: 50000000,
                        attrs: {
                            fill: "#01565E"
                        },
                        label: "More than 50M"
                    }
                ]
            },
            plot: {
                display: true,
                title: "City population",
                marginBottom: 6,
                slices: [{
                        type: "circle",
                        max: 500000,
                        attrs: {
                            fill: "#FD4851",
                            "stroke-width": 1
                        },
                        attrsHover: {
                            transform: "s1.5",
                            "stroke-width": 1
                        },
                        label: "Less than 500 000",
                        size: 10
                    },
                    {
                        type: "circle",
                        min: 500000,
                        max: 1000000,
                        attrs: {
                            fill: "#FD4851",
                            "stroke-width": 1
                        },
                        attrsHover: {
                            transform: "s1.5",
                            "stroke-width": 1
                        },
                        label: "Between 500 000 and 1M",
                        size: 20
                    },
                    {
                        type: "circle",
                        min: 1000000,
                        attrs: {
                            fill: "#FD4851",
                            "stroke-width": 1
                        },
                        attrsHover: {
                            transform: "s1.5",
                            "stroke-width": 1
                        },
                        label: "More than 1M",
                        size: 30
                    }
                ]
            }
        },
        plots: $.extend(true, {}, data[2009]['plots'], plots),
        areas: data[2009]['areas']
    })
}
