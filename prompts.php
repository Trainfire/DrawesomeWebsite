<?php
header('Content-type: application/json');

// Adapted from code found at: https://gist.github.com/robflaherty/1185299
 
// Link to prompts
$feed = 'https://docs.google.com/spreadsheets/d/1WbUhXkVrC85LE_0nDmqSGN6Wkyc57ABjnTNp2LCgR84/pub?gid=2103597491&single=true&output=csv';

// class that contains an array of Prompts
class Container
{
	public $Items;
}

// Class that matches structure of PromptData in Protocol
class Prompt
{
	public $Text;
	
	public function __construct($Text)
	{
		$this->Text = $Text;
	}
}

// Construct array
$containerArr = array();
 
// Function to convert CSV into associative array
function csvToArray($file, $delimiter) { 
  if (($handle = fopen($file, 'r')) !== FALSE)
  {
    $i = 0;
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE)
	{ 
		$containerArr->Items[$i] = new Prompt($lineArray[0]);
		$i++; 
    } 
    fclose($handle); 
  }
  
  return $containerArr;
} 
 
// Do it
$data = csvToArray($feed, ',');
 
// Print it out as JSON
echo json_encode($data);
 
?>