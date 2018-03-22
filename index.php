<?php 

echo
"
<html>
<head>
</head>
<style>
@font-face {
    font-family: Advent pro;
    src: url(AdventPro.ttf);
}
@font-face {
    font-family: WC Mano Negra Bta;
    src: url(WC.ttf);
}
body
{
margin:0;
background-color:#273043;
background-image:url('patt.png');
font-family: Advent pro;
}


#categories2
{
margin-top:-30px;

}

#cyclistes, #equipes, #etapes, #results
{
display:inline-block;
margin:20px;

}
#cyclistes img, #equipes img, #etapes img, #results img
{
width:200px;
height:200px;
opacity:0.7;
}
#cyclistes img:hover, #equipes img:hover, #etapes img:hover, #results img:hover
{
opacity:1;
}

#cyclistes2, #equipes2, #etapes2, #results2
{
display:inline-block;
margin:20px;

}
#cyclistes2 img, #equipes2 img, #etapes2 img, #results2 img
{
width:200px;
height:70px;
}

a
{
text-decoration:none;
}

#banner
{
padding-top:10px;
background-color:#142326;
width:100%;
height:100px;
color:white;
}
#footer
{
margin-top:50px;
padding-top:10px;
background-color:#142326;
width:100%;
height:110px;
color:white;
}
#logo
{
opacity:0.5;
width:100px;
height:84px;
margin-left:70px;
margin-bottom:10px;
}
#logo:hover
{
opacity:1;
}
#logo2
{
margin-top:-95px;
display:block;
margin-left:auto;
margin-right:auto;
opacity:0.5;
}
#logo2f
{
margin-left:35%;
opacity:0.7;
}
#logo2f:hover
{
opacity:1;
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
}
#rechlogo:hover 
{
background-image:url('rechlogo_h.png');
}
#gallery
{
text-align:center;
margin-top:50px;
margin-bottom:50px;
}
#a
{
border:5px solid white;
width:600px;
height:400px;
background-color:white;
}
#a1 
{
border-bottom:5px solid white;
width:600px;
height:200px;
background-color:gray;
background-image:url('a1.jpg');
background-size: 600px 200px;

}

#a2
{
width:600px;
height:195px;
background-color:white;
background-image:url('a21.jpg');
    background-size: 600px 200px;

}
#a21
{

width:295px;
height:195px;
background-color:yellow;
background-image:url('a22.jpg');
    background-size: 295px 195px;

}

#b
{
border:5px solid white;
margin-left:5px;
width:200px;
height:400px;
background-color:green ;
background-image:url('b.jpeg');
background-size: 200px 400px;
}

#a, #a1, #a21, #a2 ,#b
{
opacity:0.9;

}
#a:hover, #a1:hover, #a21:hover, #a2:hover ,#b:hover
{
opacity:1;
 box-shadow: 0 0 10px #719ECE;

}
#a, #b
{
display:inline-block;
}
#title
{
font-family:WC Mano Negra Bta;
text-shadow: 1px 1px yellow;
font-size:60px;
text-align:center;
color: white;
}
#butt
{
text-align:center;

margin-bottom:50px;
}

</style>

<body>

<div id='banner'> 
<img id='logo' src='logo.png'/>
<img id='logo2' src='logo2.png'/>
<input id='rech' type='text' placeholder='What is on your mind ?' /> 
<a href='#'><img id='rechlogo' src='rechlogo.png'/> </a>
</div>

<div id='title' > <p> LE TOUR DE FRANCE </p> </div>
<div id='gallery'>
<div id='a'> 
		<div id='a1'> </div>
		<div id='a2'> 
				<div id='a21'> </div>
				<div id='a22'> </div>
		</div>
</div>

<div id='b'>
</div>
</div>

<div id='butt'>

<div id='categories'> 
<div id='cyclistes'> <a href='cyc.php'> <img src='c1.png'/></a> </div>
<div id='equipes'>   <a href='eq.php'>  <img src='eq.png'/></a> </div>
<div id='etapes'>    <a href='et.php'>  <img src='et.png'/></a> </div>
<div id='results'>   <a href='p.php'>   <img src='rs.png'/></a> </div>
</div>

<div id='categories2'> 
<div id='cyclistes2'> <img src='c2.png' /> </div>
<div id='equipes2'>	  <img src='eq2.png'/> </div>
<div id='etapes2'>    <img src='et2.png'/> </div>
<div id='results2'>   <img src='rs2.png'/> </div>
</div>

</div>

<div id='footer'> 
<img id='logo2f' src='soc.png'/>
</div>

</body>
</html> 
";



?> 