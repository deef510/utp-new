// Función para abrir/cerrar el menú lateral
$(".menu-btn").click(function() {
  $(".sidebar").toggleClass("active");
});

// Función para desplegar los submenús
$(".menu > ul > li").click(function(e) {
  e.stopPropagation();
  $(this).siblings().removeClass("active");
  $(this).toggleClass("active");
  $(this).find("> ul").slideToggle();
  $(this).siblings().find("> ul").slideUp();
});

// Cerrar el submenú al hacer clic fuera
$(document).click(function(e) {
  if (!$(e.target).closest(".menu").length) {
    $(".menu ul li").removeClass("active");
    $(".menu ul li ul").slideUp();
  }
});
  