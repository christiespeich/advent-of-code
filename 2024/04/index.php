<?php

require './WordSearch.php';
$wordSearch = new WordSearch();
echo $wordSearch->count_word() . "\n";
$wordSearch = new WordSearch('MAS');
echo $wordSearch->count_mas_xs() . "\n";
