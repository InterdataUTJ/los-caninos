const defaultData = {
  "Red": 300,
  "Blue": 50,
  "Yellow": 100
}

const defaultColors = [
  "rgb(54, 162, 235)",
  "rgba(54, 162, 235, 0)"
]

export default function createLine(canvasId, { data = defaultData, colors = defaultColors, title = "Titulo" } = {}) {
  return new Chart(canvasId, {
    type: "line",
    data: {
      labels: Object.keys(data),
      datasets: [{
        label: title,
        data: Object.values(data),
        tension: 0.4,
        fill: true,
        borderColor: colors[0],
        backgroundColor: (context) => {
          const { ctx } = context.chart;
          var gradient = ctx.createLinearGradient(0, 0, 0, 400);
          gradient.addColorStop(0, colors[0]);
          gradient.addColorStop(0.6, colors[1]);
          return gradient;
        },
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}