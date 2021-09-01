<?php
function createPlayers($name,$symbol,$start):stdClass
{
    $player=new stdClass();
    $player->name=$name;
    $player->symbol=$symbol;
    $player->start = $start;

    return $player;
}

$createPlayers=[
    createPlayers('player1','#',0),
    createPlayers('player2','X',0),
    createPlayers('player3','@',0)
];




echo "Welcome To Olympe :D".PHP_EOL;
echo"---------MAZE RUNNERS ----------".PHP_EOL;
foreach ($createPlayers as  $player){
    echo "{$player->name}({$player->symbol})".PHP_EOL;
}


/*
$playerCount=readline("How many Players will be? Max=3:").PHP_EOL;
//-player validation
if($playerCount>3){
    echo "Invalid player count".PHP_EOL;
}*/
$ruad=["_","_","_","_","_","_","_","_","_","_","_",];
$end = [];
echo"---------START THE RACE----------".PHP_EOL;
$run = function ($player) use ($ruad, $end, $createPlayers)
{
    $ruad[$player->start] = $player->symbol;
    $player->start += rand(1,2);
    echo $player->start . implode($ruad) . "\n";
};

for($i = 0; $i < 10; $i++) {
    foreach ($createPlayers as $player)
        if($player->start < 10) {
            $run($player);
        } else {
            $end[] = $player->name;


        }
    sleep(1);
    echo  "\n";
}
echo"---------WINNERS CIRCUIT----------".PHP_EOL;
$end= array_unique($end);

foreach ($end as $place=>$runners) {
    echo  $place. " place->  $runners  ". "\n";
}

