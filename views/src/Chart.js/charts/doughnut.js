import dhoughnutLableMiddle from "/src/Chart.js/plugins/dhoughnutLableMiddle.js";

const defaultData = {
  "Red": 300,
  "Blue": 50,
  "Yellow": 100
}

const defaultColors = [
  'rgb(255, 99, 132)',
  'rgb(54, 162, 235)',
  'rgb(255, 205, 86)',
  'rgb(75, 192, 192)',
]

export default function createDoughnut(canvasId, { data = defaultData, colors = defaultColors, title = "Titulo", size = "25px" } = {}) {
  return new Chart(canvasId, {
    type: "doughnut",
    plugins: [dhoughnutLableMiddle],
    data: {
      labels: Object.keys(data),
      datasets: [{
        circumference: 200,
        rotation: 260,
        label: title,
        data: Object.values(data),
        backgroundColor: colors
      }]
    },
    options: {
      responsive: true,
      plugins: {
        dhoughnutLableMiddle: {
          text: title,
          size: size,
        }
      }
    }
  });
}