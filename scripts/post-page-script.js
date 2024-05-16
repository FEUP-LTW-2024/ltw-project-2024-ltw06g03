document.addEventListener("DOMContentLoaded", function () {
  const filterButton = document.querySelector("#sort-bar div button");
  const filtersBar = document.querySelector("#filters");
  const pageBody = document.querySelector("#post-page");
  const postContainer = document.querySelector("#posts-section");

  function toggleFiltersBar() {
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

  getsortnumber();

  filterButton.addEventListener("click", toggleFiltersBar);
  const slider = document.getElementById("slider");
  noUiSlider.create(slider, {
    start: [20, 80],
    tooltips: [true, true],
    connect: [false, true, false],
    range: {
      min: 0,
      max: 100,
    },
  });
  const squares = slider.querySelectorAll(".noUi-tooltip");
  const connect = slider.querySelectorAll(".noUi-connect");
  connect[0].classList.add("conect_color");
  squares[0].classList.add("tooltip_color");
  squares[1].classList.add("tooltip_color");
});

// Function to trigger when sort option or numbers per page changes
function getsortnumber() {
  const numbersPerPage = document.getElementById("numbers-per-page").value;
  const sortOption = document.getElementById("sort-option").value;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "posts_page.php", true); // Make sure to send the request to the correct PHP file
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (this.status == 200) {
      // Parse the response as HTML
      const parser = new DOMParser();
      const newPosts = parser.parseFromString(this.responseText, "text/html");

      // Get the new posts section from the parsed HTML
      const newPostsSection = newPosts.getElementById("posts-section");

      // Get the existing posts section
      const postsSection = document.getElementById("posts-section");

      // Replace the content of the existing posts section with the content of the new one
      postsSection.innerHTML = newPostsSection.innerHTML;
    }
  };
  xhr.send(
    "numbers-per-page=" +
      encodeURIComponent(numbersPerPage) +
      "&sort-option=" +
      encodeURIComponent(sortOption)
  );
}

// Event listeners for changes in sort option and numbers per page
document
  .getElementById("sort-option")
  .addEventListener("change", getsortnumber);
document
  .getElementById("numbers-per-page")
  .addEventListener("change", getsortnumber);
