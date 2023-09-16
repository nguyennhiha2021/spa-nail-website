"use strict";

// Enhancements for payment.html
function initPaymentPage() {
    var timerMinutes = 15; // Set the timer duration in seconds
    var timerSeconds = timerMinutes * 60; 

    var timerDisplay = document.getElementById("timer-display");
    var timerInterval;

    function startTimer() {
        var minutes, seconds;

        timerInterval = setInterval(function () {
            minutes = Math.floor(timerSeconds / 60);
            seconds = timerSeconds % 60;

        // Display the timer in "mm:ss" format
        timerDisplay.textContent = (minutes < 10 ? '0' : '') + minutes + ":" + (seconds < 10 ? '0' : '') + seconds;

        if (timerSeconds <= 0) {
            clearInterval(timerInterval);
            alert("Time is up! Redirecting to the home page.");
            window.location.href = "index.html";
        }

        timerSeconds--;

    }, 1000);

    }

startTimer();

}

function preLoadNameOnCard() {
    if (typeof Storage !== "undefined") {
        var fname = localStorage.getItem("firstname");
        var lname = localStorage.getItem("lastname");

        if (fname && lname) {
            var cardName = document.getElementById("card-name");
            cardName.value = fname + " " + lname;
        }
    } else {
        alert("Web Storage is not supported by this browser.");
    }
}


// Initialize enhancements based on the current page
window.addEventListener('load', initPaymentPage());
window.addEventListener('load', preLoadNameOnCard());
