////////////////////////////////////////////////
function WinTime(heure, min, sec)
{
sec++;
if (sec>59) {min++;sec=0;}
if (min>59) {heure++;min=0;}
if (heure>23) {heure=0;}

sec = sec+"";
min = min+"";
heure = heure+"";
if (heure<10) 
{
if ((heure.charAt(0)=="0") && (heure.charAt(1)!="1") && (heure.charAt(1)!="2") && (heure.charAt(1)!="3") && (heure.charAt(1)!="4") && (heure.charAt(1)!="5") && (heure.charAt(1)!="6") && (heure.charAt(1)!="7") && (heure.charAt(1)!="8") && (heure.charAt(1)!="9")) {heure="00";} else if (heure.charAt(0)!="0") {heure="0"+heure;}
}
if (min<10) 
{
if ((min.charAt(0)=="0") && (min.charAt(1)!="1")&& (min.charAt(1)!="2") && (min.charAt(1)!="3") && (min.charAt(1)!="4") && (min.charAt(1)!="5") && (min.charAt(1)!="6") && (min.charAt(1)!="7") && (min.charAt(1)!="8") && (min.charAt(1)!="9")) {min="00";} else if (min.charAt(0)!="0") {min="0"+min;}
}
if (sec<10) 
{
if ((sec.charAt(0)=="0") && (sec.charAt(1)!="1") && (sec.charAt(1)!="2") && (sec.charAt(1)!="3") && (sec.charAt(1)!="4") && (sec.charAt(1)!="5") && (sec.charAt(1)!="6") && (sec.charAt(1)!="7") && (sec.charAt(1)!="8") && (sec.charAt(1)!="9")) {sec="00";} else if (sec.charAt(0)!="0") {sec="0"+sec;}
}
document.getElementById('horloge').innerHTML=heure+":"+min+":"+sec;
setTimeout("WinTime('"+heure+"', '"+min+"', '"+sec+"')",1000);
}
////////////////////////////////////////////////