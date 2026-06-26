// Stores how many times the user has checked a password.
// Starts from 0.
let attempts = 0;

// Maximum possible score for a perfect password.
const targetScore = 100;

// Function called whenever the button is clicked.
function checkStrength() {

    // Increase the attempt count by 1.
    attempts++;

    // Get the password entered by the user.
    let password = document.getElementById("password").value;

    // Initial password score.
    let score = 0;

    // -----------------------------
    // Password Length Checking
    // -----------------------------
    // Password must contain at least 6 characters.
    // Every 2 characters add 10 points.
    //
    // Examples:
    // 6 characters = 30 points
    // 8 characters = 40 points
    // 10 characters = 50 points
    //
    if (password.length >= 6) {
        score += Math.floor(password.length / 2) * 10;
    }

    // -----------------------------
    // Uppercase Letter Check
    // -----------------------------
    // /[A-Z]/ is a Regular Expression.
    // It checks whether at least one capital letter exists.
    //
    // Example:
    // A
    // B
    // Z
    //
    if (/[A-Z]/.test(password)) {
        score += 15;
    }

    // -----------------------------
    // Lowercase Letter Check
    // -----------------------------
    // Checks if at least one lowercase letter exists.
    //
    // Example:
    // a
    // b
    // z
    //
    if (/[a-z]/.test(password)) {
        score += 15;
    }

    // -----------------------------
    // Number Check
    // -----------------------------
    // Checks whether the password contains
    // at least one number.
    //
    // Example:
    // 0 1 2 3 4 5 6 7 8 9
    //
    if (/[0-9]/.test(password)) {
        score += 20;
    }

    // -----------------------------
    // Special Character Check
    // -----------------------------
    // Checks if one of these symbols exists:
    // ! @ # $ % ^ & *
    //
    if (/[!@#$%^&*]/.test(password)) {
        score += 25;
    }

    // Variable that stores the strength message.
    let message = "";

    // -----------------------------
    // Decide Password Strength
    // -----------------------------
    if (score >= targetScore) {
        message = "Perfect Password! Success!";
    }
    else if (score >= 91) {
        message = "Very Strong";
    }
    else if (score >= 71) {
        message = "Strong";
    }
    else if (score >= 51) {
        message = "Medium";
    }
    else if (score >= 31) {
        message = "Weak";
    }
    else {
        message = "Very Weak";
    }

    // -----------------------------
    // Practice Tip
    // -----------------------------
    // If the user has tried more than 8 times
    // and still has a weak password,
    // display a helpful suggestion.
    if (attempts > 8 && score < 71) {

        message +=
            "<br>Need practice! Tips: " +
            "Use uppercase, lowercase, numbers, " +
            "special characters, and increase length.";
    }

    // -----------------------------
    // Display Result
    // -----------------------------
    // innerHTML allows HTML tags like <br>
    // to create line breaks.
    //
    // Example Output:
    //
    // Score: 80
    // Strength: Strong
    // Attempts: 3
    //
    document.getElementById("result").innerHTML =
        "Score: " + score +
        "<br>Strength: " + message +
        "<br>Attempts: " + attempts;
}