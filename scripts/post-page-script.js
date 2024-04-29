document.addEventListener("DOMContentLoaded", function () {
  const filterButton = document.querySelector("#sort-bar div button");
  const filtersBar = document.querySelector("#filters");
  const pageBody = document.querySelector("#post-page");
  console.log("filterButton", filterButton);

  function toggleFiltersBar() {
    console.log("toggleFiltersBar");
    if (filtersBar.style.display === "none") {
      filtersBar.style.display = "block";
      pageBody.style.gridTemplateColumns = "0.25fr 1fr";
    } else {
      filtersBar.style.display = "none";
      pageBody.style.gridTemplateColumns = "0fr 1fr";
    }
  }

  filterButton.addEventListener("click", toggleFiltersBar);
});
