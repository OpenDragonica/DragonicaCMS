<?php
$classlimit=4;
$minlv=25;
$maxlv=99;
$totalClass = TotalCharacterCount($classlimit);
$totalClass = $totalClass['Number'];
$warClass=CharacterCount(5,6,13,14,21,22,$minlv,$maxlv);$warClass=$warClass['Number'];
	$dragon=CharacterCount(5,0,13,0,21,0,$minlv,$maxlv);$dragon=$dragon['Number'];
	$destru=CharacterCount(0,6,0,14,0,22,$minlv,$maxlv);$destru=$destru['Number'];
$magClass=CharacterCount(7,8,15,16,23,24,$minlv,$maxlv);$magClass=$magClass['Number'];
	$oracl=CharacterCount(7,0,15,0,23,0,$minlv,$maxlv);$oracl=$oracl['Number'];
	$arcan=CharacterCount(0,8,0,16,0,24,$minlv,$maxlv);$arcan=$arcan['Number'];
$arcClass=CharacterCount(9,10,17,18,25,26,$minlv,$maxlv);$arcClass=$arcClass['Number'];
	$senti=CharacterCount(9,0,17,0,25,0,$minlv,$maxlv);$senti=$senti['Number'];
	$comma=CharacterCount(0,10,0,18,0,26,$minlv,$maxlv);$comma=$comma['Number'];
$volClass=CharacterCount(11,12,19,20,27,28,$minlv,$maxlv);$volClass=$volClass['Number'];
	$volti=CharacterCount(11,0,19,0,27,0,$minlv,$maxlv);$volti=$volti['Number'];
	$ombre=CharacterCount(0,12,0,20,0,28,$minlv,$maxlv);$ombre=$ombre['Number'];
$chaClass=CharacterCount(0,53,55,57,0,0,$minlv,$maxlv);$chaClass=$chaClass['Number'];
$furClass=CharacterCount(0,54,56,58,0,0,$minlv,$maxlv);$furClass=$furClass['Number'];

//pourcentages
$warClassPer =($warClass/$totalClass);$warClassPer=(int)($warClassPer*100);
	$dragonPer =($dragon/$warClass);$dragonPer=(int)($dragonPer*100);
	$dragonPerToT =($dragon/$totalClass);$dragonPerToT=(int)($dragonPerToT*100);
	$destruPer =($destru/$warClass);$destruPer=(int)($destruPer*100);
	$destruPerToT =($destru/$totalClass);$destruPerToT=(int)($destruPerToT*100);
//
$magClassPer =($magClass/$totalClass);$magClassPer=(int)($magClassPer*100);
	$oraclPer =($oracl/$magClass);$oraclPer=(int)($oraclPer*100);
	$oraclPerToT =($oracl/$totalClass);$oraclPerToT=(int)($oraclPerToT*100);
	$arcanPer =($arcan/$magClass);$arcanPer=(int)($arcanPer*100);
	$arcanPerToT =($arcan/$totalClass);$arcanPerToT=(int)($arcanPerToT*100);
//
$arcClassPer =($arcClass/$totalClass);$arcClassPer=(int)($arcClassPer*100);
	$sentiPer =($senti/$arcClass);$sentiPer=(int)($sentiPer*100);
	$sentiPerToT =($senti/$totalClass);$sentiPerToT=(int)($sentiPerToT*100);
	$commaPer =($comma/$arcClass);$commaPer=(int)($commaPer*100);
	$commaPerToT =($comma/$totalClass);$commaPerToT=(int)($commaPerToT*100);
//
$volClassPer =($volClass/$totalClass);$volClassPer=(int)($volClassPer*100);
	$voltiPer =($volti/$volClass);$voltiPer=(int)($voltiPer*100);
	$voltiPerToT =($volti/$totalClass);$voltiPerToT=(int)($voltiPerToT*100);
	$ombrePer =($ombre/$volClass);$ombrePer=(int)($ombrePer*100);
	$ombrePerToT =($ombre/$totalClass);$ombrePerToT=(int)($ombrePerToT*100);
//
$chaClassPer =($chaClass/$totalClass);$chaClassPer=(int)($chaClassPer*100);
//
$furClassPer =($furClass/$totalClass);$furClassPer=(int)($furClassPer*100);

$drakClassPer=$chaClassPer+$furClassPer;

?>

<h2><span class="top_mainContent_f">Statistiques</span></h2>
<div class="content-padding">
    <div class="left">
    <h2><span>Class</span></h2>
    <div id="chartdiv2" style="width: 100%; height: 365px;"></div>
    <ul class="fa-ul">
	<li><i class="fa-li fa fa-info"></i>Distribution total en %</li>
    </ul>
    </div>
    <div class="right">
       <div id="chartdiv" style="width: 100%; height: 400px;"></div> 
    <ul class="fa-ul">
	<li><i class="fa-li fa fa-info"></i>Cette statistique montre les personnages avec <?php echo $minlv?> Lv.</li>
    </ul>
    </div>
    <div class="clear-float do-the-split"></div>
    <h2><span>Statistiques Online User</span></h2>
    <div id="chart2" style="width: 100%; height: 400px;"></div>
    <ul class="fa-ul center">
    <li><i class="fa-li fa fa-line-chart"></i>Connection over the past 3 months.</li>
    </ul>
</div>