const dhoughnutLableMiddle = {
  id: "dhoughnutLableMiddle",
  defaults: {
      color: 'black',
      text: 'Label',
      size: "25px"
  },

  beforeDatasetsDraw: function (chart, args, options) {
    const { ctx } = chart;
    ctx.save();
    const xCoor = chart.getDatasetMeta(0).data[0].x;
    const yCoor = chart.getDatasetMeta(0).data[0].y;
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.font = `bold ${options.size} sans-serif`;
    ctx.fillStyle = options.color;
    ctx.fillText(options.text, xCoor, yCoor);
  },
}

export default dhoughnutLableMiddle;