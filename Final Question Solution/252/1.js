
let totalCalories = 0;
let entries = 0;
const dailyGoal = 2000;

function addCalories() {

    let input = parseInt(document.getElementById("calories").value);

    if (isNaN(input) || input <= 0) {
        alert("Please enter a valid calorie value.");
        return;
    }

    totalCalories += input;
    entries++;

    let message = "";

    if (totalCalories <= 800) {
        message = "You're off to a healthy start!";
    } else if (totalCalories <= 1600) {
        message = "Good progress, keep it balanced!";
    } else if (totalCalories <= 1999) {
        message = "Almost at your limit!";
    } else {
        message = "Goal reached! Stay mindful!";
    }

    if (entries > 10 && totalCalories < dailyGoal) {
        message += "<br>Be cautious of frequent snacking!";
    }

    document.getElementById("result").innerHTML =
        "Total Calories: " + totalCalories +
        "<br>Daily Goal: " + dailyGoal +
        "<br>Total Entries: " + entries +
        "<br>Feedback: " + message;
}

