const burgerButton = document.querySelector("#test");
const menuMobile = document.querySelector("#menu-mobile");
const iconBurger = document.querySelector("#test");
const rects = iconBurger.querySelectorAll('rect');
const navbar = document.querySelector("#navbar");

burgerButton.addEventListener("click", () => {
    navbar.classList.toggle("mobile-menu-open");
    rects.forEach(rect => {
        rect.style.fill = navbar.classList.contains("mobile-menu-open") ? 'white' : 'black';
    });
});
