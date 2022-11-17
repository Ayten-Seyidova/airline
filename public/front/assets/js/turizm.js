$('.owl-carousel2').owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,
    loop: true,
    margin: 60,
    nav: true,
    navText: ["<img src='./assets/img/announcement-left.svg'>", "<img src='./assets/img/announcement-right.svg'>"],
    responsive: {
        0: {
            items: 1
        },
        676: {
            items: 2
        },
        1200: {
            items: 4
        }
    }
})