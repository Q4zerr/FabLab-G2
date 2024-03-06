/*Hide loader when animation is finished*/
const loader = document.querySelector(".loader");
const loaderMidPart = document.querySelectorAll(".loader .mid-part");

loaderMidPart.forEach((midPart) => {
  midPart.addEventListener("animationend", () => {
    loader.classList.add("disabled");
  });
});

/*Active navigation menu*/
const burgerMenu = document.querySelector(".navigation-mobile .menu");
const menuMobile = document.querySelector(".menu-mobile");

burgerMenu.addEventListener("click", () => {
  burgerMenu.classList.toggle("active");
  menuMobile.classList.toggle("active");
});
