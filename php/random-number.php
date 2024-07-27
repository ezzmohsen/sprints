<?php

$randomNumber = rand(1, 100);
$numberOfGuesses = 0;
function getUserGuess()
{
    echo "Enter your guess (between 1 and 100): ";
    $handle = fopen("php://stdin", "r");
    $guess = trim(fgets($handle));
    fclose($handle);
    return (int) $guess;
}

echo "Welcome to the Number Guessing Game!\n";

while (true) {
    $guess = getUserGuess();
    $numberOfGuesses++;

    if ($guess > $randomNumber) {
        echo "Too high, try again.\n";
    } elseif ($guess < $randomNumber) {
        echo "Too low, try again.\n";
    } else {
        echo "Congratulations, you guessed the number!\n";
        echo "It took you $numberOfGuesses guesses.\n";
        break;
    }
}

