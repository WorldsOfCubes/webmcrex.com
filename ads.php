<?php

function GetRandomAdvice() {
$sovet_file = "ads.txt";

   if ($quotes = @file($sovet_file)) $textsov = $quotes[rand(0, sizeof($quotes)-1)];
   else $textsov = "советов нет";

return $textsov; 
}
echo GetRandomAdvice(); 