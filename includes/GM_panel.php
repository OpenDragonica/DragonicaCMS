<h2><span>GM Panel<?php echo $lgm_page ?></span></h2>
<div class="clearBTM"></div>
<div class="clear10"></div>
<?php if(empty($gm_task)):?>
<table class="mcenter">
    <tr>
        <th><div class="clear10"></div><a class="Class_Center" href="<?php echo $lgm_news ?>">Gestion des News</a></th>
    </tr>
    <tr>
        <th><div class="clear10"></div><a class="Class_Center" href="<?php echo $lgm_admin ?>">Mod√©ration</a></th>
    </tr>
    <tr>
        <th><div class="clear10"></div><a class="Class_Center" href="<?php echo $lgm_event ?>">Gestion Event</a></th>
    </tr>
</table>
<table class="mcenter" >
<tr>
<th>User Online</th>
</tr>
<tr>
<td>
<div class="log_table">
<TABLE border ="1" width="100%" style="border: 3px solid grey;width: 97%;text-align: center;">
		<thead>
		<tr style="">
           <TH class="moderate">Class</TH>
           <TH class="moderate">Name Char</TH>
           <TH class="moderate">LvL</TH>
           <TH class="moderate">Map</TH>
           <TH class="moderate">Money</TH>
		</tr>
		</thead>
		   <?php
// Debut de la requÍte PHP
$channel_check=1;
$realm_requÍte =$dbh2->prepare('SELECT CharacterID FROM [dbo].[TB_CharacterSub] WHERE f_ConnectionChannel>= :channel');
$realm_requÍte->bindParam(':channel', $channel_check);
$realm_requÍte->execute();
while ($donnees = $realm_requÍte->fetch()) 
{ // Ouverture de la boucle 
$connected_charGUID=$donnees['CharacterID'];
$charGUIDinfo=CharacterInfo($connected_charGUID);
$connected_charName=$charGUIDinfo['Name'];
$classno=$connected_charClass=$charGUIDinfo['Job'];
$connected_charLevel=$charGUIDinfo['Level'];
$chMap=$connected_charMap=$charGUIDinfo['Map'];
$connected_charConnectChannel=$charGUIDinfo['ConnectChannel'];
$connected_charMoney=$charGUIDinfo['Money'];
$connected_charExp=$charGUIDinfo['Exp'];
if ($classno==1){$connected_charClass="Guerrier";}
elseif ($classno==2){$connected_charClass="Magicien";}
elseif ($classno==3){$connected_charClass="Archer";}
elseif ($classno==4){$connected_charClass="Voleur";}
elseif ($classno==5){$connected_charClass="Chevalier";}
elseif ($classno==6){$connected_charClass="Gladiateur";}
elseif ($classno==7){$connected_charClass="Moine";}
elseif ($classno==8){$connected_charClass="Mage";}
elseif ($classno==9){$connected_charClass="Eclaireur";}
elseif ($classno==10){$connected_charClass="Arbaletrier";}
elseif ($classno==11){$connected_charClass="Acrobate";}
elseif ($classno==12){$connected_charClass="Assassin";}
elseif ($classno==13){$connected_charClass="Paladin";}
elseif ($classno==14){$connected_charClass="Myrmidon";}
elseif ($classno==15){$connected_charClass="PrÍtre";}
elseif ($classno==16){$connected_charClass="Archimage";}
elseif ($classno==17){$connected_charClass="Ranger";}
elseif ($classno==18){$connected_charClass="Grenadier";}
elseif ($classno==19){$connected_charClass="Arlequin";}
elseif ($classno==20){$connected_charClass="Ninja";}
elseif ($classno==21){$connected_charClass="Dragon";}
elseif ($classno==22){$connected_charClass="Destructeur";}
elseif ($classno==23){$connected_charClass="Oracle";}
elseif ($classno==24){$connected_charClass="Arcaniste";}
elseif ($classno==25){$connected_charClass="Sentinelle";}
elseif ($classno==26){$connected_charClass="Commando";}
elseif ($classno==27){$connected_charClass="Voltigeur";}
elseif ($classno==28){$connected_charClass="Ombre";}

elseif ($classno==51){$connected_charClass="Chaman";}
elseif ($classno==52){$connected_charClass="Amazone";}
elseif ($classno==53){$connected_charClass="Invocateur";}
elseif ($classno==54){$connected_charClass="Valkyrie";}

elseif ($classno==55){$connected_charClass="Demoniste";}
elseif ($classno==56){$connected_charClass="Mirage";}
elseif ($classno==57){$connected_charClass="Elementaliste";}
elseif ($classno==58){$connected_charClass="Furie Drake";}

if ($chMap==9010100){$connected_charMap="CÙte des Baleines";}
elseif ($chMap==9010109){$connected_charMap="Villa du Capitaine Hookah";}
elseif ($chMap==9010110){$connected_charMap="CÙte des Pinces";}
elseif ($chMap==9010120){$connected_charMap="Ponton des Pirates";}
elseif ($chMap==9010130){$connected_charMap="Port Steven";}
elseif ($chMap==9010139){$connected_charMap="Capitaine Alvida Furieuse";}
elseif ($chMap==9010140){$connected_charMap="Port de Nautilus";}
elseif ($chMap==9010150){$connected_charMap="Flotte de Kalygon";}
elseif ($chMap==9010159){$connected_charMap="Capitaine Kalygon Fou";}
elseif ($chMap==9010200){$connected_charMap="Sanctuaire de Mirinae";}
elseif ($chMap==9010209){$connected_charMap="Esprit d'Artis";}
elseif ($chMap==9010210){$connected_charMap="Sanctuaire de Skippy";}
elseif ($chMap==9010219){$connected_charMap="MaÓtre de la Mort";}
elseif ($chMap==9010220){$connected_charMap="Sanctuaire de Belkan";}
elseif ($chMap==9010230){$connected_charMap="Sanctuaire de Parmir";}
elseif ($chMap==9010300){$connected_charMap="Plaines de Windia";}
elseif ($chMap==9010309){$connected_charMap="Vagabond l'Haletant";}
elseif ($chMap==9010330){$connected_charMap="Plaines de Windia Est";}
elseif ($chMap==9010339){$connected_charMap="Vegas le Sauvage";}
elseif ($chMap==9010400){$connected_charMap="CrÍte du Fourbe";}
elseif ($chMap==9010409){$connected_charMap="Sanka Hache-geante";}
elseif ($chMap==9010410){$connected_charMap="Colline de Hurlevent";}
elseif ($chMap==9010420){$connected_charMap="Colline des Lamentations";}
elseif ($chMap==9010430){$connected_charMap="Canyon de l'Oubli";}
elseif ($chMap==9010439){$connected_charMap="Kunka Hache-geante";}
elseif ($chMap==9010450){$connected_charMap="Antre des Loups";}
elseif ($chMap==9010460){$connected_charMap="Antre des Loups";}
elseif ($chMap==9010502){$connected_charMap="Egouts de l'HÙtel de Ville";}
elseif ($chMap==9010503){$connected_charMap="Laboratoire du Dr. Farrell";}
elseif ($chMap==9010600){$connected_charMap="Caverne des Dangers";}
elseif ($chMap==9010609){$connected_charMap="Raton Laveur Mambo Atoo";}
elseif ($chMap==9010610){$connected_charMap="La Source";}
elseif ($chMap==9010620){$connected_charMap="La Mine";}
elseif ($chMap==9010701){$connected_charMap="Temple de l'Eau";}
elseif ($chMap==9010709){$connected_charMap="Esprit de l'Eau Endairon";}
elseif ($chMap==9010801){$connected_charMap="Citadelle du Tourment";}
elseif ($chMap==9010809){$connected_charMap="Autel des Heros";}
elseif ($chMap==9010910){$connected_charMap="CimetiËre souterrain";}
elseif ($chMap==9010920){$connected_charMap="CimetiËre souterrain";}
elseif ($chMap==9013100){$connected_charMap="ColËre de Nautilus";}
elseif ($chMap==9013200){$connected_charMap="Meca Dangereux";}
elseif ($chMap==9013300){$connected_charMap="Plaines du Vent Agite";}
elseif ($chMap==9013600){$connected_charMap="TaniËre de Barlok";}
elseif ($chMap==9014101){$connected_charMap="CÙte des Baleines";}
elseif ($chMap==9014102){$connected_charMap="Port Delabre";}
elseif ($chMap==9014131){$connected_charMap="Port Steven";}
elseif ($chMap==9014132){$connected_charMap="Tombeau de l'Ocean";}
elseif ($chMap==9014139){$connected_charMap="Port Steven Mode Defense";}
elseif ($chMap==9014150){$connected_charMap="Flotte de Kalygon Mode Defense";}
elseif ($chMap==9014200){$connected_charMap="Extermination de P‚ris";}
elseif ($chMap==9014201){$connected_charMap="Sanctuaire du Silence";}
elseif ($chMap==9014202){$connected_charMap="Temple Perdu";}
elseif ($chMap==9014209){$connected_charMap="Sanctuaire de Mirinae Mode Defense";}
elseif ($chMap==9014219){$connected_charMap="Sanctuaire de Skippy Mode Defense";}
elseif ($chMap==9014301){$connected_charMap="Rues des BÍtes";}
elseif ($chMap==9014333){$connected_charMap="Collines des Vents";}
elseif ($chMap==9014400){$connected_charMap="Restaurant de sushi Haruka Mode Defense";}
elseif ($chMap==9014401){$connected_charMap="ForÍt des Rumeurs";}
elseif ($chMap==9014402){$connected_charMap="ForÍt de la Cupidite";}
elseif ($chMap==9014433){$connected_charMap="CrÍte des Lamentations";}
elseif ($chMap==9014435){$connected_charMap="Antre des Voleurs";}
elseif ($chMap==9014500){$connected_charMap="Ch‚teau de la Reine Rouge - Mode de Defense Strategique";}
elseif ($chMap==9014600){$connected_charMap="Demeure du MaÓtre Chocolatier";}
elseif ($chMap==9014601){$connected_charMap="La Mine";}
elseif ($chMap==9014603){$connected_charMap="Champ de Corail";}
elseif ($chMap==9014609){$connected_charMap="Caverne des Dangers Mode Defense";}
elseif ($chMap==9014700){$connected_charMap="EntrepÙt Chocolate";}
elseif ($chMap==9015101){$connected_charMap="Combat ‡ mort";}
elseif ($chMap==9015109){$connected_charMap="Salle du Boss";}
elseif ($chMap==9015110){$connected_charMap="Salle du Boss";}
elseif ($chMap==9015120){$connected_charMap="Wonk-A le Batteur Fou";}
elseif ($chMap==9015121){$connected_charMap="Usine ‡ Macarons Mission";}
elseif ($chMap==9015129){$connected_charMap="Woodie la Guimauve";}
elseif ($chMap==9015130){$connected_charMap="Rue de la Gauffre";}
elseif ($chMap==9015200){$connected_charMap="Hall de Ceremonie";}
elseif ($chMap==9015400){$connected_charMap="Colline des Cerisiers en Fleurs";}
elseif ($chMap==9015401){$connected_charMap="Restaurant de sushi Haruka Mission";}
elseif ($chMap==9015409){$connected_charMap="MaÓtre sushi";}
elseif ($chMap==9015500){$connected_charMap="Entree du ch‚teau de la Reine Rouge";}
elseif ($chMap==9015508){$connected_charMap="Ch‚teau de la Reine Rouge";}
elseif ($chMap==9015509){$connected_charMap="Reine Rouge";}
elseif ($chMap==9015600){$connected_charMap="Village Geffen";}
elseif ($chMap==9015610){$connected_charMap="Champ d'Orcs";}
elseif ($chMap==9015620){$connected_charMap="Maison de verre";}
elseif ($chMap==9015630){$connected_charMap="Maison de verre";}
elseif ($chMap==9015640){$connected_charMap="Maison de verre";}
elseif ($chMap==9016101){$connected_charMap="CÙte des Baleines Bonus";}
elseif ($chMap==9016131){$connected_charMap="Port Steven Bonus Stage";}
elseif ($chMap==9016151){$connected_charMap="Flotte de Kalygon Bonus";}
elseif ($chMap==9016201){$connected_charMap="Sanctuarie de Mirinae Bonus";}
elseif ($chMap==9016211){$connected_charMap="Sanctuaire de Skippy Bonus";}
elseif ($chMap==9016301){$connected_charMap="Plaines de Windia Bonus";}
elseif ($chMap==9016331){$connected_charMap="Plaines de Windia Est Bonus Stage";}
elseif ($chMap==9016401){$connected_charMap="CrÍte du Fourbe Bonus";}
elseif ($chMap==9016431){$connected_charMap="Canyon de l'Oubli Bonus";}
elseif ($chMap==9016601){$connected_charMap="Cavernes du Danger Bonus";}
elseif ($chMap==9017101){$connected_charMap="CÙte des Baleines Bonus";}
elseif ($chMap==9017131){$connected_charMap="Port Steven Bonus";}
elseif ($chMap==9017151){$connected_charMap="Flotte de Kalygon Bonus";}
elseif ($chMap==9017201){$connected_charMap="Sanctuarie de Mirinae Bonus";}
elseif ($chMap==9017211){$connected_charMap="Sanctuaire de Skippy Bonus";}
elseif ($chMap==9017601){$connected_charMap="Cavernes du Danger Bonus";}
elseif ($chMap==9018100){$connected_charMap="Port des Quatre Vents";}
elseif ($chMap==9018200){$connected_charMap="Odelia";}
elseif ($chMap==9018251){$connected_charMap="Emporia 1 etoile";}
elseif ($chMap==9018252){$connected_charMap="Emporia 2 etoiles";}
elseif ($chMap==9018253){$connected_charMap="Emporia 3 etoiles";}
elseif ($chMap==9018254){$connected_charMap="Emporia 4 etoiles";}
elseif ($chMap==9018255){$connected_charMap="Emporia 5 etoiles";}
elseif ($chMap==9018310){$connected_charMap="Village du Clair de Lune";}
elseif ($chMap==9018320){$connected_charMap="Libra";}
elseif ($chMap==9019109){$connected_charMap="Villa du Capitaine Hookah";}
elseif ($chMap==9019139){$connected_charMap="Capitaine Alvida Furieuse";}
elseif ($chMap==9019151){$connected_charMap="Flotte de Kalygon";}
elseif ($chMap==9019152){$connected_charMap="Navire naufrage";}
elseif ($chMap==9020100){$connected_charMap="Le Souffle du Demon";}
elseif ($chMap==9020109){$connected_charMap="Chef Rocker";}
elseif ($chMap==9020110){$connected_charMap="Abysses de Feu";}
elseif ($chMap==9020130){$connected_charMap="Coraux Magmatiques";}
elseif ($chMap==9020200){$connected_charMap="Dragon de Magma Lavalon";}
elseif ($chMap==9020201){$connected_charMap="Magmus";}
elseif ($chMap==9020202){$connected_charMap="Dragon Lavalon";}
elseif ($chMap==9020300){$connected_charMap="Marais Ardents";}
elseif ($chMap==9020309){$connected_charMap="Reine Vella";}
elseif ($chMap==9020310){$connected_charMap="Marais du Bois Mort";}
elseif ($chMap==9020320){$connected_charMap="Marais aux Roseaux";}
elseif ($chMap==9020420){$connected_charMap="Chemin Brumeux";}
elseif ($chMap==9020430){$connected_charMap="Colline aux Pins";}
elseif ($chMap==9024431){$connected_charMap="Scierie de Pins";}
elseif ($chMap==9024432){$connected_charMap="Scierie Desaffectee";}
elseif ($chMap==9020439){$connected_charMap="Homme des bois Burnan";}
elseif ($chMap==9020500){$connected_charMap="Sanctuaire des Dieux";}
elseif ($chMap==9020509){$connected_charMap="Karkarous";}
elseif ($chMap==9020510){$connected_charMap="Sanctuaire en Ruine";}
elseif ($chMap==9020530){$connected_charMap="Autel de Kayron";}
elseif ($chMap==9020600){$connected_charMap="Golem Aram";}
elseif ($chMap==9020601){$connected_charMap="Donjon de Kundara";}
elseif ($chMap==9020700){$connected_charMap="Autel de la Verdure";}
elseif ($chMap==9020701){$connected_charMap="ForÍt verdoyante";}
elseif ($chMap==9023300){$connected_charMap="Marais Boueux";}
elseif ($chMap==9023400){$connected_charMap="Scierie de ChÍnes";}
elseif ($chMap==9023500){$connected_charMap="Chapelle Maudite";}
elseif ($chMap==9024101){$connected_charMap="Usine de Lave";}
elseif ($chMap==9024102){$connected_charMap="Champ Pourpre";}
elseif ($chMap==9024108){$connected_charMap="Souffle du Demon Mode de Defense Strategique";}
elseif ($chMap==9024109){$connected_charMap="Souffle du Demon Mode Defense";}
elseif ($chMap==9024301){$connected_charMap="Marais Ardents";}
elseif ($chMap==9024308){$connected_charMap="Marais Ardents Mode de Defense Strategique";}
elseif ($chMap==9024309){$connected_charMap="Marais Ardents Mode Defense";}
elseif ($chMap==9024438){$connected_charMap="Colline aux Pins Mode de Defense Strategique";}
elseif ($chMap==9024439){$connected_charMap="Colline aux Pins Mode Defense";}
elseif ($chMap==9024501){$connected_charMap="Autel Azur";}
elseif ($chMap==9024502){$connected_charMap="Chemin des Statues de Pierre";}
elseif ($chMap==9024508){$connected_charMap="Sanctuaire des Dieux Mode de Defense Strategique";}
elseif ($chMap==9024509){$connected_charMap="Sanctuaire des Dieux Mode Defense";}
elseif ($chMap==9026101){$connected_charMap="Souffle du Demon Bonus";}
elseif ($chMap==9026301){$connected_charMap="Marais Ardents Bonus";}
elseif ($chMap==9026431){$connected_charMap="Colline aux Pins Bonus";}
elseif ($chMap==9026501){$connected_charMap="Sanctuaire des Dieux Bonus";}
elseif ($chMap==9027101){$connected_charMap="Souffle du Demon Bonus";}
elseif ($chMap==9027301){$connected_charMap="Marais Ardents Bonus";}
elseif ($chMap==9027431){$connected_charMap="Colline aux Pins Bonus";}
elseif ($chMap==9027501){$connected_charMap="Sanctuaire des Dieux Bonus";}
elseif ($chMap==9028100){$connected_charMap="Village Fungoid";}
elseif ($chMap==9029302){$connected_charMap="Marais Ardents - 2nd scenario";}
elseif ($chMap==9030100){$connected_charMap="Village Oublie";}
elseif ($chMap==9030109){$connected_charMap="Roi Mimir Bubobubo";}
elseif ($chMap==9030110){$connected_charMap="ForÍt des Arbres Tutu";}
elseif ($chMap==9030130){$connected_charMap="Village Endormi";}
elseif ($chMap==9030139){$connected_charMap="Burlune le Vacillant";}
elseif ($chMap==9030140){$connected_charMap="Usine de Champignons";}
elseif ($chMap==9030200){$connected_charMap="Terre de l'Envie";}
elseif ($chMap==9030209){$connected_charMap="Golem de Pythanuth";}
elseif ($chMap==9030210){$connected_charMap="CrÍte du Blizzard";}
elseif ($chMap==9030220){$connected_charMap="Lac Gele";}
elseif ($chMap==9030230){$connected_charMap="Canyon Glace";}
elseif ($chMap==9030239){$connected_charMap="Princesse des Glaces Arka";}
elseif ($chMap==9030240){$connected_charMap="Champ de Neige";}
elseif ($chMap==9030300){$connected_charMap="Autel de la Verite";}
elseif ($chMap==9030301){$connected_charMap="Drakos 1er Et.";}
elseif ($chMap==9030302){$connected_charMap="Drakos 2Ëme Et.";}
elseif ($chMap==9030303){$connected_charMap="Drakos 3Ëme Et.";}
elseif ($chMap==9030304){$connected_charMap="Drakos 4Ëme Et.";}
elseif ($chMap==9030305){$connected_charMap="Drakos 5Ëme Et.";}
elseif ($chMap==9030306){$connected_charMap="Drakos 6Ëme Et.";}
elseif ($chMap==9030307){$connected_charMap="Drakos 7Ëme Et.";}
elseif ($chMap==9030308){$connected_charMap="Drakos 8Ëme Et.";}
elseif ($chMap==9030309){$connected_charMap="Drakos 9Ëme Et.";}
elseif ($chMap==9030310){$connected_charMap="Drakos 10Ëme Et.";}
elseif ($chMap==9030311){$connected_charMap="Drakos 11Ëme Et.";}
elseif ($chMap==9030312){$connected_charMap="Drakos 12Ëme Et.";}
elseif ($chMap==9030313){$connected_charMap="Drakos 13Ëme Et.";}
elseif ($chMap==9030314){$connected_charMap="Drakos 14Ëme Et.";}
elseif ($chMap==9030315){$connected_charMap="Drakos 15Ëme Et.";}
elseif ($chMap==9030316){$connected_charMap="Drakos 16Ëme Et.";}
elseif ($chMap==9030317){$connected_charMap="Drakos 17Ëme Et.";}
elseif ($chMap==9030318){$connected_charMap="Drakos 18Ëme Et.";}
elseif ($chMap==9030319){$connected_charMap="Drakos 19Ëme Et.";}
elseif ($chMap==9030320){$connected_charMap="Drakos 20Ëme Et.";}
elseif ($chMap==9030321){$connected_charMap="Drakos 21Ëme Et.";}
elseif ($chMap==9030322){$connected_charMap="Drakos 22Ëme Et.";}
elseif ($chMap==9030323){$connected_charMap="Drakos 23Ëme Et.";}
elseif ($chMap==9030324){$connected_charMap="Drakos 24Ëme Et.";}
elseif ($chMap==9030325){$connected_charMap="Drakos 25Ëme Et.";}
elseif ($chMap==9030326){$connected_charMap="Drakos 26Ëme Et.";}
elseif ($chMap==9030327){$connected_charMap="Drakos 27Ëme Et.";}
elseif ($chMap==9030328){$connected_charMap="Drakos 28Ëme Et.";}
elseif ($chMap==9030329){$connected_charMap="Drakos 29Ëme Et.";}
elseif ($chMap==9030330){$connected_charMap="Drakos 30Ëme Et.";}
elseif ($chMap==9030331){$connected_charMap="Drakos 31Ëme Et.";}
elseif ($chMap==9030332){$connected_charMap="Drakos 32Ëme Et.";}
elseif ($chMap==9030333){$connected_charMap="Drakos 33Ëme Et.";}
elseif ($chMap==9030334){$connected_charMap="Drakos 34Ëme Et.";}
elseif ($chMap==9030335){$connected_charMap="Drakos 35Ëme Et.";}
elseif ($chMap==9030336){$connected_charMap="Drakos 36Ëme Et.";}
elseif ($chMap==9030337){$connected_charMap="Drakos 37Ëme Et.";}
elseif ($chMap==9030338){$connected_charMap="Drakos 38Ëme Et.";}
elseif ($chMap==9030339){$connected_charMap="Drakos 39Ëme Et.";}
elseif ($chMap==9030340){$connected_charMap="Drakos 40Ëme Et.";}
elseif ($chMap==9030341){$connected_charMap="Drakos 41Ëme Et.";}
elseif ($chMap==9030342){$connected_charMap="Drakos 42Ëme Et.";}
elseif ($chMap==9030343){$connected_charMap="Drakos 43Ëme Et.";}
elseif ($chMap==9030344){$connected_charMap="Drakos 44Ëme Et.";}
elseif ($chMap==9030345){$connected_charMap="Drakos 45Ëme Et.";}
elseif ($chMap==9030346){$connected_charMap="Drakos 46Ëme Et.";}
elseif ($chMap==9030347){$connected_charMap="Drakos 47Ëme Et.";}
elseif ($chMap==9030348){$connected_charMap="Drakos 48Ëme Et.";}
elseif ($chMap==9030349){$connected_charMap="Drakos 49Ëme Et.";}
elseif ($chMap==9030350){$connected_charMap="Drakos 50Ëme Et.";}
elseif ($chMap==9030500){$connected_charMap="L'Autel Sombre sans Fond";}
elseif ($chMap==9030501){$connected_charMap="BibliothËque de Van Cliff 1er Et.";}
elseif ($chMap==9030502){$connected_charMap="BibliothËque de Van Cliff 2Ëme Et.";}
elseif ($chMap==9030503){$connected_charMap="BibliothËque de Van Cliff 3Ëme Et.";}
elseif ($chMap==9030504){$connected_charMap="BibliothËque de Van Cliff 4Ëme Et.";}
elseif ($chMap==9030505){$connected_charMap="BibliothËque de Van Cliff 5Ëme Et.";}
elseif ($chMap==9030506){$connected_charMap="Jardin Botanique de Van Cliff 6Ëme Et.";}
elseif ($chMap==9030507){$connected_charMap="Jardin Botanique de Van Cliff 7Ëme Et.";}
elseif ($chMap==9030508){$connected_charMap="Jardin Botanique de Van Cliff 8Ëme Et.";}
elseif ($chMap==9030509){$connected_charMap="Jardin Botanique de Van Cliff 9Ëme Et.";}
elseif ($chMap==9030510){$connected_charMap="Jardin Botanique de Van Cliff 10Ëme Et.";}
elseif ($chMap==9030511){$connected_charMap="Salle des Expositions de Van Cliff B1";}
elseif ($chMap==9030512){$connected_charMap="Salle des Expositions de Van Cliff B2";}
elseif ($chMap==9030513){$connected_charMap="Salle des Expositions de Van Cliff B3";}
elseif ($chMap==9030514){$connected_charMap="Salle des Expositions de Van Cliff B4";}
elseif ($chMap==9030515){$connected_charMap="Salle des Expositions de Van Cliff B5";}
elseif ($chMap==9030516){$connected_charMap="Salle des Expositions de Van Cliff B6";}
elseif ($chMap==9030517){$connected_charMap="Salle des Expositions de Van Cliff B7";}
elseif ($chMap==9030518){$connected_charMap="Salle des Expositions de Van Cliff B8";}
elseif ($chMap==9030519){$connected_charMap="Salle des Expositions de Van Cliff B9";}
elseif ($chMap==9030520){$connected_charMap="Salle des Expositions de Van Cliff B10";}
elseif ($chMap==9030521){$connected_charMap="Prison Souterraine de Van Cliff B11";}
elseif ($chMap==9030522){$connected_charMap="Prison Souterraine de Van Cliff B12";}
elseif ($chMap==9030523){$connected_charMap="Prison Souterraine de Van Cliff B13";}
elseif ($chMap==9030524){$connected_charMap="Prison Souterraine de Van Cliff B14";}
elseif ($chMap==9030525){$connected_charMap="Prison Souterraine de Van Cliff B15";}
elseif ($chMap==9030526){$connected_charMap="Prison Souterraine de Van Cliff B16";}
elseif ($chMap==9030527){$connected_charMap="Prison Souterraine de Van Cliff B17";}
elseif ($chMap==9030528){$connected_charMap="Prison Souterraine de Van Cliff B18";}
elseif ($chMap==9030529){$connected_charMap="Prison Souterraine de Van Cliff B19";}
elseif ($chMap==9030530){$connected_charMap="Prison Souterraine de Van Cliff B20";}
elseif ($chMap==9030531){$connected_charMap="Prison Sombre de Van Cliff B21";}
elseif ($chMap==9030532){$connected_charMap="Prison Sombre de Van Cliff B22";}
elseif ($chMap==9030533){$connected_charMap="Prison Sombre de Van Cliff B23";}
elseif ($chMap==9030534){$connected_charMap="Prison Sombre de Van Cliff B24";}
elseif ($chMap==9030535){$connected_charMap="Prison Sombre de Van Cliff B25";}
elseif ($chMap==9030599){$connected_charMap="Lobby de Van Cliff";}
elseif ($chMap==9030600){$connected_charMap="Autel gele";}
elseif ($chMap==9030601){$connected_charMap="Temple de Glace";}
elseif ($chMap==9030700){$connected_charMap="ForÍt de la Rancune";}
elseif ($chMap==9030710){$connected_charMap="CrÍte du Poursuivant";}
elseif ($chMap==9030719){$connected_charMap="CrÍte du Poursuivant Arcade elite";}
elseif ($chMap==9030720){$connected_charMap="Refuge de la Paix";}
elseif ($chMap==9030729){$connected_charMap="Refuge de la Paix Arcade elite";}
elseif ($chMap==9030730){$connected_charMap="CimetiËre Enneige";}
elseif ($chMap==9030800){$connected_charMap="Vallee de la Guimauve";}
elseif ($chMap==9030810){$connected_charMap="CrÍte du Verglas";}
elseif ($chMap==9030819){$connected_charMap="CrÍte du Verglas Arcade elite";}
elseif ($chMap==9030820){$connected_charMap="Mine de la Griffe d'Ours";}
elseif ($chMap==9030829){$connected_charMap="Mine de la Griffe d'Ours Arcade elite";}
elseif ($chMap==9030830){$connected_charMap="Colline du Glacier Rocheux";}
elseif ($chMap==9032109){$connected_charMap="Roi Mimir Bubobubo";}
elseif ($chMap==9032300){$connected_charMap="Chambre secrËte de Drakos";}
elseif ($chMap==9033100){$connected_charMap="ForÍt des Illusions";}
elseif ($chMap==9033200){$connected_charMap="Lac Spirituel Cristallin";}
elseif ($chMap==9034101){$connected_charMap="Les Arbres ‡ Champignons";}
elseif ($chMap==9034102){$connected_charMap="ForÍt des Champignons ‡ Luciole";}
elseif ($chMap==9034108){$connected_charMap="Village Oublie Mode de Defense Strategique";}
elseif ($chMap==9034109){$connected_charMap="Village Oublie Mode Defense";}
elseif ($chMap==9034131){$connected_charMap="Lac des Spores Toxiques";}
elseif ($chMap==9034132){$connected_charMap="Allee de la Brume Toxique";}
elseif ($chMap==9034138){$connected_charMap="Village Endormi Mode de Defense Strategique";}
elseif ($chMap==9034139){$connected_charMap="Village Endormi Mode Defense";}
elseif ($chMap==9034201){$connected_charMap="ForÍt des Fugitifs";}
elseif ($chMap==9034202){$connected_charMap="ForÍt des Champignons givres";}
elseif ($chMap==9034208){$connected_charMap="Terre de l'Envie Mode de Defense Strategique";}
elseif ($chMap==9034209){$connected_charMap="Terre de l'Envie Mode Defense";}
elseif ($chMap==9034231){$connected_charMap="Lac du Clair de Lune";}
elseif ($chMap==9034232){$connected_charMap="Champ Gele";}
elseif ($chMap==9034238){$connected_charMap="Canyon Glace Mode de Defense Strategique";}
elseif ($chMap==9034239){$connected_charMap="Canyon Glace Mode Defense";}
elseif ($chMap==9034710){$connected_charMap="CrÍte du Poursuivant Mode Defense";}
elseif ($chMap==9034711){$connected_charMap="CrÍte du Poursuivant Mode de Defense Strategique";}
elseif ($chMap==9034720){$connected_charMap="Refuge de la Paix Mode Defense";}
elseif ($chMap==9034721){$connected_charMap="Refuge de la Paix Mode de Defense Strategique";}
elseif ($chMap==9034810){$connected_charMap="CrÍte du Verglas Mode Defense";}
elseif ($chMap==9034811){$connected_charMap="CrÍte du Verglas Mode de Defense Strategique";}
elseif ($chMap==9034820){$connected_charMap="Mine de la Griffe d'Ours Mode Defense";}
elseif ($chMap==9034821){$connected_charMap="Mine de la Griffe d'Ours Mode de Defense Strategique";}
elseif ($chMap==9036101){$connected_charMap="Village Oublie Bonus";}
elseif ($chMap==9036131){$connected_charMap="Village Endormi Bonus";}
elseif ($chMap==9036201){$connected_charMap="Terre de l'Envie Bonus";}
elseif ($chMap==9036231){$connected_charMap="Canyon Glace Bonus";}
elseif ($chMap==9036711){$connected_charMap="CrÍte du Poursuivant Bonus 1";}
elseif ($chMap==9036721){$connected_charMap="Refuge de la Paix Bonus";}
elseif ($chMap==9036811){$connected_charMap="CrÍte du Verglas Bonus";}
elseif ($chMap==9036821){$connected_charMap="Mine de la Griffe d'Ours Bonus";}
elseif ($chMap==9037101){$connected_charMap="Village Oublie Bonus";}
elseif ($chMap==9037131){$connected_charMap="Village Endormi Bonus";}
elseif ($chMap==9037201){$connected_charMap="Terre de l'Envie Bonus";}
elseif ($chMap==9037231){$connected_charMap="Canyon Glace Bonus";}
elseif ($chMap==9037711){$connected_charMap="CrÍte du Poursuivant Bonus 1";}
elseif ($chMap==9037721){$connected_charMap="Refuge de la Paix Bonus";}
elseif ($chMap==9037811){$connected_charMap="CrÍte du Verglas Bonus";}
elseif ($chMap==9037821){$connected_charMap="Mine de la Griffe d'Ours Bonus";}
elseif ($chMap==9038200){$connected_charMap="Camp d'Ellora";}
elseif ($chMap==9038300){$connected_charMap="La Brume Cendree";}
elseif ($chMap==9039711){$connected_charMap="CrÍte du Poursuivant";}
elseif ($chMap==9039712){$connected_charMap="Pont Gele";}
elseif ($chMap==9039721){$connected_charMap="Tombeau Gele";}
elseif ($chMap==9039722){$connected_charMap="Refuge de la Paix";}
elseif ($chMap==9039811){$connected_charMap="ForÍt du Verglas";}
elseif ($chMap==9039812){$connected_charMap="CrÍte du Verglas";}
elseif ($chMap==9039821){$connected_charMap="CrÍte de la Griffe d'Ours";}
elseif ($chMap==9039822){$connected_charMap="Colline de la Griffe d'Ours";}
elseif ($chMap==9039829){$connected_charMap="Alexyon";}
elseif ($chMap==9050100){$connected_charMap="Salvalon";}
elseif ($chMap==9050109){$connected_charMap="Capitaine de la Garde Jaro";}
elseif ($chMap==9050110){$connected_charMap="Lamieta";}
elseif ($chMap==9050119){$connected_charMap="Lamieta Kiyo";}
elseif ($chMap==9050120){$connected_charMap="Vallee Eruda";}
elseif ($chMap==9050200){$connected_charMap="Vallee du Dragon";}
elseif ($chMap==9050209){$connected_charMap="Vallee du Dragon Arcade elite";}
elseif ($chMap==9050210){$connected_charMap="Colline de la Serre";}
elseif ($chMap==9050220){$connected_charMap="Gorge de l'aile";}
elseif ($chMap==9050230){$connected_charMap="Le Bord du Monde";}
elseif ($chMap==9050239){$connected_charMap="Le Bord du Monde Arcade elite";}
elseif ($chMap==9050300){$connected_charMap="Autel Delabre";}
elseif ($chMap==9050301){$connected_charMap="Caverne Akia";}
elseif ($chMap==9050302){$connected_charMap="Autel Delabre";}
elseif ($chMap==9050400){$connected_charMap="Autel Sombre";}
elseif ($chMap==9050401){$connected_charMap="Repaire de la Griffe Noire";}
elseif ($chMap==9050402){$connected_charMap="Lobby de la Salle des Dimensions";}
elseif ($chMap==9050510){$connected_charMap="Colline du Mirage";}
elseif ($chMap==9050520){$connected_charMap="Mer de Sable";}
elseif ($chMap==9050529){$connected_charMap="Mer de Sable Arcade elite";}
elseif ($chMap==9050530){$connected_charMap="No Man's Land";}
elseif ($chMap==9050539){$connected_charMap="No Man's Land Arcade elite";}
elseif ($chMap==9050600){$connected_charMap="Noyau du Drone";}
elseif ($chMap==9050601){$connected_charMap="Delta du Renard Rouge";}
elseif ($chMap==9050610){$connected_charMap="Mont Vartika";}
elseif ($chMap==9050619){$connected_charMap="Cocorico";}
elseif ($chMap==9050620){$connected_charMap="Gorge des Banshees";}
elseif ($chMap==9052109){$connected_charMap="Capitaine de la Garde Jaro";}
elseif ($chMap==9052119){$connected_charMap="Lamieta Kiyo";}
elseif ($chMap==9052209){$connected_charMap="Vallee du Dragon Chaos elite";}
elseif ($chMap==9052239){$connected_charMap="Le Bord du Monde Chaos elite";}
elseif ($chMap==9052529){$connected_charMap="Mer de Sable Chaos elite";}
elseif ($chMap==9052539){$connected_charMap="No Man's Land Chaos elite";}
elseif ($chMap==9052619){$connected_charMap="Cocorico";}
elseif ($chMap==9054100){$connected_charMap="Salvalon Mode Defense";}
elseif ($chMap==9054110){$connected_charMap="Lamieta Mode Defense";}
elseif ($chMap==9054200){$connected_charMap="Vallee du Dragon Mode Defense";}
elseif ($chMap==9054201){$connected_charMap="Vallee du Dragon Mode de Defense Strategique";}
elseif ($chMap==9054230){$connected_charMap="Le Bord du Monde Mode Defense";}
elseif ($chMap==9054610){$connected_charMap="Mont Vartika Mode Defense";}
elseif ($chMap==9056101){$connected_charMap="Salvalon Bonus";}
elseif ($chMap==9056111){$connected_charMap="Lamieta Bonus";}
elseif ($chMap==9056201){$connected_charMap="Vallee du Dragon Bonus";}
elseif ($chMap==9056231){$connected_charMap="Le Bord du Monde Bonus";}
elseif ($chMap==9056521){$connected_charMap="Mer de Sable Bonus";}
elseif ($chMap==9056531){$connected_charMap="No Man's Land Bonus";}
elseif ($chMap==9056611){$connected_charMap="Mont Vartika Bonus";}
elseif ($chMap==9057101){$connected_charMap="Salvalon Bonus";}
elseif ($chMap==9057111){$connected_charMap="Lamieta Bonus";}
elseif ($chMap==9057201){$connected_charMap="Vallee du Dragon Bonus";}
elseif ($chMap==9057231){$connected_charMap="Le Bord du Monde Bonus";}
elseif ($chMap==9057521){$connected_charMap="Mer de Sable Bonus";}
elseif ($chMap==9057531){$connected_charMap="No Man's Land Bonus";}
elseif ($chMap==9057611){$connected_charMap="Mont Vartika Bonus";}
elseif ($chMap==9058100){$connected_charMap="Village Kazeura";}
elseif ($chMap==9059101){$connected_charMap="Salvalon 1er scenario";}
elseif ($chMap==9059102){$connected_charMap="Salvalon 2nd scenario";}
elseif ($chMap==9059111){$connected_charMap="Lamieta 1er scenario";}
elseif ($chMap==9059112){$connected_charMap="Lamieta 2nd scenario";}
elseif ($chMap==9059201){$connected_charMap="Vallee du Dragon 1er scenario";}
elseif ($chMap==9059202){$connected_charMap="Vallee du Dragon 2nd scenario";}
elseif ($chMap==9059209){$connected_charMap="Vallee du Dragon - Prokell";}
elseif ($chMap==9059231){$connected_charMap="Le Bord du Monde 1er scenario";}
elseif ($chMap==9059232){$connected_charMap="Le Bord du Monde 2nd scenario";}
elseif ($chMap==9059239){$connected_charMap="Le Bord du Monde - Kashape";}
elseif ($chMap==9059611){$connected_charMap="Mont Vartika 1er scenario";}
elseif ($chMap==9059612){$connected_charMap="Mont Vartika 2nd scenario";}
elseif ($chMap==9710100){$connected_charMap="Esprit de Glace elite";}
elseif ($chMap==9710101){$connected_charMap="Esprit de Glace elite";}
elseif ($chMap==9710200){$connected_charMap="Esprit de Feu elite";}
elseif ($chMap==9710201){$connected_charMap="Esprit de Feu elite";}
elseif ($chMap==9710300){$connected_charMap="Esprit Sombre elite";}
elseif ($chMap==9710301){$connected_charMap="Esprit Sombre elite";}
elseif ($chMap==9710400){$connected_charMap="Esprit de Nature elite";}
elseif ($chMap==9710401){$connected_charMap="Esprit de Nature elite";}
elseif ($chMap==9850400){$connected_charMap="Garnison du Repaire de la Griffe Noire";}
elseif ($chMap==9910100){$connected_charMap="Tutoriel pour Guerrier";}
elseif ($chMap==9920101){$connected_charMap="Zone des Woodie";}
elseif ($chMap==9920102){$connected_charMap="Pic de la CrÍte du Fourbe";}
elseif ($chMap==9920103){$connected_charMap="Zone CÙtiËre";}
elseif ($chMap==9920104){$connected_charMap="Pic de la Vallee du Heros";}
elseif ($chMap==9920105){$connected_charMap="Zone du Souffle du Demon";}
elseif ($chMap==9920106){$connected_charMap="Zone des Marais Ardents";}
elseif ($chMap==9920107){$connected_charMap="Jardin de jeu";}
elseif ($chMap==9920108){$connected_charMap="Zone du Sanctuaire";}
elseif ($chMap==9920109){$connected_charMap="Cour de Fungoid";}
elseif ($chMap==9920110){$connected_charMap="Zone d'Ellora";}
elseif ($chMap==9920111){$connected_charMap="Zone de Drakos";}
elseif ($chMap==9920201){$connected_charMap="Rempart de l'Apocalypse";}
elseif ($chMap==9920202){$connected_charMap="Coeur Ardent";}
elseif ($chMap==9920203){$connected_charMap="Ceinture de Magma";}
elseif ($chMap==9920204){$connected_charMap="Labyrinthe Mysterieux";}
elseif ($chMap==9920301){$connected_charMap="Bataille du Lac Gele";}
elseif ($chMap==9920302){$connected_charMap="Colline de l'Empereur";}
elseif ($chMap==9920400){$connected_charMap="Chez Jack";}
elseif ($chMap==9920500){$connected_charMap="Assise du Lac de Rosee";}
elseif ($chMap==9930100){$connected_charMap="Bataille d'Emporia Kanath";}
elseif ($chMap==9930101){$connected_charMap="Bataille d'Emporia Kanath";}
elseif ($chMap==9930200){$connected_charMap="La Defense des Dragon";}
elseif ($chMap==9930210){$connected_charMap="Guerre de Defense des Dragons";}
elseif ($chMap==9940101){$connected_charMap="Dragon de feu - Zone de Capture du drapeau";}
elseif ($chMap==9940110){$connected_charMap="Dragon d'eau - Zone de Capture du drapeau";}
elseif ($chMap==9950101){$connected_charMap="Plaine de Hururu";}
elseif ($chMap==9950301){$connected_charMap="Jardin Botanique Hururu";}
elseif ($chMap==9960100){$connected_charMap="ArËne de l'abysse";}
elseif ($chMap==9970100){$connected_charMap="Tour des murmures";}
elseif ($chMap==9970300){$connected_charMap="Maison Hantee";}
elseif ($chMap==9990101){$connected_charMap="Chambre du Temps";}
elseif ($chMap==9990102){$connected_charMap="Chambre de l'Obscurite";}
elseif ($chMap==9990103){$connected_charMap="La Taverne des MaÓtres de Jeu";}
elseif ($chMap==9990200){$connected_charMap="Ferme du Vent";}
elseif ($chMap==9991001){$connected_charMap="MaMaison";}
elseif ($chMap==9015701){$connected_charMap="Palais des Glaces - Vallee immaculee";}
elseif ($chMap==9015709){$connected_charMap="Palais des Glaces - Vallee immaculee - Elite";}
elseif ($chMap==9015711){$connected_charMap="Palais des Glaces - Jardin des rÍves";}
elseif ($chMap==9015719){$connected_charMap="Palais des Glaces - Jardin des rÍves - Elite";}
elseif ($chMap==9015721){$connected_charMap="Palais des Glaces - Porte du Silence";}
elseif ($chMap==9015722){$connected_charMap="Palais des Glaces - Corridor glace";}
elseif ($chMap==9015723){$connected_charMap="Palais des Glaces - Chambre de la Reine";}
elseif ($chMap==9015700){$connected_charMap="Palais des Glaces - Mur de Glace";}
elseif ($chMap==9012100){$connected_charMap="CÙte obscure des Baleines";}
elseif ($chMap==9012109){$connected_charMap="Villa obscure du Capitaine Hookah";}
elseif ($chMap==9012130){$connected_charMap="Port Steven Obscur";}
elseif ($chMap==9012139){$connected_charMap="Capitaine Alvida obscure et furieuse";}
elseif ($chMap==9012150){$connected_charMap="Flotte obscure de Kalygon";}
elseif ($chMap==9012159){$connected_charMap="Kalygon obscur en Furie";}
elseif ($chMap==9012200){$connected_charMap="Sanctuaire obscur de Mirinae";}
elseif ($chMap==9012209){$connected_charMap="Esprit du Faucheur";}
elseif ($chMap==9012212){$connected_charMap="Sanctuaire obscur de Skippy";}
elseif ($chMap==9012219){$connected_charMap="Esprit Malefique, le MaÓtre de la Mort";}
elseif ($chMap==9012600){$connected_charMap="Caverne obscure des Dangers";}
elseif ($chMap==9012609){$connected_charMap="Obscur Raton Laveur Mambo Atoo";}
elseif ($chMap==9022100){$connected_charMap="Souffle obscur du Demon";}
elseif ($chMap==9022109){$connected_charMap="Obscur Chef Rocker";}
elseif ($chMap==9022300){$connected_charMap="Marais Ardents obscurs";}
elseif ($chMap==9022309){$connected_charMap="Obscure Reine Vella";}
elseif ($chMap==9022430){$connected_charMap="Colline aux Pins obscure";}
elseif ($chMap==9022439){$connected_charMap="Obscur Homme des bois Burnan";}
elseif ($chMap==9022500){$connected_charMap="Sanctuaire des Dieux delaisse";}
elseif ($chMap==9022509){$connected_charMap="Karkarous";}
elseif ($chMap==9032719){$connected_charMap="CrÍte du Poursuivant Chaos elite";}
elseif ($chMap==9032710){$connected_charMap="CrÍte obscure du Poursuivant";}
elseif ($chMap==9032720){$connected_charMap="Refuge obscur de la Paix";}
elseif ($chMap==9032810){$connected_charMap="CrÍte obscure du Verglas";}
elseif ($chMap==9032819){$connected_charMap="CrÍte du Verglas elite";}
elseif ($chMap==9032820){$connected_charMap="Mine obscure de la Griffe d'Ours";}
elseif ($chMap==9032100){$connected_charMap="Village obscur Oublie";}
elseif ($chMap==9032132){$connected_charMap="Village obscur Endormi";}
elseif ($chMap==9032139){$connected_charMap="Burlune le Vacillant";}
elseif ($chMap==9032200){$connected_charMap="Terre obscure de l'Envie";}
elseif ($chMap==9032209){$connected_charMap="Golem de Pythanuth";}
elseif ($chMap==9032232){$connected_charMap="Canyon Glace";}
elseif ($chMap==9032239){$connected_charMap="Princesse des Glaces Arka";}
elseif ($chMap==9052610){$connected_charMap="Mont Vartika obscur";}
elseif ($chMap==9052110){$connected_charMap="Obscure Lamieta";}
elseif ($chMap==9052100){$connected_charMap="Obscur Salvalon";}
elseif ($chMap==9052200){$connected_charMap="Vallee obscure du Dragon Bonus";}
elseif ($chMap==9052230){$connected_charMap="Le Bord obscur du Monde";}
elseif ($chMap==9032729){$connected_charMap="Refuge de la Paix elite";}
elseif ($chMap==9038100){$connected_charMap="Sky Garden";}
elseif ($chMap==9040100){$connected_charMap="La voie Celeste";}
elseif ($chMap==9032829){$connected_charMap="Mine de la Griffe d'Ours elite";}
elseif ($chMap==9980110){$connected_charMap="Belier";}
elseif ($chMap==9980111){$connected_charMap="Belier";}
elseif ($chMap==9980120){$connected_charMap="ID_9980120";}
elseif ($chMap==9980121){$connected_charMap="ID_9980121";}
elseif ($chMap==9980130){$connected_charMap="Gemeaux";}
elseif ($chMap==9980131){$connected_charMap="Gemeaux";}
elseif ($chMap==9980140){$connected_charMap="ID_9980140";}
elseif ($chMap==9980141){$connected_charMap="ID_9980141";}
elseif ($chMap==9980150){$connected_charMap="Lion";}
elseif ($chMap==9980151){$connected_charMap="Lion";}
elseif ($chMap==9980160){$connected_charMap="ID_9980160";}
elseif ($chMap==9980161){$connected_charMap="ID_9980161";}
elseif ($chMap==9980170){$connected_charMap="ID_9980170";}
elseif ($chMap==9980171){$connected_charMap="ID_9980171";}
elseif ($chMap==9980180){$connected_charMap="ID_9980180";}
elseif ($chMap==9980181){$connected_charMap="ID_9980181";}
elseif ($chMap==9980190){$connected_charMap="Sagittaire";}
elseif ($chMap==9980191){$connected_charMap="Sagittaire";}
elseif ($chMap==9980200){$connected_charMap="ID_9980200";}
elseif ($chMap==9980201){$connected_charMap="ID_9980201";}
elseif ($chMap==9980300){$connected_charMap="ID_9980300";}
elseif ($chMap==9980301){$connected_charMap="ID_9980301";}
elseif ($chMap==9600300){$connected_charMap="Metro City";}
elseif ($chMap==9600200){$connected_charMap="Temple des Heros";}
elseif ($chMap==0){$connected_charMap="Not Location";}

?>
           <TR>
           <TD><?php print"$connected_charClass";?></TD>
		   <TD><?php print"$connected_charName";?></TD>
           <TD><?php print"$connected_charLevel";?></TD>
           <TD><?php print"$connected_charMap";?></TD>
           <TD><?php print"$connected_charMoney";?></TD>
           </TR>
<?php
} // Fermeture de la boucle 
$realm_requÍte->closeCursor(); // On ferme la connexion PDO, pour eviter les problËmes
?>
</TABLE></div>
</td>
</tr>
</table>
<?php endif;?>
<?php if($gm_task==1):?>
<?php @include("includes/GM_news.php"); ?>
<?php endif; ?>
<?php if($gm_task==2):?>
<?php @include("includes/GM_admin.php"); ?>
<?php endif; ?>
<?php if($gm_task==3):?>
<?php @include("includes/GM_event.php"); ?>
<?php endif; ?>

