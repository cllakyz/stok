$(function(e) {
	"use strict";
	var ctx = document.getElementById("game-chart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			type: 'line',
			defaultFontFamily: 'Montserrat',
			datasets: [{
				label: "Installs",
				data: [536, 265, 526, 862, 325, 526, 254, 354, 689, 526, 654, 654],
				backgroundColor: '#1eb1fe',
				borderColor: '#1eb1fe',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#1eb1fe',
			}, {
				label: "Impressions",
				data: [2536, 3265, 4526, 5862, 6325, 4526, 3254, 6354, 5689, 8526, 9654, 8654],
				backgroundColor: '#ad59ff',
				borderColor: '#ad59ff',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#ad59ff',
			}, {
				label: "Clicks",
				data: [1423, 1256, 1342, 1862, 1263, 1752, 1962, 1856, 2586, 4526, 3658, 3265, 1289],
				backgroundColor: '#d62649',
				borderColor: '#d62649',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#d62649',
			}, {
				label: "rating",
				data: [526, 865, 965, 987, 856, 963, 1235, 1245, 1652, 1258, 1956, 2542],
				backgroundColor: '#18b16f',
				borderColor: '#18b16f',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#18b16f',
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
						color: 'rgba(0,0,0,0.061)'
					},
					scaleLabel: {
						display: false,
						labelString: 'Month'
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
						labelString: 'Thousands'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	//doughut chart
	var ctx = document.getElementById("doughutChart");
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			datasets: [{
				data: [45, 25, 20, 10],
				backgroundColor: ['#ad59ff', '#00d9bf ', '#fc0', '#00b3ff'],
				hoverBackgroundColor: ['#ad59ff', '#00d9bf ', '#fc0', '#00b3ff'],
				borderColor:'transparent',
			}],
			labels: ["Total players", "Online Players", "Best Players", "New Players"]
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
});