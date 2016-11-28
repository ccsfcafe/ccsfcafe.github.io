<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/headerStyle.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/legendStyle.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/layoutStyle.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/adminStyle.css" rel="stylesheet" type="text/css">
	<script src="../assets/js/adminScript.js"></script>
    <title>CCSF Cafeteria</title>
    <!-- this document resides in admin folder -->
</head>



<body>
    <div class="header">
        <div class="logo">
            <img src="../assets/img/logoCCSFCafeteria.png" alt="">
        </div>
    </div>

    
  <div class="nav-Admin-Update-Menu">
    <ul>
      <li><a href="index.html">Log Out</a></li>
    </ul>
  </div>
  
	<hr>
	<h1>Cafeteria Menu</h1>
	<form method="POST" class="Admin">
		<h2 id="date-header">
<?php
$debugFlags=false;
date_default_timezone_set('America/Los_Angeles');
if(empty($_COOKIE['Offset'])){
    $_POST['Offset']='0';
}else{
	$_POST['Offset']=$_COOKIE['Offset'];
}
if($_POST['Yesterday']=="Yesterday"){
    $_POST['Offset']=$_POST['Offset']-1;
}else if($_POST['Tomorrow']=="Tomorrow"){
    $_POST['Offset']=$_POST['Offset']+1;
}
setcookie('Offset',$_POST['Offset']);
$specialTime= mktime(0, 0, 0, date("m")  , date("d")+$_POST['Offset'], date("Y"));
echo date("l, F j, Y",$specialTime)."<br>";
$keyTime=date("Ynj",$specialTime);

function save(){
    $offM=(date("w")==0?6:date("w")-1);
    for($i=0; $i<5; $i++){
        $dMonday=mktime(0, 0, 0, date("m")  , date("d")-$offM+$i, date("Y"));
        $kMonday=date("Ynj",$dMonday);
        $stringAutogen=$stringAutogen."<div class=\"menu\" >\n            <div id=\"autogen\">\n        <h3>".date("l, F j, Y",$dMonday)."</h3>\n        <br>";
        if(!empty($_COOKIE[$kMonday])){
            
            $res=$_COOKIE[$kMonday];
            $valCookie=explode(",",$res);
            $stringAutogen=$stringAutogen."<h2> Lunch Entree </h2><h4>".(empty($valCookie[0])?"":$valCookie[0]." 3.50.")." </h4>".
    "        <h4>".(empty($valCookie[1])?"":$valCookie[1]." 3.50.")." </h4><h2>Sides </h2><h4>".(empty($valCookie[2])?"":$valCookie[2]." 1.50.")." </h4>".
    "        <h4>".(empty($valCookie[3])?"":$valCookie[3]." 1.50.")." </h4><h2>Soup </h2><h4>".(empty($valCookie[4])?"":$valCookie[4]." 1.50.")." </h4>".
    "        <h4>".(empty($valCookie[5])?"":$valCookie[5]." 1.50.")." </h4><br><h2> Dinner Entree </h2><h4>".(empty($valCookie[6])?"":$valCookie[6]." 3.50.")." </h4>".
    "        <h4>".(empty($valCookie[7])?"":$valCookie[7]." 3.50.")." </h4><h2>Sides </h2><h4>".(empty($valCookie[8])?"":$valCookie[8]." 1.50.")." </h4>".
    "        <h4>".(empty($valCookie[9])?"":$valCookie[9]." 1.50.")." </h4><h2>Soup </h2><h4>".(empty($valCookie[10])?"":$valCookie[10]." 1.50.")." </h4>".
    "        <h4>".(empty($valCookie[11])?"":$valCookie[11]." 1.50.")." </h4>";

        }else{
            $stringAutogen=$stringAutogen."<h2>The kitchen is closed today.</h2>";
        }
        $stringAutogen=$stringAutogen."</div>\n</div>\n";
    }

$stringTopInside="<!DOCTYPE html><html><head><meta charset=\"utf-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">".
 "   <link href=\"../../assets/css/headerStyle.css\" rel=\"stylesheet\" type=\"text/css\"><link href=\"../../assets/css/legendStyle.css\" rel=\"stylesheet\" type=\"text/css\">".
 "   <link href=\"../../assets/css/layoutStyle.css\" rel=\"stylesheet\" type=\"text/css\"><link href=\"../../assets/css/sliderStyle.css\" rel=\"stylesheet\" type=\"text/css\">".
"	<script src=\"../../assets/js/sliderScript.js\"></script><title>CCSF Cafeteria</title><!-- this document resides in content/cafeteriaMenu folder -->".
"</head><body><div class=\"header\"><div class=\"logo\"><img src=\"../../assets/img/logoCCSFCafeteria.png\" alt=\"\"></div><div class=\"header-content\">".
      "      <h1>CCSF Cafeteria</h1></div></div><div class=\"nav-menu\"><ul><a href=\"../../content/cafeteriaMenu/index.html\"><div class=\"pdng\">".
        "        <li>Cafeteria Menu</li></div></a><a href=\"../../content/chefMenu/index.html\"><div class=\"pdng\"><li>Chef's Table Menu</li>".
            "</div></a><a href=\"../../content/aboutUs/index.html\"><div class=\"pdng\"><li>About Us</li></div></a>".
        "</ul></div><div class=\"main-container\"></div><!-- Page layout--><h1>Cafeteria Menu</h1><!-- Scroll Buttons -->".
   " <a class=\"w3-btn-floating w3-display-left\" onclick=\"plusDivs(-1)\">&#10094;</a><a class=\"w3-btn-floating w3-display-right\" onclick=\"plusDivs(1)\">&#10095;</a>".
    "<!-- Daily Menu --><section class=\"dailyMenu\">";
$stringTop="<!DOCTYPE html><html><head><meta charset=\"utf-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">".
"    <link href=\"assets/css/headerStyle.css\" rel=\"stylesheet\" type=\"text/css\"><link href=\"assets/css/legendStyle.css\" rel=\"stylesheet\" type=\"text/css\">".
"    <link href=\"assets/css/layoutStyle.css\" rel=\"stylesheet\" type=\"text/css\"><link href=\"assets/css/sliderStyle.css\" rel=\"stylesheet\" type=\"text/css\">".
"	<script src=\"assets/js/sliderScript.js\"></script><title>CCSF Cafeteria</title><!-- this document resides in <root> folder --></head>".
"<body><div class=\"header\"> <div class=\"logo\"> <img src=\"assets/img/logoCCSFCafeteria.png\" alt=\"\"> </div><div class=\"header-content\">".
       "     <h1>CCSF Cafeteria</h1></div> </div><div class=\"nav-menu\"><ul> <a href=\"content/cafeteriaMenu/index.html\"><div class=\"pdng\">".
       "         <li>Cafeteria Menu</li>  </div></a><a href=\"content/chefMenu/index.html\"><div class=\"pdng\">".
          "      <li>Chef's Table Menu</li> </div></a><a href=\"content/aboutUs/index.html\"><div class=\"pdng\">".
             "   <li>About Us</li>  </div></a>  </ul>  </div>".
  "  <div class=\"main-container\"></div> <!-- Page layout--><h1>Cafeteria Menu</h1><!-- Scroll Buttons -->".
    "<a class=\"w3-btn-floating w3-display-left\" onclick=\"plusDivs(-1)\">&#10094;</a><a class=\"w3-btn-floating w3-display-right\" onclick=\"plusDivs(1)\">&#10095;</a>".
    "<!-- Daily Menu --><section class=\"dailyMenu\">";





 $stringBottom="       <script>init();</script></section><section class=\"legend\">  <h3>Legend:</h3> <dl> <dt><b>[V]</b> <i>Vegetarian</i></dt>".
  "          <dt><b>[VG]</b> <i>Vegan</i></dt> <dt><b>[GF]</b> <i>Gluten Free</i></dt> <dt><b>[Nuts]</b> <i>May Contain Nuts</i></dt> </dl></section></body></html>";
    $bp = fopen('../index.html', 'w');
    fwrite($bp, $stringTop);
    fwrite($bp, $stringAutogen);
    fwrite($bp, $stringBottom);
     
    fclose($bp);

    $bpi = fopen('../content/cafeteriaMenu/index.html', 'w');
    fwrite($bpi, $stringTopInside);
    fwrite($bpi, $stringAutogen);
    fwrite($bpi, $stringBottom);
     
    fclose($bpi);

    $fp = fopen('cafeteria menu.csv', 'w');
    $saveTime= mktime(0, 0, 0, 12  , 16,2016);
    $stopTime=date("Ynj",$saveTime);
    $i=0;
    while($kTime!=$stopTime){
        $saveTime= mktime(0, 0, 0, 10  , 17+$i,2016);
        $kTime=date("Ynj",$saveTime);
        if(!empty($_COOKIE[$kTime])){
            $valCookie=$_COOKIE[$kTime];
            $valCookie=explode(",",$valCookie);
            $fields[0]=date("Y",$saveTime);
            $fields[1]=date("n",$saveTime);
            $fields[2]=date("j",$saveTime);
            $fields[3]=$valCookie[0];
            $fields[4]=$valCookie[1];
            $fields[5]=$valCookie[2];
            $fields[6]=$valCookie[3];
            $fields[7]=$valCookie[4];
            $fields[8]=$valCookie[5];
            $fields[9]=$valCookie[6];
            $fields[10]=$valCookie[7];
            $fields[11]=$valCookie[8];
            $fields[12]=$valCookie[9];
            $fields[13]=$valCookie[10];
            $fields[14]=$valCookie[11];   
            fputcsv($fp, $fields);
        }
        $i++;
    }

    fclose($fp);
}
switch ($_POST['Lunch1']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[0]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['Lunch1text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated Lunch1";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[0]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Deleted Lunch1";
	  break;
	  default:
switch ($_POST['Lunch2']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[1]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['Lunch2text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated Lunch2";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[1]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated Lunch2";
	  break;
	  default:
switch ($_POST['LSide1']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[2]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['LSide1text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated LSide1";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[2]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated LSide1";
	  break;
	  default:
switch ($_POST['LSide2']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[3]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['LSide2text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated LSide2";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[3]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated LSide2";
	  break;
	  default:
switch ($_POST['LSoup1']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[4]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['LSoup1text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated LSoup1";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[4]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated LSoup1";
	  break;
	  default:
switch ($_POST['LSoup2']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[5]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['LSoup2text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated LSoup2";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[5]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated LSoup2";
	  break;
	  default:
switch ($_POST['Dinner1']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[6]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['Dinner1text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated Dinner1";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[6]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated Dinner1";
	  break;
	  default:
switch ($_POST['Dinner2']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[7]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['Dinner2text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated Dinner2";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[7]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated Dinner2";
	  break;
	  default:
switch ($_POST['DSide1']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[8]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['DSide1text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated DSide1";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[8]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated DSide1";
	  break;
	  default:
switch ($_POST['DSide2']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[9]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['DSide2text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated DSide2";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[9]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated DSide2";
	  break;
	  default:
switch ($_POST['DSoup1']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[10]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['DSoup1text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated DSoup1";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[10]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated DSoup1";
	  break;
	  default:
switch ($_POST['DSoup2']) {
      case 'update':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[11]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['DSoup2text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated DSoup2";
	  break;
      case 'delete':
            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[11]="";
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated DSoup2";
	  break;
	  default:
	  if($_POST['all']=="Submit"){

            $cur=explode(",",$_COOKIE[$keyTime]);//.explode(",");
            $cur[0]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['Lunch1text']);
            $cur[1]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['Lunch2text']);
            $cur[2]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['LSide1text']);
            $cur[3]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['LSide2text']);
            $cur[4]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['LSoup1text']);
            $cur[5]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['LSoup2text']);
            $cur[6]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['Dinner1text']);
            $cur[7]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['Dinner2text']);
            $cur[8]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['DSide1text']);
            $cur[9]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['DSide2text']);
            $cur[10]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['DSoup1text']);
            $cur[11]=preg_replace("/[^a-zA-Z0-9 ]+/", "", $_POST['DSoup2text']);
            setcookie($keyTime,$cur[0].",".$cur[1].",".$cur[2].",".$cur[3].",".
            $cur[4].",".$cur[5].",".$cur[6].",".$cur[7].",".
            $cur[8].",".$cur[9].",".$cur[10].",".$cur[11]);
            save();
	  		echo "Updated All Fields";
	  }else{

          if(empty($_COOKIE['data'])) {
          if($debugFlags){
              echo "importing<br>";
          }
//nothing pressed: import data

	if (($handle = fopen("cafeteria menu.csv", "r")) !== FALSE) {
    	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            setcookie($data[0].$data[1].$data[2],
                $data[3].",".$data[4].",".$data[5].",".$data[6].",".
                $data[7].",".$data[8].",".$data[9].",".$data[10].",".
                $data[11].",".$data[12].",".$data[13].",".$data[14]);
       	}
    	fclose($handle);
        
		setcookie('data','yes');

    }
		  
        //setcookie('data','yes');//file_get_contents("cafeteria menu.csv"));
          }
	  }
	  break;
}
	  break;
}
	  break;
}
	  break;
}
	  break;
}
	  break;
}
	  break;
}
	  break;
}
	  break;
}
	  break;
}
	  break;
}
	  break;
}

?>
		</h2> 
		
		<input name="Yesterday" type="submit" value="Yesterday">
        <input name"Offset" type="text" style="display:none">
		<input name="Tomorrow" type="submit" value="Tomorrow">
		<table>
			<tr>
				<td>
					Lunch
				</td>
			</tr>
			<tr>
				<td>
					Entree:
				</td>
			</tr>
			<tr>
				<td>
					Item 1:
				</td>
				<td>
					<input name="Lunch1text" type="text">
				</td>
				<td>
					<input name="Lunch1" type="submit" value="update">
				</td>
				<td>
					<input name="Lunch1" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Item 2:
				</td>
				<td>
					<input name="Lunch2text" type="text" >
				</td>
				<td>
					 <input name="Lunch2" type="submit" value="update" >
				</td>
				<td>
					<input name="Lunch2" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Sides
				</td>
			</tr>
			<tr>
				<td>
					Item 1:
				</td>
				<td>
					<input name="LSide1text" type="text" >
				</td>
				<td>
					 <input name="LSide1" type="submit" value="update" >
				</td>
				<td>
					<input name="LSide1" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Item 2:
				</td>
				<td>
					<input name="LSide2text" type="text">
				</td>
				<td>
					 <input name="LSide2" type="submit" value="update" >
				</td>
				<td>
					<input name="LSide2" type="submit" value="delete">
				</td>
			</tr><tr>
				<td>
					Soup
				</td>
			</tr>
			<tr>
				<td>
					Item 1:
				</td>
				<td>
					<input name="LSoup1text" type="text">
				</td>
				<td>
					 <input name="LSoup1" type="submit" value="update" >
				</td>
				<td>
					<input name="LSoup1" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Item 2:
				</td>
				<td>
					<input name="LSoup2text" type="text" >
				</td>
				<td>
					 <input name="LSoup2" type="submit" value="update" >
				</td>
				<td>
					<input name="LSoup2" type="submit" value="delete">
				</td>
			</tr>
			<tr>
			</tr>
			<tr>
				<td>
					Dinner
				</td>
			</tr>
			<tr>
				<td>
					Entree:
				</td>
			</tr>
			<tr>
				<td>
					Item 1:
				</td>
				<td>
					<input name="Dinner1text" type="text" >
				</td>
				<td>
					 <input name="Dinner1" type="submit" value="update" >
				</td>
				<td>
					<input name="Dinner1" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Item 2:
				</td>
				<td>
					<input name="Dinner2text" type="text">
				</td>
				<td>
					 <input name="Dinner2" type="submit" value="update" >
				</td>
				<td>
					<input name="Dinner2" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Sides:
				</td>
			</tr>
			<tr>
				<td>
					Item 1:
				</td>
				<td>
					<input name="DSide1text" type="text">
				</td>
				<td>
					 <input name="DSide1" type="submit" value="update" >
				</td>
				<td>
					<input name="DSide1" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Item 2:
				</td>
				<td>
					<input name="DSide2text" type="text">
				</td>
				<td>
					 <input name="DSide2" type="submit" value="update" >
				</td>
				<td>
					<input name="DSide2" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Soup
				</td>
			</tr>
			<tr>
				<td>
					Item 1:
				</td>
				<td>
					<input name="DSoup1text" type="text">
				</td>
				<td>
					 <input name="DSoup1" type="submit" value="update" >
				</td>
				<td>
					<input name="DSoup1" type="submit" value="delete">
				</td>
			</tr>
			<tr>
				<td>
					Item 2:
				</td>
				<td>
					<input name="DSoup2text" type="text" >
				</td>
				<td>
					 <input name="DSoup2" type="submit" value="update" >
				</td>
				<td>
					<input name="DSoup2" type="submit" value="delete">
				</td>
			</tr>
		</table>
		<br>
		<input name="all" type="submit" value="Submit">
	</form>
	<!-- <div id="debug"></div>-->
	<script type="text/javascript">
	var cookie=decodeURIComponent(document.cookie);
		var dateArr=document.getElementById("date-header").innerHTML.split(",");
        var date=dateArr[1]+","+dateArr[2].substring(0,5);
		var ms=Date.parse(date);
		var dateObj1=new Date(ms);
		var dateString1=dateObj1.getFullYear()+""+(dateObj1.getMonth()+1)+""+dateObj1.getDate();
        //document.getElementById("debug").innerHTML=dateObj1.toString();
		var cookieArr=cookie.split(";");
		
		for(var index in cookieArr){
			var keyval=cookieArr[index].trim().split("=");
			//document.getElementById("debug").innerHTML=document.getElementById("debug").innerHTML+"k"+keyval[1];
            //document.getElementById("debug").innerHTML=document.getElementById("debug").innerHTML+"d"+dateString1+"k"+keyval[0];
			if(keyval[0]==dateString1){
				
				var items=keyval[1].replace(/\+/g," ").split(",");
				document.getElementsByName('Lunch1text')[0].value=items[0];//3];
				document.getElementsByName('Lunch2text')[0].value=items[1];//4];
				document.getElementsByName('LSide1text')[0].value=items[2];//5];
				document.getElementsByName('LSide2text')[0].value=items[3];//6];
				document.getElementsByName('LSoup1text')[0].value=items[4];//7];
				document.getElementsByName('LSoup2text')[0].value=items[5];//8];
				document.getElementsByName('Dinner1text')[0].value=items[6];//9];
				document.getElementsByName('Dinner2text')[0].value=items[7];//10];
				document.getElementsByName('DSide1text')[0].value=items[8];//11];
				document.getElementsByName('DSide2text')[0].value=items[9];//12];
				document.getElementsByName('DSoup1text')[0].value=items[10];//13];
				document.getElementsByName('DSoup2text')[0].value=items[11];//14];
				
			}
		}
		
	</script>
</body>
</html>
