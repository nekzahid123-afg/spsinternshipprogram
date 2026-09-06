//Here I have selected the main headings one by one to use in the file
const headingOne = document.querySelector("h1");
const headingTwo = document.querySelector("#about h2");
const headingThree = document.querySelector("#projects h2");
const headingFour = document.querySelector("#contact h2");

headingOne.classList.add("heading-hidden");
headingTwo.classList.add("heading-hidden");
headingThree.classList.add("heading-hidden");
headingFour.classList.add("heading-hidden");

// Show the home Page Heading at the first when the page opens.
setTimeout(function () {
    headingOne.classList.add("heading-visible");
}, 200);

// These functions check whether each heading has reached the screen.
function showAboutHeading() {
    const aboutPosition = headingTwo.getBoundingClientRect().top;

    if (aboutPosition < window.innerHeight - 80) {
        headingTwo.classList.add("heading-visible");
    }
}

function showProjectsHeading() {
    const projectsPosition = headingThree.getBoundingClientRect().top;

    if (projectsPosition < window.innerHeight - 80) {
        headingThree.classList.add("heading-visible");
    }
}

function showContactHeading() {
    const contactPosition = headingFour.getBoundingClientRect().top;

    if (contactPosition < window.innerHeight - 80) {
        headingFour.classList.add("heading-visible");
    }
}

// Run the functions whenever the user scrolls down the page.
window.addEventListener("scroll", function () {
    showAboutHeading();
    showProjectsHeading();
    showContactHeading();
});
