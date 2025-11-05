const { registerBlockType } = wp.blocks;

registerBlockType("ec/event-countdown", {
  title: "Event Countdown",
  icon: "clock",
  category: "widgets",
  edit: () => {
    return wp.element.createElement("p", {}, "Countdown Event (akan tampil di frontend)");
  },
  save: () => {
    return null; // karena kita render dengan PHP
  },
});
