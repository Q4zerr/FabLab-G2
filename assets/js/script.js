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

/*Change link*/
const links = document.querySelectorAll(".menu-item");
const linkStats = document.querySelector(".menu-item.stats");
const linkReservation = document.querySelector(".menu-item.reservation");
const statsPart = document.querySelector(".statistics");
const reservationPart = document.querySelector(".reservation-part");

links.forEach((link) => {
  link.addEventListener("click", () => {
    links.forEach((link) => {
      link.classList.remove("active");
      link.classList.add("disabled");
    });
    if (link.classList.contains("disabled")) {
      link.classList.remove("disabled");
      link.classList.add("active");
    }
    if (link.classList.contains("reservation")) {
      statsPart.classList.add("hidden");
      reservationPart.classList.remove("hidden");
    } else {
      statsPart.classList.remove("hidden");
      reservationPart.classList.add("hidden");
    }
  });
});

/*Change color of table*/
const tables = document.querySelectorAll(".table-map button");

tables.forEach((table) => {
  table.addEventListener("click", () => {
    if (table.classList.contains("red")) {
      table.classList.remove("red");
      table.classList.add("green");
    } else {
      table.classList.remove("green");
      table.classList.add("red");
    }
  });
});

/*Change color of room*/
const rooms = document.querySelectorAll(".room-map .available .square");
rooms.forEach((room) => {
  room.addEventListener("click", () => {
    if (room.classList.contains("red")) {
      room.classList.remove("red");
      room.classList.add("green");
    } else {
      room.classList.remove("green");
      room.classList.add("red");
    }
  });
});

/*Switch map reservation*/
const dropDown = document.querySelector(".dropdown-select .dropdown");
const tableMap = document.querySelector(".table-map");
const roomMap = document.querySelector(".room-map");

dropDown.addEventListener("change", () => {
  if (dropDown.value == "table") {
    tableMap.classList.remove("disabled");
    roomMap.classList.add("disabled");
  } else {
    roomMap.classList.remove("disabled");
    tableMap.classList.add("disabled");
  }
});
