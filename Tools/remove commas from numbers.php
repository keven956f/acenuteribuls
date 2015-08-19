<?php
$a = "123,435,435";

$a=is_numeric($a) ? $a : str_replace(',', '', $a);

var_dump(round($a,-4));

//remove commas from numbers
