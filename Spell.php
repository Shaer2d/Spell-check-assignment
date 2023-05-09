<!DOCTYPE html>
<html>

<head>
  <title>Spell Check</title>
</head>

<body>
  <h2>Spell Check Assignment</h2>
  <hr>
 
<section>
    <form action="dfnj.php" method="GET">
      <label>Enter A Word:</label>
      <input type="text" name="word-in"><br><br>
      <select name="selection">
        <option value="word-linear">Spell Check A Word (Linear)</option>
        <option value="word-binary">Spell Check A Word (Binary)</option>
        <option value="alice-linear">Check Alice (Linear)</option>
        <option value="alice-binary">Check Alice (Binary)</option>
      </select>
      <input type="submit" name="submit" value='submit'>
    </form>
</section>

<?php

$alice = "aliceWorld.txt";
$cont = file_get_contents($alice, FILE_IGNORE_NEW_LINES);
$aliceArr = explode(" ", $cont);
$dictionaryArr = file("dictionary.txt", FILE_IGNORE_NEW_LINES);

if (isset($_GET['submit'])){
  $in = $_GET['word-in'];
  $s = $_GET['selection'];
  switch ($s) {
    case 'word-linear':
      $st=microtime(true);
      $index = linear($dictionaryArr, $in);
      if ($index == -1) {
        $et=microtime(true);
          $tt=$et-$st;
        echo "Not found"."\nTime taken:\n". $tt;
      } else {
        $et=microtime(true);
        $tt=$et-$st;
        echo "Found at index ", $index . "\nTime taken:\n".$tt;
      }
      break;
    case 'word-binary':
      $st=microtime(true);
      $index = binary($dictionaryArr, $in);
      if ($index == -1) {
        $et=microtime(true);
          $tt=$et-$st;
          echo "Not found"."\nTime taken:\n". $tt;
      } else {
        $et=microtime(true);
        $tt=$et-$st;
        echo "Found at index ", $index . "\nTime taken:\n".$tt;
      }
      break;
    case 'alice-linear':
      $st=microtime(true);
      $index = linear($aliceArr, $in);
      if ($index == -1) {
        $et=microtime(true);
          $tt=$et-$st;
          echo "Not found"."\nTime taken:\n". $tt;
      } else {
        $et=microtime(true);
        $tt=$et-$st;
        echo "Found at index ", $index . "\nTime taken:\n".$tt;
      }
      break;
    case 'alice-binary':
      $st=microtime(true);
      $index = binary($aliceArr, $in);
      if ($index == -1) {
        $et=microtime(true);
          $tt=$et-$st;
          echo "Not found"."\nTime taken:\n". $tt;
      } else {
        $et=microtime(true);
        $tt=$et-$st;
        echo "Found at index ", $index . "\nTime taken:\n".$tt;
      }
      break;
  }
}

function linear($arr, $item){


    for ($i = 0; $i < count($arr); $i++) {
        if ($item == $arr[$i]) {
          return $i;
        }
    }
    return -1. ;
}

function binary($arr, $item){
   
    sort($arr);
    $low = 0;
    $high = sizeof($arr) - 1;
    while ($low <= $high) {
        $mid = (int)floor(($low + $high) / 2);
        if ($arr[$mid] == $item) {
           
            return $mid;
        } elseif ($arr[$mid] > $item) {
            $high = $mid - 1;
        } else {
          $low = $mid + 1;
        }
    }

return -1;

  
}


?>

</body>
</html>
