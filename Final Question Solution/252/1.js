// ----------------------------------------------------
// Global Variables
// ----------------------------------------------------

// Stores the total calories consumed during the day.
// Initially the value is 0.
let totalCalories = 0;


// Counts how many times the user has entered calories.
// Initially 0.
let entries = 0;


// Daily calorie goal.
// const means its value cannot be changed.
const dailyGoal = 2000;



// ----------------------------------------------------
// Function to Add Calories
// ----------------------------------------------------

function addCalories() {

    // Get the value entered by the user.

    // document.getElementById("calories")
    // finds the input box.

    // .value gets the user's input.

    // parseInt() converts the text into an integer.

    let input = parseInt(document.getElementById("calories").value);



    // ------------------------------------------------
    // Input Validation
    // ------------------------------------------------

    // isNaN()
    // checks whether the value is NOT a number.

    // input <= 0
    // prevents negative numbers and zero.

    if (isNaN(input) || input <= 0) {

        // Show an alert box.

        alert("Please enter a valid calorie value.");

        // Stop the function immediately.

        return;
    }



    // ------------------------------------------------
    // Update Total Calories
    // ------------------------------------------------

    // Add the entered calories
    // to the previous total.

    totalCalories += input;

    // Increase entry count by 1.
    entries++;



    // Variable to store the feedback message.
    let message = "";



    // ------------------------------------------------
    // Decide Feedback
    // ------------------------------------------------

    // Total calories between 0 and 800

    if (totalCalories <= 800) {

        message = "You're off to a healthy start!";
    }

    // Between 801 and 1600

    else if (totalCalories <= 1600) {

        message = "Good progress, keep it balanced!";
    }

    // Between 1601 and 1999

    else if (totalCalories <= 1999) {

        message = "Almost at your limit!";
    }

    // 2000 or more

    else {

        message = "Goal reached! Stay mindful!";
    }



    // ------------------------------------------------
    // Extra Warning
    // ------------------------------------------------

    // If the user entered calories
    // more than 10 times

    // BUT

    // still hasn't reached 2000 calories

    // display an additional warning.

    if (entries > 10 && totalCalories < dailyGoal) {

        message +=
        "<br>Be cautious of frequent snacking!";
    }



    // ------------------------------------------------
    // Display Result
    // ------------------------------------------------

    // innerHTML allows HTML tags
    // like <br> to create line breaks.

    document.getElementById("result").innerHTML =

        "Total Calories: " + totalCalories +

        "<br>Daily Goal: " + dailyGoal +

        "<br>Total Entries: " + entries +

        "<br>Feedback: " + message;
}