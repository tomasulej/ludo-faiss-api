<?php
  # Add the path to your published Google Docs Writing Spreadsheet between the
  # quotes in the line below.
  $google_docs_writing_sheet = "https://docs.google.com/spreadsheets/d/e/2PACX-1vT3DN4g7JX0JDRaBspzp9DxxDCwADMzZp3GLuc-duhuRNmijUaygabdu3jE6UGhiAwjx4COZ7Agq7VT/pub?output=csv";
  $html = file_get_contents($google_docs_writing_sheet);
  $system_timezone = date_default_timezone_get();

  $lines = explode("\n", $html);
  $output = "";

  $output = $output . "{\n";

  $count = 0;
  foreach ($lines as $line) {
    if ($count > 0) {
      $fields = explode(",", $line);
      $datetime = $fields[0];
      # +1 day below is a hack until I can figure out the timezone issue
      $timestamp = strtotime($datetime . ' +1 day');
      $output = $output . "  \"$timestamp\": " . $fields[3] . ",\n";
    }
    $count++;
  }

  $out = substr($output, 0, strlen($output)-2);
  $out = $out . "\n}\n";
  echo $out

?>
