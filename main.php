<?php

class Element{
    private string $player;
    private string $computer;
    private array $elements;

    public function __construct(string $player, array $computer, array $elements)
    {
        $this->player = strtolower($player);
        $this->computer = $computer[array_rand($computer)];
        $this->elements = $elements;
    }
    public function getWinner(): string{
        if(!isset($this->elements[$this->player])){
            return "Error: Write a valid name";
        }
        if($this->player == $this->computer){
            return "It's a draw!\nPlayer - $this->player\nComputer - $this->computer\n";
        }elseif(in_array($this->player, $this->elements[$this->computer])){
            return "Computer wins!\nPlayer - $this->player\nComputer - $this->computer\n";
        }else{
            return "Player wins!\nPlayer - $this->player\nComputer - $this->computer\n";
        }
    }

}

$checkWinner = [
    "rock" => ["scissors", "lizard"],
    "paper" => ["rock","spock"],
    "scissors" => ["paper","lizard"],
    "lizard" => ["spock","paper"],
    "spock" => ["scissors","rock"]
];
$elements = ['rock','paper','scissors','lizard','spock'];
$playerChoice = (string) readline("Enter your choice - Rock, Paper, Scissors, Lizard or Spock: ");
$match = new Element($playerChoice, $elements, $checkWinner);
echo $match->getWinner();

