<?php
require("cycliste.php");

$c = new Cycliste();


echo"
<html>
<head>
<meta http-equiv='Content-Type' content='text/html'  charset='utf-8'/>
<title>Cyclistes</title>
<link rel='stylesheet' href='style.css' media='screen'/>
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
background-image:url('patt.png');
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

<div id='banner'> 
<img id='logo' src='logo.png'/>
<img id='logo2' src='logo2.png'/>
<input id='rech' type='text' placeholder='What is on your mind ?' /> 
<a href='#'><img id='rechlogo' src='rechlogo.png'/> </a>
</div>
	  	  <form method='post' action='cyc.php'>
	  <div id ='c1'><input type='submit' value='AfficherTout' id ='b1' name='liste'/></div> 
	  <div id ='c2'><input type='submit' value='Selection' id ='b2' name='select'/></div> 
	  <div id ='c3'><input type='submit' value='Ajouter' id ='b3' name='ajout'/></div> 
	  <div id ='c4'><input type='submit' value='Modifier' id ='b4' name='modifier'/></div> 
	  <div id ='c5'><input type='submit' value='Supprimer' id ='b5' name='supprimer'/></div>
	  </form>
	  	  <div id ='c6'><a href='index.php'> Home </a></div>
		  <br> <br> 
		  <div id=main2>
		  <p align='center' style='font-size:20px;'> CYCLISTES </p>
          </div>

";

	  /* L'affichage des cyclistes */
if(isset($_POST['liste']))
{
$t1=$c->getAll(); 
echo "<div id=main2>";
echo "<p align='center' style='font-size:20px;'> Liste des cyclistes </p>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Nom</td><td>Prenom</td><td>Age</td><td>Nationalite</td><td>Equipe</td></table>";
      foreach ($t1 as $cc) {echo $cc;}
      echo"</div>";
}	  
	  /* L'ajout d'un cycliste */

if(isset($_POST['ajout']))
{
echo "<br><br><div id=main2>";
echo "<p align='center' style='font-size:20px;'> Insertion d'un cyclistes </p>";
	echo "<p  style='font-size:16px;'> Entrer les données à insérer </p>";
	echo" <form method='post' action='cyc.php'> 
	  <label>Id </label> <br><input id='txt' type='text' name='id_cyc' required/> 
	  <br><label>Nom </label> <br><input id='txt'  type='text' name='nom_cyc' required/> 
	  <br><label>Prenom </label> <br> <input id='txt'  type='text' name='prenom_cyc' required//> 
      <br><label>Date de naissance </label> <br><input id='txt'  type='text' name='datenaissance_cyc' required/> 
	  <br><label>Nationalité </label> <br><input id='txt'  type='text' name='nationalite_cyc'required/> 
	  <br><label>Equipe </label> <br><input id='txt'  type='text' name='id_equipe' required/> 
	  <br><br><input type='submit' value='Ajouter' name='ajouter'/> 
	  </form>
	  </div>";
}
if(isset($_POST['ajouter']))
{
$c->id_cyc=$_POST['id_cyc'];
$c->nom_cyc=$_POST['nom_cyc'];
$c->prenom_cyc=$_POST['prenom_cyc'];
$c->datenaissance_cyc=$_POST['datenaissance_cyc'];
$c->nationalite_cyc=$_POST['nationalite_cyc'];
$c->id_equipe=$_POST['id_equipe'];

$c->ins();
$t1=$c->getAll(); 
echo "<br><br><div id=main2>";
echo "<br><p align='center'> Insertion reussie <br> Voila la nouvelle table </p><br>";
echo"<table align='center'  font-weight='bold' id='m'><td>Id</td><td>Nom</td><td>Prenom</td><td>Age</td><td>Nationalite</td><td>Equipe</td></table>";
      foreach ($t1 as $cc) {echo $cc;}
      echo"</div>";}

	/* Suppression d'un cycliste */
	
	if(isset($_POST['supprimer']))
{
	echo "<br><br><div id=main2>";
	echo "<p align='center' style='font-size:20px;'> Suppression d'un cyclistes </p>";
	echo "<p  style='font-size:16px;'> Entrer l'identificateur du cycliste </p>";
	echo" <form method='post' action='cyc.php'> 
	  <label>Id </label> <br><input id='txt' type='text' name='id_cyc'/> 
	  <br><br><input type='submit' value='Supprimer' name='supp'/> 
	  </form>";
	        echo"</div>";
}
	if(isset($_POST['supp']))
{
$c->id_cyc=$_POST['id_cyc'];
$c->sup();
$t1=$c->getAll(); 
echo "<br><br><div id=main2>";
echo "<br><p align='center'> Suppression réussie <br> Voila la nouvelle table </p><br>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Nom</td><td>Prenom</td><td>Age</td><td>Nationalite</td><td>Equipe</td></table>";
      foreach ($t1 as $cc) {echo $cc;}
      echo"</div>";}
	  
	 /* modification sur un cycliste */
		
		if(isset($_POST['modifier']))
{
	echo "<br><br><div id=main2>";
	echo "<p align='center' style='font-size:20px;'> Modification d'un cycliste </p>";
	echo "<p  style='font-size:16px;'> Saisissez les données à modifier </p>";
echo" <form method='post' action='cyc.php'> 
	  <label>Id </label> <br><input id='txt' type='text' name='id_cyc' required/> 
	  <br><label>Nom </label> <br><input id='txt'  type='text' name='nom_cyc'/> 
	  <br><label>Prenom </label> <br> <input id='txt'  type='text' name='prenom_cyc'/> 
      <br><label>Date de naissance </label> <br><input id='txt'  type='text' name='datenaissance_cyc'/> 
	  <br><label>Nationalité </label> <br><input id='txt'  type='text' name='nationalite_cyc'/> 
	  <br><label>Equipe </label> <br><input id='txt'  type='text' name='id_equipe'/> 
	  <br><br><input type='submit' value='Modifier' name='mod'/> 
	  </form>";
	        echo"</div>";
}
	if(isset($_POST['mod']))
{
$c->id_cyc=$_POST['id_cyc'];
$c->nom_cyc=$_POST['nom_cyc'];
$c->prenom_cyc=$_POST['prenom_cyc'];
$c->datenaissance_cyc=$_POST['datenaissance_cyc'];
$c->nationalite_cyc=$_POST['nationalite_cyc'];
$c->id_equipe=$_POST['id_equipe'];
$c->upd();

$t1=$c->getAll(); 
echo "<br><br><div id=main2>";
echo "<br><p align='center'> Modification réussie <br> Voila la nouvelle table </p><br>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Nom</td><td>Prenom</td><td>Age</td><td>Nationalite</td><td>Equipe</td></table>";
      foreach ($t1 as $cc) {echo $cc;}
      echo"</div>";}
	  
	  	 /* affichage du nom de cycliste en entrant son id */
if(isset($_POST['select']))
{
	echo "<br><br><div id=main2>";
	echo "<p align='center' style='font-size:20px;'> Affichage d'un cycliste particulier </p>";
	echo "<p  style='font-size:16px;'> Entrer l'identificateur du cycliste </p>";
echo" <form method='post' action='cyc.php'> 
	  <label>Id </label> <br><input id='txt' type='text' name='id_cyc' required/> 
	  <br><br><input type='submit' value='Afficher nom' name='sel'/> 
	  </form>";
	        echo"</div>";
}
	if(isset($_POST['sel']))
{
$c->id_cyc=$_POST['id_cyc'];
$s=$c->sel($c->id_cyc);
echo "<br><br><div id=main2>";
echo"<table align='center' font-weight='bold' id='m'><td>Id</td><td>Nom</td><td>Prenom</td><td>Age</td><td>Nationalite</td><td>Equipe</td></table>";
      echo $s;

	  echo"</div>";
}	  
	  echo"</div>";

"	  </body>
	  </html>";


?>
