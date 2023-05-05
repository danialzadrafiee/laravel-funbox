import "./resize";
import axios from "axios";
const animateText = (text, speed, selector, callback) => {
    // Get the element to animate
    let myText = document.querySelector(selector);

    // Initialize the animation
    let i = 0;
    let intervalId = setInterval(() => {
        // Add the next character to the text
        myText.innerHTML += text.charAt(i);
        i++;

        // Check if the animation is done
        if (i === text.length) {
            // Animation is done, clear the interval and call the callback function
            clearInterval(intervalId);
            if (typeof callback === "function") {
                callback();
            }
        }
    }, speed);
};

function playFadeAnimation(object) {
    let isPlaying = false;
    let timeoutId = null;

    object.style.opacity = "0";
    object.style.transition = "opacity 1s";

    function fadeIn() {
        object.style.opacity = "1";
        timeoutId = setTimeout(fadeOut, 1000);
    }

    function fadeOut() {
        object.style.opacity = "0";
        timeoutId = setTimeout(fadeIn, 1000);
    }

    function play() {
        if (!isPlaying) {
            isPlaying = true;
            fadeIn();
        }
    }

    function pause() {
        if (isPlaying) {
            isPlaying = false;
            clearTimeout(timeoutId);
        }
    }

    function reset() {
        pause();
        object.style.opacity = "0";
    }

    return { play, pause, reset };
}

document.querySelectorAll("modal_close").forEach(function (item) {
    item.addEventListener("click", function (e) {
        let dataid = e.target.getAttribute("data-id");
        document
            .querySelectorAll("modal[data-id='" + dataid + "']")
            .forEach(function (modal) {
                modal.classList.add("hidden");
            });
    });
});

let selected_item = "h1";

document.querySelectorAll(".select_item").forEach(function (item) {
    item.addEventListener("click", function () {
        // add active class to the clicked item
        this.classList.add("active");
        selected_item = this.getAttribute("data-id");
        // remove active class from other items
        document
            .querySelectorAll(".select_item.active")
            .forEach(function (activeItem) {
                if (activeItem !== item) {
                    activeItem.classList.remove("active");
                }
            });
        let img = this.querySelector("img").src;
        document.querySelector(".preview_image").src = img;
    });
});

const h1 = document.querySelector('.house[data-id="h1"]');
const { play: playH1, pause: pauseH1, reset: resetH1 } = playFadeAnimation(h1);

let box = document.querySelector(".box");
let dialog = document.querySelector(".dialog-box");
let story = parseInt(document.querySelector(".story").value);
let sd = {
    d1: "Hello, welcome to funny land for your first mission you should build a house , click on the house icon and choose your room",
    d2: "Great, now click on the house again house and chouse your Hall room",
    d3: "Congratulation, now you can click on the house again click on TV",
};

let story_1_setp = 1;

document.querySelector("modal_submit").addEventListener("click", function (e) {
    let route = document.querySelector(".route_auth_update").value;
    if (story == 1) {
        axios
            .post(route, { house_bedroom: selected_item, story: 2 })
            .then(function (response) {
                console.log(response);
                window.location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
    }
    if (story == 2) {
        axios
            .post(route, { house_hall: "hh1", story: 3 })
            .then(function (response) {
                console.log(response);
                window.location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
    }
});

function story_1() {
    h1.style.opacity = "0";
    document.querySelectorAll("nav-link").forEach(function (item) {
        item.style.pointerEvents = "none";
    });
    box.scrollTo(0, 10000);
    dialog.style.display = "block";
    animateText(sd.d1, 0, ".dialog-box", () => {
        playH1();
        story_1_setp = 2;
    });
}

function story_2() {
    h1.style.opacity = "1";
    let elements = document.querySelectorAll("nav-link, .tabs");
    elements.forEach(function (item) {
        if (item.getAttribute("data-tab") == "hall") {
            item.classList.add("active");
        } else {
            item.classList.add("pointer-events-none");
            item.classList.remove("active");
        }
    });

    dialog.style.display = "block";
    animateText(sd.d2, 0, ".dialog-box", () => {
        story_1_setp = 2;
    });
}

function story_3() {
    h1.style.opacity = "1";
    dialog.style.display = "block";
    animateText(sd.d3, 0, ".dialog-box", () => {
        story_1_setp = 2;
    });
}

switch (story) {
    case 1:
        story_1();
        break;
    case 2:
        story_2();
    case 3:
        story_3();
    default:
    // Handle other cases here
}

document
    .querySelector(".modal_video_close")
    .addEventListener("click", function (e) {
        document.querySelector(".modal_video").classList.add("hidden");
    });

document
    .querySelector(".modal_hall_close")
    .addEventListener("click", function (e) {
        document.querySelector(".modal_hall").classList.add("hidden");
    });

document.querySelectorAll(".nav-link").forEach(function (item) {
    item.addEventListener("click", function () {
        let active_tab = this.getAttribute("data-tab");
        // add active class to the clicked item
        this.classList.add("active");
        // remove active class from other items
        document
            .querySelectorAll(".nav-link.active")
            .forEach(function (activeItem) {
                if (activeItem !== item) {
                    activeItem.classList.remove("active");
                }
            });

        // show the selected tab
        document.querySelectorAll(".tabs").forEach(function (tab) {
            if (tab.getAttribute("data-tab") === active_tab) {
                tab.classList.add("active");
            } else {
                tab.classList.remove("active");
            }
        });
    });
});

h1.addEventListener("click", function (e) {
    if (story < 3 && story_1_setp == 2) {
        let dataid = e.target.getAttribute("data-id");
        document
            .querySelectorAll(`modal[data-id='${dataid}']`)
            .forEach(function (modal) {
                modal.classList.remove("hidden");
            });
    }
    if (story == 3 && story_1_setp == 2) {
        let modalVideo = document.querySelector(".modal_hall");
        modalVideo.classList.remove("hidden");
    }
});

document
    .querySelector(".modal_hall_tv")
    .addEventListener("click", function (e) {
        let modalVideo = document.querySelector(".modal_video");
        modalVideo.classList.remove("hidden");
    });

    const button = document.querySelector('.botón');
    const video = document.getElementById('player');
    button.addEventListener('click', () => {
        video.style.display = 'block';
        video.play();
    });

  
console.log(story);
