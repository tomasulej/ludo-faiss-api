<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include "../../../databaza_nadavky.php";

$query = '<<<eof
    LOAD DATA INFILE \'nadavky-final.csv\'
    INTO TABLE nadavka
    FIELDS TERMINATED BY \',\' OPTIONALLY ENCLOSED BY \'"\'
    LINES TERMINATED BY \'\n\'
    (slovo,zdroj,txt)
eof';

$q2=mysql_query($query);


?>
ň



/var/www/ludoslovensky.sk/public_html/


+---------------------------------------------+-------------------+-------+
| GROUP_CONCAT(DISTINCT id SEPARATOR ' and ') | slovo             | pocet |
+---------------------------------------------+-------------------+-------+
| 52 and 188 and 9                            | frčina           |     3 |
| 5 and 89                                    | buzerant          |     2 |
| 109 and 68                                  | chuj              |     2 |
| 71 and 110                                  | chujovina         |     2 |
| 69 and 111                                  | chujovský        |     2 |
| 113 and 8                                   | cicina            |     2 |
| 10 and 114                                  | cicinbrus         |     2 |
| 11 and 116                                  | cicvor            |     2 |
| 134 and 14                                  | dodrbať          |     2 |
| 15 and 135                                  | dogrcať          |     2 |
| 137 and 17                                  | dojebať          |     2 |
| 22 and 138                                  | dojebať sa       |     2 |
| 24 and 139                                  | dojebať si       |     2 |
| 18 and 140                                  | dojebkať         |     2 |
| 28 and 141                                  | dojebnúť        |     2 |
| 142 and 29                                  | dojebnúť sa     |     2 |
| 20 and 143                                  | domrdať          |     2 |
| 30 and 26                                   | domrdať si       |     2 |
| 31 and 144                                  | dopičovať       |     2 |
| 145 and 32                                  | doprdieť         |     2 |
| 33 and 146                                  | dosrať           |     2 |
| 34 and 147                                  | dosrať sa        |     2 |
| 35 and 148                                  | dosrávať sa     |     2 |
| 19 and 151                                  | dotrtkať         |     2 |
| 152 and 23                                  | dotrtkať sa      |     2 |
| 25 and 153                                  | dotrtkať si      |     2 |
| 149 and 36                                  | došťať         |     2 |
| 150 and 37                                  | došťať sa      |     2 |
| 39 and 155                                  | drb               |     2 |
| 158 and 43                                  | drbať            |     2 |
| 41 and 156                                  | drbačka          |     2 |
| 42 and 157                                  | drbák            |     2 |
| 159 and 44                                  | drbko             |     2 |
| 45 and 160                                  | drbnúť          |     2 |
| 168 and 46                                  | drnkať           |     2 |
| 175 and 48                                  | fajčiť          |     2 |
| 179 and 47                                  | fas               |     2 |
| 180 and 49                                  | fasovina          |     2 |
| 50 and 187                                  | frcguma           |     2 |
| 53 and 193                                  | fuňa             |     2 |
| 201 and 57                                  | gec               |     2 |
| 202 and 59                                  | gecovať          |     2 |
| 54 and 206                                  | grc               |     2 |
| 209 and 55                                  | grcanina          |     2 |
| 210 and 56                                  | grcať            |     2 |
| 61 and 218                                  | hajzeľ           |     2 |
| 63 and 233                                  | honiť            |     2 |
| 237 and 66                                  | hovniak           |     2 |
| 238 and 64                                  | hovno             |     2 |
| 51 and 548                                  | prcguma           |     2 |
| 792 and 67                                  | zahovnený        |     2 |
| 12 and 124                                  | čurák           |     2 |
| 13 and 126                                  | čurina           |     2 |
