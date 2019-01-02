$(function(e) {
	'use strict';
	var ctx = document.getElementById("Entertainment-chart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["P1-6", "p1-8", "p2-6", "p2-8", "p3-6", "p3-8", "p4-6", "p4-8", "p5-6", "p5-8", "p6-6", "p6-8"],
			type: 'line',
			datasets: [{
				label: "Expenses",
				data: [20000, 25000, 38000, 42000, 65000, 74000, 36000, 48500, 69000, 75600, 58400, 78000],
				backgroundColor: '#ad59ff',
				borderColor: '#ad59ff',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#ad59ff',
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
						color: 'rgba(0,0,0,0.1)',

					},
					scaleLabel: {
						display: false,
						labelString: '',
						color: 'rgba(0,0,0,0.1)',
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					},
					display: true,
					gridLines: {
						display: false,
						drawBorder: true,
					},
					scaleLabel: {
						display: false,
						labelString: 'Response time In secs',
						color: 'rgba(0,0,0,0.2)',
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		},

	});

	var ctx = document.getElementById("Entertainment-chart2");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["P1-6", "p1-8", "p2-6", "p2-8", "p3-6", "p3-8", "p4-6", "p4-8", "p5-6", "p5-8", "p6-6", "p6-8"],
			type: 'line',
			datasets: [{
				label: "Expenses",
				data: [20000, 25000, 38000, 42000, 65000, 74000, 66000, 58500, 69000, 75600, 58400, 78000],
				backgroundColor: 'transparent',
				borderColor: '#ad59ff',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#ad59ff',
			}, {
				label: "Budget",
				data: [25000, 32000, 26000, 41000, 69000, 76000, 38000, 42500, 63000, 72400, 58620, 96000],
				backgroundColor: 'transparent',
				borderColor: '#00d9bf ',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#00d9bf',
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
						color: 'rgba(0,0,0,0.1)'
					},
					scaleLabel: {
						display: false,
						labelString: ''
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
						display: false,
						labelString: 'Response time In secs'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	var ctx = document.getElementById("Entertainment-chart3");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018"],
			type: 'bar',
			datasets: [{
				label: "Expenses",
				data: [22000, 25000, 38000, 42000, 65000, 74000, 36000, 48500, 69000, 75600, 58400, 78000],
				backgroundColor: '#ad59ff',
				borderColor: '#ad59ff',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#ad59ff',
			}, {
				label: "Budget",
				data: [25000, 32000, 26000, 41000, 69000, 76000, 38000, 42500, 63000, 72400, 58620, 96000],
				backgroundColor: '#00d9bf',
				borderColor: '#00d9bf',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#00d9bf',
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
						color: 'rgba(0,0,0,0.1)'
					},
					scaleLabel: {
						display: false,
						labelString: ''
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					display: true,
					gridLines: {
						display: false,
						drawBorder: true,
						color: 'rgba(0,0,0,0.1)'
					},
					scaleLabel: {
						display: false,
						labelString: 'Response time In secs'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	//pie chart
	var ctx = document.getElementById("entertainment-pieChart");
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			datasets: [{
				data: [45, 35, 30, 15, 10, 10, 8],
				backgroundColor: ['#ad59ff', '#00d9bf ', '#fc0', '#00b3ff', '#18b16f', '#FF9655', '#6AF9C4'],
				hoverBackgroundColor: ['#ad59ff', '#00d9bf ', '#fc0', '#00b3ff', '#18b16f', '#FF9655', '#6AF9C4'],
				borderColor:'transparent',
			}],
			labels: ["Rent and utilities", "Equipment", "Marketing", "Freelancers", "Travel", "Taxes", "others"]
		},
		options: {
			segmentShowStroke: false,
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
					fontFamily: 'Montserrat',
				},
			},
		}
	});
});