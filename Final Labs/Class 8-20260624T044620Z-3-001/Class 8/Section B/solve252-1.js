let dailyGoal = 2000;
let totalCalories = 0 ;
let entrycount = 0;

let calorieInput = document.getElementById("calorieInput");
let addButton = document.getElementById("addButton");
let totalDisplay = document.getElementById("totalDisplay");
let goalDisplay = document.getElementById("goalDisplay");
let feedbackDisplay = document.getElementById("feedbackDisplay");

addButton.addEventListener("click",addCalories)

function addCalories(){
    let calories = Number(calorieInput.value);
    console.log(calories);

    totalCalories += calories;
    entrycount++;

    totalDisplay.textContent = "Total Calories : "+totalCalories;

    goalDisplay.textContent = totalCalories + "/2000 calories consumed"

    if (entrycount > 10 && totalCalories < dailyGoal){
        feedbackDisplay.textContent = "Be cautious of frequent snacking!"
    }
    else if (totalCalories <= 800){
        feedbackDisplay.textContent = "You’re off to a healthy start!"
    }
    else if (totalCalories <= 1600){
        feedbackDisplay.textContent = "Good progress, keep it balanced!"
    }
    else if (totalCalories <= 1999){
        feedbackDisplay.textContent = "Almost at your limit!"
    }
    else {
         feedbackDisplay.textContent = "Goal reached! Stay mindful!"
    }

    calorieInput.value="";




}