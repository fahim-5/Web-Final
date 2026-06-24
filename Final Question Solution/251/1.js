let attempts = 0;
const targetScore = 100;

function checkStrength() {
    attempts++;

    let password = document.getElementById("password").value;
    let score = 0;

    // Length: +10 points for every 2 characters (minimum 6)
    if (password.length >= 6) {
        score += Math.floor(password.length / 2) * 10;
    }

    // Uppercase
    if (/[A-Z]/.test(password)) {
        score += 15;
    }

    // Lowercase
    if (/[a-z]/.test(password)) {
        score += 15;
    }

    // Numbers
    if (/[0-9]/.test(password)) {
        score += 20;
    }

    // Special characters
    if (/[!@#$%^&*]/.test(password)) {
        score += 25;
    }

    let message = "";

    if (score >= targetScore) {
        message = "Perfect Password! Success!";
    } else if (score >= 91) {
        message = "Very Strong";
    } else if (score >= 71) {
        message = "Strong";
    } else if (score >= 51) {
        message = "Medium";
    } else if (score >= 31) {
        message = "Weak";
    } else {
        message = "Very Weak";
    }

    if (attempts > 8 && score < 71) {
        message += "<br>Need practice! Tips: Use uppercase, lowercase, numbers, special characters, and increase length.";
    }

    document.getElementById("result").innerHTML =
        "Score: " + score +
        "<br>Strength: " + message +
        "<br>Attempts: " + attempts;
}