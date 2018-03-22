<?php
require("etape.php");

$c = new Etape();


echo"
<html>
<head>
<meta http-equiv='Content-Type' content='text/html'  charset='utf-8'/>
<title>Etapes</title>
<link rel='stylesheet' href='styl.css'  media='screen'/>
</head>
<style>
@font-face {
    font-family: Advent pro;
    src: url(AdventPro.ttf);
}

body
{
margin:0;
background-color:#EEF2F2;
font-family: Advent pro;
}

#b1, #b2, #b3, #b4, #b5
{
margin-top:0px;
border:none;
border-radius:0 0 10px 10px;
display:inline-block;
width:100px;
height:50px;
background-color:#273043;
border-bottom:none;
color:#EEF2F2;
font-family: Advent pro;
font-size:18px;

}
#b1:hover
{
background-color:#0e5286;
}
#b2:hover,#b3:hover,#b4:hover
{
background-color:#1b461a;
}

#b5:hover
{
background-color:#7c2b2b;
}

#main2
{
border: 1px solid gray;
margin-left:29.4%;
width:515px;
padding:10px;
background-color:#EEF2F2;
box-shadow: 5px 10px 18px #888888;
margin-bottom:50px;
}


td, th
{
width:100px;
border-bottom:1px solid gray;
border-right:1px solid black;
}
#l
{
border-left:1px solid black;
}

#m
{
border-top:1px solid black;
border-left:1px solid black;
color:red;
}

#main2, #main3
{
display:inline-block;
}
#c1
{
margin-left:26%;

}
#c1, #c2, #c3, #c4, #c5
{
display:inline-block;
text-align:center;
}
#c6
{
background-color:#c1980a;
width:100px;
height:35px;
border:none;
border-radius:0 0 10px 10px;
position:absolute;
top:109px;
left:65%;
color:#273043;
font-family: Advent pro;
font-size:18px;
text-align:center;
padding-top:15px;
}
a
{
text-decoration:none;
}
a:visited
{color:white;
}
#banner
{
margin-top:-20px;
padding-top:10px;
background-color:#142326;
width:100%;
height:100px;
color:white;
}
#logo
{
opacity:0.5;
width:100px;
height:84px;
margin-left:50px;
margin-bottom:10px;
}
#logo:hover
{
opacity:1;
}
#logo2
{
margin-left:100px;
opacity:0.5;
}
#rech 
{
position: absolute;
top:70px;
height:32px;
right:60px;
background-color:#232b2d;
border:1px solid #3e494c;
border-right:none;
color:gray;
padding-left:10px;
background-image:url('rechlogo.png') no-repeat;
}
#rech:focus 
{
border:none;
 border-radius:5px 5px 0 0;
 box-shadow: 0 0 10px #719ECE;
 
 }
#rechlogo
{
height:30px;
border:1px solid #3e494c;
border-left:none;
position: absolute;
top:70px;
right:30px;
#rechlogo:hover 
{
background-image:url('rechlogo_h.png');
}

</style>
<body>
";
echo"
<div id='banner'> 
<img id='logo' src='logo.png'/>
<img id='logo2' src='logo2.png'/>
<input id='rech' type='text' placeholder='What is on your mind ?' /> 
<a href='#'><img id='rechlogo' src='rechlogo.png'/> </a>
</div>
	  	  <form method='post' action='et.php'>
	  <div id ='c1'><input type='submit' value='AfficherTout' id ='b1' name='liste'/></div> 
	  <div id ='c2'><input type='submit' value='Selection' id ='b2' name='select'/></div> 
	  <div id ='c3'><input type='submit' value='Ajouter' id ='b3' name='ajout'/></div> 
	  <div id ='c4'><input type='submit' value='Modifier' id ='b4' name='modifier'/></div> 
	  <div id ='c5'><input type='submit' value='Supprimer' id ='b5' name='supprimer'/></div>
	  </form>
	  	  	  	  <div id ='c6'><a href='index.php'> Home </a></div>
				  <br> <br> 
		  <div id=main2>
		  <p align='center' style='font-size:20px;'> E T A P E S </p>
          </div>

	  ";

	  /* L'affichage des etapes */
if(isset($_POST['liste']))
{
$t1=$c->getAll(); 
echo "<br><br><div id=main2>";
echo "<p align='center' style='font-size:20px;'> Liste des étapes </p>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Type</td><td>Depart</td><td>Arrivé</td><td>Distance</td></table>";
      foreach ($t1 as $cc) {echo $cc;}
      echo"</div>";
}	  
	  /* L'ajout d'une etape */

if(isset($_POST['ajout']))
{
echo "<br><br><div id=main2>";
echo "<p align='center' style='font-size:20px;'> Insertion d'une étape </p>";
echo "<p  style='font-size:16px;'> Entrer les données à insérer </p>";
echo" <form method='post' action='et.php'> 
	  <br><label>Id </label> <br><input id='txt' type='text' name='id_etape' required/> 
	  <br><label>Type </label> <br><select style='width:173px; color:gray;'  name='type_etape' required><option id='txt'  value='La montagne'/>la montagne</option>
															 <option id='txt'  value='Laccidentee'/>l'accidenté</option>
															 <option id='txt'  value='La plaine'/>la plaine</option>
															 <option id='txt'  value='Contre la montre'/>Contre la montre</option>
								   </select>
	  <br><label>Lieu Depart </label> <br> <input id='txt'  type='text' name='lieu_depart' required/> 
      <br><label>Lieu Arrivé </label> <br><input id='txt'  type='text' name='lieu_arrive' required/> 
	  <br><label>Distance </label> <br><input id='txt'  type='text' name='distance_gen' required/> 
	  <br><br><input type='submit' value='Ajouter' name='ajouter'/> 
	  </form>
	  </div>";
}
if(isset($_POST['ajouter']))
{
$c->id_etape=$_POST['id_etape'];
$c->type_etape=$_POST['type_etape'];
$c->lieu_depart=$_POST['lieu_depart'];
$c->lieu_arrive=$_POST['lieu_arrive'];
$c->distance_gen=$_POST['distance_gen'];

$c->ins();
$t1=$c->getAll(); 

echo "<br><br><div id=main2>";
echo "<br><p align='center'> Insertion reussie <br> Voila la nouvelle table </p><br>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Type</td><td>Depart</td><td>Arrivé</td><td>Distance</td></table>";
      foreach ($t1 as $cc) {echo $cc;}
      echo"</div>";}

	/* Suppression d'un cycliste */
	
	if(isset($_POST['supprimer']))
{
	echo "<br><br><div id=main2>";
	echo "<p align='center' style='font-size:20px;'> Suppression d'une étape </p>";
echo "<p  style='font-size:16px;'> Entrer les données à supprimer </p>";
echo" <form method='post' action='et.php'> 
	  <br><label>Id </label> <br><input id='txt' type='text' name='id_etape' required/> 
	  <br><br><input type='submit' value='Supprimer' name='supp'/> 
	  </form></div>";
}
	if(isset($_POST['supp']))
{
$c->id_etape=$_POST['id_etape'];
$c->sup();
$t1=$c->getAll(); 
echo "<br><br><div id=main2>";
echo "<br><p align='center'> Suppression reussie <br> Voila la nouvelle table </p><br>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Type</td><td>Depart</td><td>Arrivé</td><td>Distance</td></table>";
      foreach ($t1 as $cc) {echo $cc;}
      echo"</div>";}
	  
	 /* modification d'une etape */
		
		if(isset($_POST['modifier']))
{
	echo "<br><br><div id=main2>";
	echo "<p align='center' style='font-size:20px;'> Modification d'une étape </p>";
echo "<p  style='font-size:16px;'> Entrer les données à modifier </p>";
echo" <form method='post' action='et.php'> 
	 <br><label>Id </label> <br><input id='txt' type='text' name='id_etape' required/> 
	  <br><label>Type </label> <br><select style='width:173px; color:gray;' name='type_etape' required><option id='txt'  value='La montagne'/>la montagne</option>
															 <option id='txt'  value='Laccidentee'/>l'accidenté</option>
															 <option id='txt'  value='La plaine'/>la plaine</option>
															 <option id='txt'  value='Contre la montre'/>Contre la montre</option>
								   </select>
	  <br><label>Lieu Depart </label> <br> <input id='txt'  type='text' name='lieu_depart' required/> 
      <br><label>Lieu Arrivé </label> <br><input id='txt'  type='text' name='lieu_arrive' required/> 
	  <br><label>Distance</label> <br><input id='txt'  type='text' name='distance_gen' required/> 
	  <br><br><input type='submit' value='Modifier' name='mod'/> 
	  </form></div>";
}
	if(isset($_POST['mod']))
{
$c->id_etape=$_POST['id_etape'];
$c->type_etape=$_POST['type_etape'];
$c->lieu_depart=$_POST['lieu_depart'];
$c->lieu_arrive=$_POST['lieu_arrive'];
$c->distance_gen=$_POST['distance_gen'];
$c->upd();

$t1=$c->getAll(); 
echo "<br><br><div id=main2>";
echo "<br><p align='center'> Modification reussie <br> Voila la nouvelle table </p><br>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Type</td><td>Depart</td><td>Arrivé</td><td>Distance</td></table>";
      foreach ($t1 as $cc) {echo $cc;}
      echo"</div>";}
	  
	  	 /* affichage du nom de cycliste en entrant son id */
if(isset($_POST['select']))
{
	echo "<br><br><div id=main2>";
	echo "<p align='center' style='font-size:20px;'> Affichage d'une étape </p>";
echo "<p  style='font-size:16px;'> Entrer l'identificateur de l'étape </p>";
echo" <form method='post' action='et.php'> 
	 <br><label>Id </label> <br><input id='txt' type='text' name='id_etape' required/> 
	  <br><br><input type='submit' value='Afficher nom' name='sel'/> 
	  </form></div>";
}
	if(isset($_POST['sel']))
{
$c->id_etape=$_POST['id_etape'];
$s=$c->sel($c->id_etape);
echo "<br><br><div id=main2>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Type</td><td>Depart</td><td>Arrivé</td><td>Distance</td></table>";
      echo $s;

	  echo"</div>";}
?>