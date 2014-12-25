function answeredChart(ans, notAns) {
	var data = [
		{
				value: ans,
				color: "#285e8e",
				highlight: "#3276b1",
				label: "Respondidas"
		},
		{
				value: notAns,
				color: "#eea236",
				highlight:"#f0ad4e",
				label: "Não respondidas"
		}
	];

		var ctx = document.getElementById("answeredChart").getContext("2d");
		new Chart(ctx).Pie(data, {animateScale: true, animationEasing : "easeInOutCirc"});
		legend(document.getElementById("answeredLegend"), data);
}

function typeChart(obj, subj) {
	var data = [
		{
				value: obj,
				color: "#269abc",
				highlight: "#39b3d7",
				label: "Objetivas"
		},
		{
				value: subj,
				color: "#ccc",
				highlight:"#aaa",
				label: "Subjetivas"
		}
	];

		var ctx = document.getElementById("typeChart").getContext("2d");
		new Chart(ctx).Pie(data, {animateScale: true, animationEasing : "easeInOutCirc"});
		legend(document.getElementById("typeLegend"), data);
}

function accuraceChart(correct, wrong) {
	var data = [
		{
				value: correct,
				color: "#4cae4c",
				highlight: "#5cb85c",
				label: "Corretas"
		},
		{
				value: wrong,
				color: "#d43f3a",
				highlight:"#d9534f",
				label: "Incorretas"
		}
	];

		var ctx = document.getElementById("accuraceChart").getContext("2d");
		new Chart(ctx).Pie(data, {animateScale: true, animationEasing : "easeInOutCirc"});
		legend(document.getElementById("accuraceLegend"), data);
}