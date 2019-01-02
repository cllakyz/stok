$(function(e) {
	"use strict";
	//line chart
	var ctx = document.getElementById("lineChart");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018'],
			datasets: [{
				label: "Males",
				borderColor: "#ad59ff",
				borderWidth: "4",
				backgroundColor: "rgba(110,59,253,0.5)",
				data: [32, 54, 47, 43, 46, 75, 72]
			}, {
				label: "females",
				borderColor: "#1eb1fe",
				borderWidth: "4",
				backgroundColor: "rgba(	30,177,254,0.5)",
				pointHighlightStroke: "rgba(255, 255, 255, 0.1)",
				data: [36, 42, 68, 46, 70, 70, 64]
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						display: false,
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			tooltips: {},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
	var ctx = document.getElementById("lineChart1");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["<25", "26-30", "31-35", "36-40", "41-50", "51-55", "55-60"],
			datasets: [{
				label: "Hours",
				borderColor: "transparent",
				borderWidth: "4",
				backgroundColor: "#ad59ff",
				data: [4, 3.5, 3.0, 2.5, 2.0, 1.4, 1.0, 0.50]
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						display: false,
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			tooltips: {},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
	//line chart
	var ctx = document.getElementById("lineChart2");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018'],
			datasets: [{
				label: "Hours",
				borderColor: "#ad59ff",
				borderWidth: "4",
				backgroundColor: "transparent",
				data: [79, 81, 83, 75, 86, 75, 85]
			}, ]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						display: false,
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			tooltips: {},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
	var ctx = document.getElementById("lineChart3");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['HR', 'Sales', 'Marketing', 'IT', 'Customers'],
			datasets: [{
				label: "OLE",
				borderColor: "#00d9bf",
				borderWidth: "4",
				backgroundColor: "rgba(	0,217,191,0.8)",
				pointHighlightStroke: "rgba(255, 255, 255, 0.1)",
				data: [72, 54, 65, 85, 52]
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						display: false,
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			tooltips: {},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
	var ctx = document.getElementById("lineChart4");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['jan', 'feb', 'Mar', 'Apr', 'May', 'Jun'],
			datasets: [{
				label: "Net Costs",
				borderColor: "#00d9bf",
				borderWidth: "4",
				backgroundColor: "rgba(0, 217, 191,0.5)",
				data: [15, 18, 16, 18, 16, 15],
				fontColor: 'rgba(0,0,0,0.61)'
			}, {
				label: "Returns",
				borderColor: "#ad59ff",
				borderWidth: "4",
				backgroundColor: "rgba(	173, 89, 255,0.5)",
				pointHighlightStroke: "rgba(173, 89, 255,0.5)",
				data: [21, 25, 18, 27, 25, 23],
				fontColor: 'rgba(0,0,0,0.61)'
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						display: false,
					},
					scaleLabel: {
						display: true,
						labelString: 'Thousands',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			tooltips: {},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
	var ctx = document.getElementById("lineChart5");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['jan', 'feb', 'Mar', 'Apr', 'May', 'Jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
			datasets: [{
				label: "Net Costs",
				borderColor: "#00d9bf",
				borderWidth: "4",
				backgroundColor: "rgba(0, 217, 191,0.5)",
				data: [15, 18, 14, 18, 16, 15, 14.5, 24.5, 17.5, 16.8, 14.5, 18.3]
			}, {
				label: "Returns",
				borderColor: "#ad59ff",
				borderWidth: "4",
				backgroundColor: "rgba(	173, 89, 255,0.5)",
				pointHighlightStroke: "rgba(173, 89, 255,0.5)",
				data: [21, 25, 18, 27, 25, 23, 30, 25.6, 31.5, 24, 27, 24.5]
			}]
		},
		options: {
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						display: false,
					},
					scaleLabel: {
						display: true,
						labelString: 'Thousands',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			tooltips: {},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
});
/*--echart5---*/
var myChart5 = echarts.init(document.getElementById('echart5'));
var dataAxis = ['<10k', '11k-20k', '21k-30k', '31k-40k', '41k-50k', '50k<'];
var data = [10, 15, 22, 33, 25, 18];
var yMax = 40;
var dataShadow = [];
for (var i = 0; i < data.length; i++) {
	dataShadow.push(yMax);
}
option5 = {
	title: {
		text: '',
		subtext: ''
	},
	tooltip: {},
	xAxis: {
		data: dataAxis,
		axisLabel: {
			outside: true,
			textStyle: {
				color: '#fff'
			}
		},

		axisTick: {
			show: false
		},
		axisLine: {
			show: false,
			 lineStyle: {
          color: 'rgb(0, 0, 0,0.1)'
        }
		},
		z: 10
	},
	yAxis: {
		splitLine: {
			show: true,
			lineStyle: {
			  color: 'rgb(0,0,0,0.1)'
			}
		},
		axisLine: {
			show: false,
			 lineStyle: {
			  color: 'rgb(0, 0, 0,0.1)'
			}
		},
		axisTick: {
			show: false
		},
		axisLabel: {
			textStyle: {
				color: '#999'
			}
		}
	},
	grid: {
		x: 40,
		y: 20,
		x2: 40,
	},
	dataZoom: [{
		type: 'inside'
	}],
	series: [{ // For shadow
		type: 'bar',
		itemStyle: {
			normal: {
				color: 'transparent'
			}
		},
		barGap: '-100%',
		barCategoryGap: '20%',
		data: dataShadow,
		animation: false
	}, {
		type: 'bar',
		itemStyle: {
			normal: {
				barBorderRadius: [50, 50, 0, 0],
				color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
					offset: 0,
					color: '#ad59ff'
				}, {
					offset: 0.5,
					color: '#9731fb'
				}, {
					offset: 1,
					color: '#9731fb'
				}])
			},
			emphasis: {
				color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
					offset: 0,
					color: '#9731fb'
				}, {
					offset: 0.7,
					color: '#9731fb'
				}, {
					offset: 1,
					color: '#ad59ff'
				}])
			}
		},
		data: data
	}]
};
// Enable data zoom when user click bar.
var zoomSize = 6;
myChart5.on('click', function(params) {
	console.log(dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)]);
	myChart.dispatchAction({
		type: 'dataZoom',
		startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
		endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
	});
});
myChart5.setOption(option5);
/*--echart5---*/
/*--echart10---*/
var myChart10 = echarts.init(document.getElementById('echart10'));
option10 = {
	tooltip: {
		formatter: "{a} <br/>{b} : {c}%"
	},
	series: [{
		name: '',
		type: 'gauge',
		splitNumber: 10,
		splitLine: {
			show: true,
			lineStyle: {
			  color: 'rgb(0,0,0,0.1)'
			}
		},
		axisLine: {
			lineStyle: {
				color: [
					[0.2, '#ad59ff'],
					[0.8, '#00d9bf'],
					[1, '#fc0']
				],
				width: 20
			}
		},
		axisTick: {
			splitNumber: 10,
			length: 12,
			lineStyle: {
				color: 'auto'
			}
		},
		detail: {
			formatter: '{value}%',
			fontSize:'14'
		},
		data: [{
			value: 50,
			name: ''
		}],
	}],
};
setInterval(function() {
	option10.series[0].data[0].value = (Math.random() * 100).toFixed(2) - 0;
	myChart10.setOption(option10, true);
}, 2000);
myChart10.setOption(option10);
/*--echart10---*/