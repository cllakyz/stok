$(function(e) {
	'use strict';
	var ctx = document.getElementById("finance-chart");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Jan", "feb", "Mar", "Apr", "May", "Jun", "Jul"],
			type: 'line',
			defaultFontFamily: 'Montserrat',
			datasets: [{
				label: "Net",
				data: [0, 70, 75, 120, 94, 141, 162],
				backgroundColor: 'transparent',
				borderColor: '#ad59ff',
				borderWidth: 4,
				pointStyle: 'circle',
				pointRadius: 10,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#ad59ff',
			}, {
				label: "Cash in",
				data: [0, 50, 40, 80, 40, 79, 120],
				backgroundColor: 'transparent',
				borderColor: '#00d9bf',
				borderWidth: 4,
				pointStyle: 'circle',
				pointRadius: 10,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#00d9bf',
			}, {
				label: "Cash out",
				data: [0, 20, 35, 40, 54, 62, 42],
				backgroundColor: 'transparent',
				borderColor: '#fc0',
				borderWidth: 4,
				pointStyle: 'circle',
				pointRadius: 10,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#fc0',
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: 'rgba(0,0,0,0.5)',
				bodyFontColor: 'rgba(0,0,0,0.5)',
				backgroundColor: '#fff',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
					fontFamily: 'Montserrat',
				},
			},
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					},
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					},
					scaleLabel: {
						display: true,
						labelString: 'Month',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					},
					display: true,
					gridLines: {
						display: false,
						drawBorder: true
					},
					scaleLabel: {
						display: true,
						labelString: 'Thousands',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	//line chart
	var ctx = document.getElementById("finance-chart1");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018'],
			datasets: [{
				label: "returns",
				borderColor: "#ad59ff",
				borderWidth: "4",
				backgroundColor: "transparent",
				data: [12, 24, 35, 42, 53, 56, 74]
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
					display: false,
					gridLines: {
						display: false,
					}
				}]
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			legend: {
				display: false,
			},
			tooltips: {},
			hover: {
				mode: 'nearest',
				titleFontSize: 12,
				titleFontColor: 'rgba(0,0,0,0.5)',
				bodyFontColor: 'rgba(0,0,0,0.5)',
				backgroundColor: '#fff',
				intersect: true
			}
		}
	});
	//bar chart
	var ctx = document.getElementById("finance-chart2");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018'],
			datasets: [{
				label: "Working Capital",
				borderColor: "#00b3ff",
				borderWidth: "0",
				backgroundColor: "#00b3ff",
				data: [42, 52, 62, 35, 45, 46, 68]
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
					display: false,
					gridLines: {
						display: false,
					}
				}]
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			legend: {
				display: false,
			},
			tooltips: {
				titleFontSize: 12,
				titleFontColor: 'rgba(0,0,0,0.5)',
				bodyFontColor: 'rgba(0,0,0,0.5)',
				backgroundColor: '#fff',				
			},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
	//line chart
	var ctx = document.getElementById("finance-chart3");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018'],
			datasets: [{
				label: "Returns on Equity",
				borderColor: "#00d9bf",
				borderWidth: "0",
				backgroundColor: "#00d9bf",
				data: [24, 25, 45, 48, 63, 48, 52]
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
					display: false,
					gridLines: {
						display: false,
					}
				}]
			},
			legend: {
				display: false,
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			tooltips: {
				titleFontSize: 12,
				titleFontColor: 'rgba(0,0,0,0.5)',
				bodyFontColor: 'rgba(0,0,0,0.5)',
				backgroundColor: '#fff',
			},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
	//line chart
	var ctx = document.getElementById("finance-chart4");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2018'],
			datasets: [{
				label: "Debit Equity",
				borderColor: "#fc0",
				borderWidth: "4",
				backgroundColor: "transparent",
				data: [25, 26, 35, 24, 48, 36, 35]
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
					display: false,
					gridLines: {
						display: false,
					}
				}]
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			legend: {
				display: false,
			},
			tooltips: {
				titleFontSize: 12,
				titleFontColor: 'rgba(0,0,0,0.5)',
				bodyFontColor: 'rgba(0,0,0,0.5)',
				backgroundColor: '#fff',
			},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
});