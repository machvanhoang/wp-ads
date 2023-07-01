$(".accordion-header button").on("click", function (e) {
  e.preventDefault();
  $(this).toggleClass("active");
  const collapse = $(this).data("id");
  $(`#${collapse}`).slideToggle();
});
