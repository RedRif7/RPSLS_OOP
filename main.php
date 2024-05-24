<?php

class Element{
    private array $checkWinner;
    private array $elements;

    public function __construct()
    {
        $this->checkWinner = [
            "rock" => ["scissors", "lizard"],
            "paper" => ["rock", "spock"],
            "scissors" => ["paper", "lizard"],
            "lizard" => ["spock", "paper"],
            "spock" => ["scissors", "rock"]
        ];
        $this->elements = ['rock', 'paper', 'scissors', 'lizard', 'spock'];
    }

    private function computerChoice(): string
    {
        return $this->elements[array_rand($this->elements)];
    }

    private function playerChoice(): string
    {
        $playerChoice = strtolower(trim((string)readline("Enter your choice - Rock, Paper, Scissors, Lizard or Spock: ")));
        if (in_array($playerChoice, $this->elements)) {
            return $playerChoice;
        } else {
            echo "Error, please enter a valid choice\n";
            return $this->playerChoice();
        }
    }

    public function getWinner(): string
    {
        $playerChoice = $this->playerChoice();
        $computerChoice = $this->computerChoice();

        if ($playerChoice == $computerChoice) {
            return "It's a draw!\nPlayer - $playerChoice\nComputer - $computerChoice\n";
        } elseif (in_array($playerChoice, $this->checkWinner[$computerChoice])) {
            return "Computer wins!\nPlayer - $playerChoice\nComputer - $computerChoice\n";
        } else {
            return "Player wins!\nPlayer - $playerChoice\nComputer - $computerChoice\n";
        }
    }
}

$match = new Element();
echo $match->getWinner();