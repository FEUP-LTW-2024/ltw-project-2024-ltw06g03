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

  filterButton.addEventListener("click", toggleFiltersBar);

  const slider = document.getElementById("slider");
  noUiSlider.create(slider, {
    start: [0, 20000],
    tooltips: [wNumb({ decimals: 0 }), wNumb({ decimals: 0 })],
    connect: [false, true, false],
    range: {
      min: 0,
      max: 20000,
    },
  });

  const squares = slider.querySelectorAll(".noUi-tooltip");
  const connect = slider.querySelectorAll(".noUi-connect");
  connect[0].classList.add("conect_color");
  squares[0].classList.add("tooltip_color");
  squares[1].classList.add("tooltip_color");

  function applyFilters() {
    const numbersPerPage = document.getElementById("numbers-per-page").value;
    const sortOption = document.getElementById("sort-option").value;
    const category = document.getElementById("category").value;
    const condition = document.getElementById("condition").value;
    const brandModel = document.getElementById("brand-model").value;
    const priceRange = slider.noUiSlider.get();
    const priceMin = priceRange[0];
    const priceMax = priceRange[1];

    const xhr = new XMLHttpRequest();
    xhr.open("POST", window.location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (this.status == 200) {
        const parser = new DOMParser();
        const newPosts = parser.parseFromString(this.responseText, "text/html");
        const newPostsSection = newPosts.getElementById("posts-section");
        const postsSection = document.getElementById("posts-section");
        postsSection.innerHTML = newPostsSection.innerHTML;

        const newlink_tree = newPosts.getElementById("link-tree");
        const link_tree = document.getElementById("link-tree");
        link_tree.innerHTML = newlink_tree.innerHTML;
        attachAddToCartEventListeners();
        attachWishlistEventListeners();
      }
    };

    xhr.send(
      "numbers-per-page=" +
        encodeURIComponent(numbersPerPage) +
        "&sort-option=" +
        encodeURIComponent(sortOption) +
        "&category=" +
        encodeURIComponent(category) +
        "&condition=" +
        encodeURIComponent(condition) +
        "&brand-model=" +
        encodeURIComponent(brandModel) +
        "&price-min=" +
        encodeURIComponent(priceMin) +
        "&price-max=" +
        encodeURIComponent(priceMax)
    );
  }

  document
    .getElementById("sort-option")
    .addEventListener("change", applyFilters);
  document
    .getElementById("numbers-per-page")
    .addEventListener("change", applyFilters);
  document.getElementById("category").addEventListener("change", applyFilters);
  document.getElementById("condition").addEventListener("change", applyFilters);
  document
    .getElementById("brand-model")
    .addEventListener("change", applyFilters);
  slider.noUiSlider.on("change", applyFilters);

  // Function to update the category select element based on the URL parameter
  function updateCategory() {
    const urlParams = new URLSearchParams(window.location.search);
    const categoryId = urlParams.get("category");

    if (categoryId) {
      const categorySelect = document.getElementById("category");
      if (categorySelect) {
        for (let i = 0; i < categorySelect.options.length; i++) {
          if (categorySelect.options[i].value == categoryId) {
            categorySelect.selectedIndex = i;
            break;
          }
        }
      }
    }
  }
  function attachAddToCartEventListeners() {
    document.querySelectorAll(".add-to-cart").forEach(function (element) {
      console.log(element);
      element.addEventListener("click", function () {
        console.log("Button clicked");
        const itemId = this.getAttribute("item-id");

        const item = {
          id: itemId,
        };

        fetch("actions/add_to_cart.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(item),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              alert("Item added to cart!");
            } else {
              alert("Failed to add item to cart.");
            }
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      });
    });
  }

  function attachWishlistEventListeners() {
    document.querySelectorAll("#add-to-wish").forEach(function (element) {
      console.log(element);
      element.addEventListener("click", function () {
        console.log("Button clicked");
        const itemId = this.getAttribute("item-id");

        const item = {
          id: itemId,
        };

        fetch("actions/add_to_wishlist.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(item),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              alert("Item added to wishlist!");
            } else {
              alert("Failed to add item to wishlist.");
            }
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      });
    });
  }
  // Call the function to update the category select element
  updateCategory();
  applyFilters();
  ;
});
