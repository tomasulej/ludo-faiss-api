#HotkeyInterval 0
nadavky_txt = dement;chru�o;budzog��;chrap��
StringSplit, nadavky, nadavky_txt, `; 
Random, nahoda, 1, 4, NewSeed

::kokot::
Random, nahoda, 1, 4, NewSeed
kon=% nadavky%nahoda%
Send, %kon%{Space} 
return
