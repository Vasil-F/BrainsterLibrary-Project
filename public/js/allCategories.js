var base_url = "http://localhost/Brainster%20Library%20Project%202/";

// All books print

$(document).ready(function () {
  $.ajax({
    url: base_url + `categories/allCategories.php`,
    method: "GET",
    success: function (data) {
      data = $.parseJSON(data);
      // console.log(data);

      // BUTTONS
      data.forEach(cat => { 

          let filter = document.querySelector("#filter"+cat.category+"");
          let label = document.querySelector("#label"+cat.category+"");
          filter.addEventListener("click", function () {
            label.classList.toggle("btn-light");
            label.classList.toggle("text-dark"); });

      });
    }
  });

  // CATEGORIES FILTER

  let showFilters = document.querySelector("#showFilters");
  let filterContainer = document.querySelector("#filterContainer");

  showFilters.addEventListener("click", function () {
    filterContainer.classList.toggle("d-flex");
    if (showFilters.innerHTML === "SHOW FILTERS") {
      showFilters.innerHTML = "HIDE FILTERS";
    } else {
      showFilters.innerHTML = "SHOW FILTERS";
    }
  });

  $("#filterContainer input[type='checkbox']").on("change", function () {
    var selectedCategories = [];
    $("#filterContainer input[type='checkbox']:checked").each(function () {
      selectedCategories.push($(this).val());
    });
    if (selectedCategories.length > 0) {
      $(".cardCard").hide();
      $.each(selectedCategories, function (index, category) {
        $(".cardCard[data-category='" + category + "']").show();
      });
    } else {
      $(".cardCard").show();
    }
  });

  //   SEARCH FILTER

  $("#searchBox").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".cardCard").filter(function () {
      $(this).toggle(
        $(this).find(".card-title").text().toLowerCase().indexOf(value) > -1
      );
    });
  });
});


