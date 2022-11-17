$(document).ready(function () {
  const settings = {
    async: true,
    crossDomain: true,
    url: "https://api.openweathermap.org/data/2.5/weather?lat=39.210602&lon=45.408298&units=metric&&appid=d55a171fda0d8029f6fb35a9614a6625",
    method: "GET",
  };

  $.ajax(settings).done(function (response) {
    console.log(response);
    let img = $("<img>").attr("src",`https://openweathermap.org/img/wn/${response.weather[0].icon}.png`)
    let p = $("<p>").html(`${String(response.main.temp).substr(0,2)}°C`)
    $(".header-top-weather").append(img,p)
    
  });
  let width = window.innerWidth;
  if (width < 992) {
    $(".header-top-search").hide();
    $("#search-form-navbar").addClass("header-bottom-form");
    $("#navbar-control").removeClass("container")
    $("#navbar-control").addClass("container-fluid")
  } else {
    $("#search-form-navbar").removeClass("header-bottom-form");
    $("#navbar-control").addClass("container")
    $("#navbar-control").removeClass("container-fluid")
    $(".header-top-search").show();

  }
  $(window).resize(function () {
    fixMenu();
    let width = window.innerWidth;
    if (width < 992) {
      $("#search-form-navbar").addClass("header-bottom-form");
    $(".header-top-search").hide();

    } else { 
      $("#search-form-navbar").removeClass("header-bottom-form");
    $(".header-top-search").show();

    }
  });

  function fixMenu() {
    let imgHeight = $(".header-top").height();
    if ($(window).scrollTop() > imgHeight) {
      $(".header-bottom").css({ position: "fixed", top: "0" });
    } else {
      $(".header-bottom").css({ position: "sticky", top: "0" });
    }
  }
  fixMenu();
  $(window).scroll(function () {
    fixMenu();
  });




});
