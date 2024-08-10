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

export default function createBar(canvasId, { data = defaultData, colors = defaultColors, title = "Titulo" } = {}) {
  return new Chart(canvasId, {
    type: "bar",
    data: {
      labels: Object.keys(data),
      datasets: [{
        label: title,
        data: Object.values(data),
        backgroundColor: colors,
      }]
    },
    options: {
      responsive: true,
    }
  });
}