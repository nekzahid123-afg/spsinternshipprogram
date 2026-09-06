//Here I have selected the main headings one by one to use in the file
const headingOne = document.querySelector("h1");
const headingTwo = document.querySelector("#about h2");
const headingThree = document.querySelector("#projects h2");
const headingFour = document.querySelector("#contact h2");

headingOne.classList.add("heading-hidden");
headingTwo.classList.add("heading-hidden");
headingThree.classList.add("heading-hidden");
headingFour.classList.add("heading-hidden");

// Setting the time of animations
setTimeout(function () {
    headingOne.classList.add("heading-visible");
}, 200);

setTimeout(function () {
    headingTwo.classList.add("heading-visible");
}, 400);

setTimeout(function () {
    headingThree.classList.add("heading-visible");
}, 600);

setTimeout(function () {
    headingFour.classList.add("heading-visible");
}, 800);
