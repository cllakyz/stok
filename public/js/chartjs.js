$(function() {
	'use strict';
	var ctx = document.getElementById("Chart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Sun", "Mon", "Tus", "Wed", "Thu", "Fri", "Sat"],
			datasets: [{
				label: 'Profits',
				data: [20, 420, 210, 354, 580, 320, 480],
				borderWidth: 2,
				backgroundColor: 'transparent',
				borderColor: '#ad59ff',
				borderWidth: 4,
				pointBackgroundColor: '#ffffff',
				pointRadius: 8
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,

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
						color: 'rgba(0,0,0,0.061)'
					},
					scaleLabel: {
						display: false,
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
		}
	});
	var ctx = document.getElementById("Chart2").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: 'Sales',
				data: [200, 450, 290, 367, 256, 543, 345],
				borderWidth: 2,
				backgroundColor: '#ad59ff',
				borderColor: '#ad59ff',
				borderWidth: 2.0,
				pointBackgroundColor: '#ffffff',
				pointRadius: 4
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: true
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						stepSize: 150,
						fontColor: "rgba(0,0,0,0.5)",
					},
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				xAxes: [{
					ticks: {
						display: true,
						fontColor: "rgba(0,0,0,0.5)",
					},
					gridLines: {
						display: false,
						color: 'rgba(0,0,0,0.061)'
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
		}
	});
	//Team chart
	var ctx = document.getElementById("team-chart");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
			type: 'line',
			defaultFontFamily: 'Montserrat',
			datasets: [{
				data: [0, 7, 3, 5, 2, 10, 7],
				label: "Expense",
				backgroundColor: 'rgba(173, 89, 255, 0.7)',
				borderColor: 'rgba(173, 89, 255)',
				borderWidth: 3.5,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'rgba(173, 89, 255)',
			}, ]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			legend: {
				display: false,
				position: 'top',
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
						display: false,
						drawBorder: false,
						color: 'rgba(0,0,0,0.061)'
					},
					scaleLabel: {
						display: false,
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
						drawBorder: false,
						color: 'rgba(0,0,0,0.061)'
					},
					scaleLabel: {
						display: true,
						labelString: 'Value',
						fontColor: 'rgba(0,0,0,0.61)'
					}
				}]
			},
			title: {
				display: false,
			}
		}
	});
	//Sales chart
	var ctx = document.getElementById("sales-chart");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
			type: 'line',
			defaultFontFamily: 'Montserrat',
			datasets: [{
				label: "Foods",
				data: [0, 30, 10, 120, 50, 63, 10],
				backgroundColor: 'transparent',
				borderColor: '#ad59ff',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#ad59ff',
			}, {
				label: "Electronics",
				data: [0, 50, 40, 80, 40, 79, 120],
				backgroundColor: 'transparent',
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
				titleFontColor: '#000',
				bodyFontColor: '#000',
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
						display: false,
						drawBorder: false
					},
					scaleLabel: {
						display: false,
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
						drawBorder: false
					},
					scaleLabel: {
						display: true,
						labelString: 'Value',
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
	var ctx = document.getElementById("lineChart");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: "data1",
				borderColor: "rgba(173, 89, 255, 0.9)",
				borderWidth: "1",
				backgroundColor: "rgba(173, 89, 255, 0.5)",
				data: [22, 44, 67, 43, 76, 45, 12]
			}, {
				label: "data2",
				borderColor: "rgba(0, 217, 191 ,0.9)",
				borderWidth: "1",
				backgroundColor: "rgba(	0, 217, 191, 0.7)",
				pointHighlightStroke: "rgba(0, 217, 191 ,1)",
				data: [16, 32, 18, 26, 42, 33, 44]
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false
			},
			hover: {
				mode: 'nearest',
				intersect: true
			},
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: "rgba(0,0,0,0.5)",
					},
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					},
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
		}
	});
	//bar chart
	var ctx = document.getElementById("barChart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: "data1",
				data: [65, 59, 80, 81, 56, 55, 40],
				borderColor: "#ad59ff",
				borderWidth: "0",
				backgroundColor: "#ad59ff"
			}, {
				label: "data2",
				data: [28, 48, 40, 19, 86, 27, 90],
				borderColor: "#00d9bf",
				borderWidth: "0",
				backgroundColor: "#00d9bf"
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "rgba(0,0,0,0.5)",
					 },
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					ticks: {
						beginAtZero: true,
						fontColor: "rgba(0,0,0,0.5)",
					},
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					},
				}]
			},
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
		}
	});
	//radar chart
	var ctx = document.getElementById("radarChart");

	var myChart = new Chart(ctx, {
		type: 'radar',
		data: {
			labels: [

				["Eating", "Dinner"],
				["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running",

			],

			datasets: [{

				label: "data1",
				data: [65, 59, 66, 45, 56, 55, 40],
				borderColor: "rgba(173, 89, 255, 0.9)",
				borderWidth: "1",
				backgroundColor: "rgba(173, 89, 255, 0.5)"
			}, {
				label: "data2",
				data: [28, 12, 40, 19, 63, 27, 87],
				borderColor: "rgba(	0, 217, 191,0.8)",
				borderWidth: "1",
				backgroundColor: "rgba(	0, 217, 191,0.4)"
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display:false
			},
			scale: {
				angleLines: { color: 'rgba(0,0,0,0.5)' },
				gridLines: {
					color: 'rgba(0,0,0,0.061)'
				},
				ticks: {
					beginAtZero: true,
				},
				pointLabels: {
					fontColor:'rgba(0,0,0,0.5)',
				},
			},

		}
	});
	//pie chart
	var ctx = document.getElementById("pieChart");
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			datasets: [{
				data: [45, 25, 20, 10],
				backgroundColor: ['#ad59ff', ' #00b3ff', '#00d9bf', '#fc0'],
				hoverBackgroundColor: ['#ad59ff', ' #00b3ff', '#00d9bf', '#fc0'],
				borderColor:'transparent',
			}],
			labels: ["blue", "blue", "blue"]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
		}
	});
	//doughut chart
	var ctx = document.getElementById("doughutChart");
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			datasets: [{
				data: [45, 25, 20, 10],
				backgroundColor: ['#ad59ff', ' #00b3ff', '#00d9bf', '#fc0'],
				hoverBackgroundColor: ['#ad59ff', ' #00b3ff', '#00d9bf', '#fc0'],
				borderColor:'transparent',
			}],
			labels: ["blue", "blue", "blue", "blue"]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
		}
	});
	//polar chart
	var ctx = document.getElementById("polarChart");
	var myChart = new Chart(ctx, {
		type: 'polarArea',
		data: {
			datasets: [{
				data: [18, 15, 9, 6, 19],
				backgroundColor: ['#ad59ff', ' #00b3ff', '#00d9bf', '#fc0'],
				hoverBackgroundColor: ['#ad59ff', ' #00b3ff', '#00d9bf', '#fc0'],
				borderColor:'transparent',
			}],
			labels: ["blue", "blue", "blue", "blue"]
		},
		options: {
			scale: {
				gridLines: {
						color: 'rgba(0,0,0,0.061)'
				}
			},
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				labels: {
					fontColor: "rgba(0,0,0,0.5)"
				},
			},
		}
	});
});