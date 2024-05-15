
document.addEventListener("DOMContentLoaded", function () {
  const filterButton = document.querySelector("#sort-bar div button");
  const filtersBar = document.querySelector("#filters");
  const pageBody = document.querySelector("#post-page");
  const postContainer = document.querySelector("#posts-section");
  console.log("filterButton", filterButton);

  function toggleFiltersBar() {
    console.log("toggleFiltersBar");
    if (filtersBar.style.display === "none") {
      filtersBar.style.display = "block";
      pageBody.style.gridTemplateColumns = "0.25fr 1fr";
      postContainer.style.gridTemplateColumns = "1fr 1fr 1fr 1fr";
    } else {
      filtersBar.style.display = "none";
      pageBody.style.gridTemplateColumns = "0fr 1fr";
      postContainer.style.gridTemplateColumns = "1fr 1fr 1fr 1fr 1fr";
    }
  }

  filterButton.addEventListener("click", toggleFiltersBar);
  const slider = document.getElementById('slider');
  noUiSlider.create(slider, {
      start: [20, 80],
      tooltips: [true, true],
      connect: [false, true, false],
      range: {
          'min': 0,
          'max': 100
      }
  });
  const squares = slider.querySelectorAll('.noUi-tooltip');
  const connect = slider.querySelectorAll('.noUi-connect');
  connect[0].classList.add('conect_color');
  squares[0].classList.add('tooltip_color');
  squares[1].classList.add('tooltip_color');
});
