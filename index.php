<!DOCTYPE HTML>
<?php

    if(isset($_POST['playermission'])) {

        $wallet_mission_id = $_POST['playermission'];

$data = array(

    'json' => true,

    'code' => 'kryptonmissn',

	'table' => "atksmission",

	"scope" => "kryptonmissn",

	"limit" => "1",
	"upper_bound" => $wallet_mission_id,
	"lower_bound" => $wallet_mission_id


);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$missonplayerjson = curl_exec($curl);

// Close cURL session

curl_close($curl);

$missonplayerjson = json_decode($missonplayerjson, true);
unset($missonplayerjson['rows'][0]["mission"]);
unset($missonplayerjson['rows'][0]["atk_time"]);
unset($missonplayerjson['rows'][0]["type"]);
$data = array(

    'json' => true,

    'code' => 'kryptonstake',

	'table' => "accounts",

	"scope" => "kryptonstake",

	"limit" => "1",
	"upper_bound" => $wallet_mission_id,
	"lower_bound" => $wallet_mission_id


);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$stakeplayerjson = curl_exec($curl);

// Close cURL session

curl_close($curl);

$stakeplayerjson = json_decode($stakeplayerjson, true);

unset($stakeplayerjson['rows'][0]["user"]);
unset($stakeplayerjson['rows'][0]["cube_claimed"]);
unset($stakeplayerjson['rows'][0]["last_claimed"]);
}



?>
<?php

$titan=array();
$chaos=array();
$asta=array();
$data = array(

    'json' => true,

    'code' => 'kryptonmissn',

	'table' => "atksmission",

	"scope" => "kryptonmissn",

	"limit" => "10000"

);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$totalpowerjson = curl_exec($curl);

// Close cURL session

curl_close($curl);
$data = array(

    'json' => true,

    'code' => 'kryptonstake',

	'table' => "accounts",

	"scope" => "kryptonstake",

	"limit" => "10000"

);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$attpowerjson = curl_exec($curl);

// Close cURL session

curl_close($curl);
$totalpowerjson = json_decode($totalpowerjson, true);
$attpowerjson = json_decode($attpowerjson, true);

foreach ($totalpowerjson["rows"] as $value) {



  	if ($value["race"]=="Titan"){unset($value["mission"]);unset($value["atk_time"]);unset($value["type"]);array_push($titan,$value);}
	else if($value["race"]=="Astraea"){unset($value["mission"]);unset($value["atk_time"]);unset($value["type"]);array_push($asta,$value);}
	else if($value["race"]=="Chaos"){unset($value["mission"]);unset($value["atk_time"]);unset($value["type"]);array_push($chaos,$value);}

}

while ($totalpowerjson["more"]==1){
$data = array(

    'json' => true,

    'code' => 'kryptonmissn',

	'table' => "atksmission",

	"scope" => "kryptonmissn",

	"limit" => "10000",
    "lower_bound"=> $totalpowerjson["next_key"]
);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$totalpowerjson = curl_exec($curl);

// Close cURL session

curl_close($curl);
$data = array(

    'json' => true,

    'code' => 'kryptonstake',

	'table' => "accounts",

	"scope" => "kryptonstake",

	"limit" => "10000"

);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$attpowerjson = curl_exec($curl);

// Close cURL session

curl_close($curl);
$totalpowerjson = json_decode($totalpowerjson, true);


foreach ($totalpowerjson["rows"] as $value) {



  	if ($value["race"]=="Titan"){unset($value["mission"]);unset($value["atk_time"]);unset($value["type"]);array_push($titan,$value);}
	else if($value["race"]=="Astraea"){unset($value["mission"]);unset($value["atk_time"]);unset($value["type"]);array_push($asta,$value);}
	else if($value["race"]=="Chaos"){unset($value["mission"]);unset($value["atk_time"]);unset($value["type"]);array_push($chaos,$value);}
	
}

}
function cmp($a, $b)
{
    if ($a['atk_power'] == $b['atk_power']) {
        return 0;
    }
    return ($a['atk_power'] > $b['atk_power']) ? -1 : 1;
}

usort($titan, "cmp");
usort($chaos, "cmp");
usort($asta, "cmp");

    function build_table($array,$header){
    // start table
	$counter=1;
    $html = '<table style="overflow:auto;font-size:14px">';
    // header row
    $html .= '<tr>';
	if($header==true){
	$html .= '<th>Rank</th>';}
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
		
        $html .= '<tr>';
		if($header==true){
		$html .= '<td>' . htmlspecialchars($counter) . '</td>';
		}
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
		$counter=$counter+1;
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}




?>

<?php
$miningpowertotal=0;
$data = array(

    'json' => true,

    'code' => 'kryptonstake',

	'table' => "accounts",

	"scope" => "kryptonstake",

	"limit" => "10000"

);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$totalminingjson = curl_exec($curl);

// Close cURL session

curl_close($curl);

$totalminingjson = json_decode($totalminingjson, true);

foreach ($totalminingjson["rows"] as $value) {
  $miningpowertotal=$miningpowertotal+$value["mining_power"];
}

while ($totalminingjson["more"]==1){
$data = array(

    'json' => true,

    'code' => 'kryptonstake',

	'table' => "accounts",

	"scope" => "kryptonstake",

	"limit" => "10000",
    "lower_bound"=> $totalminingjson["next_key"]
);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$totalminingjson = curl_exec($curl);

// Close cURL session

curl_close($curl);

$totalminingjson = json_decode($totalminingjson, true);

foreach ($totalminingjson["rows"] as $value) {
  $miningpowertotal=$miningpowertotal+$value["mining_power"];
}
}
$miningpowercubeperhr=13541/$miningpowertotal;

?>

   <?PHP 

    if(!isset($_POST['asset_id'])) {

        $asset_id = '';

    }      

 else{

	 $asset_id = $_POST['asset_id'];

 }



?>

<?php

$data = array(

    'json' => true,

    'code' => 'kryptonasset',

	'table' => "assetsinfos",

	"scope" => "kryptonasset",

	"limit" => "1",

	"lower_bound" => trim($asset_id)

);

$payload = json_encode($data);



$url = 'https://wax.eosphere.io/v1/chain/get_table_rows';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function

curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$assetwaxjson = curl_exec($curl);

// Close cURL session

curl_close($curl);

$assetwaxjson = json_decode($assetwaxjson, true);





?>

   <?PHP 

    if(!isset($_POST['cubeperhour'])) {

        $cubeperhour = '0';

    }      

    else {

		$cubeperhour = $_POST['cubeperhour'];

}

    if(!isset($_POST['gold'])) {

		

        $gold = '0';

    }      

    else {

		$gold = $_POST['gold'];

		if($gold==""){

			$gold = '0';

		}

}

    if(!isset($_POST['silver'])) {

        $silver = '0';

    }      

    else {

		$silver = $_POST['silver'];

				if($silver==""){

			$silver = '0';

		}

}

    if(!isset($_POST['common'])) {

        $common = '0';

    }      

    else {

		$common = $_POST['common'];

		if($common==""){

			$common = '0';

		}

}

    if(!isset($_POST['golda'])) {

        $golda = '0';

    }      

    else {

		$golda = $_POST['golda'];

				if($golda==""){

			$golda = '0';

		}

}

    if(!isset($_POST['silvera'])) {

        $silvera = '0';

    }      

    else {

		$silvera = $_POST['silvera'];

				if($silvera==""){

			$silvera = '0';

		}

}

    if(!isset($_POST['commona'])) {

        $commona = '0';

    }      

    else {

		$commona = $_POST['commona'];

			if($commona==""){

			$commona = '0';

		}

}

?>

<?php



$url = 'https://api.coingecko.com/api/v3/simple/price?ids=wax&vs_currencies=usd';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, false);

// Set the request data as JSON using json_encode function



// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$waxpricejson = curl_exec($curl);

// Close cURL session

curl_close($curl);

$waxpricejson = json_decode($waxpricejson, true);



$url = 'https://wax.alcor.exchange/api/markets/296';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, false);

// Set the request data as JSON using json_encode function



// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$cubepricejson = curl_exec($curl);

// Close cURL session

curl_close($curl);

$cubepricejson = json_decode($cubepricejson, true);



$url = 'https://wax.alcor.exchange/api/markets/297';

// Collection object



// Initializes a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request

curl_setopt($curl, CURLOPT_POST, false);

// Set the request data as JSON using json_encode function



// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [

  'Content-Type: application/json'

]);

// Execute cURL request with all previous settings

$Kryptonpricejson = curl_exec($curl);

// Close cURL session

curl_close($curl);

$Kryptonpricejson = json_decode($Kryptonpricejson, true);

?>

<html>

	<head>

		<title>Paxwaxcalculator</title>

		<meta charset="utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="assets/css/main.css" />
<style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
	</head>

	<body class="is-preload">



		<!-- Header -->

			<section id="header">

				<header>

					

					<h1 id="logo"><a href="#">Paxwaxcalculator</a></h1>

					<p>

          Want to tip me WAX / NFTs / Wax blockchain Tokens in this address: d5hba.wam

        </p>

				</header>

				<nav id="nav">

					<ul>

						<li><a href="#one" class="active">KRYPTON Calculator</a></li>

						<li><a href="#two">KRYPTON NFT Checker</a></li>
						<li><a href="#three">KRYPTON Ranking</a></li>
					<li><a href="#four">KRYPTON Wallet Checker</a></li>

					</ul>

				</nav>

		

			</section>



		<!-- Wrapper -->

			<div id="wrapper">



				<!-- Main -->

					<div id="main">



						<!-- One -->

							<section id="one">



	



<table>

    

      <tr>

        <td style="font-size:16px">

          WAX Price : <?php echo $waxpricejson['wax']['usd']; ?> USD

        </td >

        <td style="font-size:16px">

          Cube Price :  <?php echo $cubepricejson['last_price'];?> WAX | <?php echo $cubepricejson['last_price']*$waxpricejson['wax']['usd'];?> USD

        </td>

          <td style="font-size:16px">

          Krypton Price: <?php echo $Kryptonpricejson['last_price'];?> WAX | <?php echo $Kryptonpricejson['last_price']*$waxpricejson['wax']['usd'];?> USD

        </td>
          <td style="font-size:16px">

         1 Mining power :<?php echo $miningpowercubeperhr;?> Cube/hr

        </td>
       

      </tr>

    

	</table>

	<table>

    <thead>

      <tr style="font-size:16px">

      

         

		  <form action="index.php" method="post">





  <th>

  Gold miner: <input type="text" name="gold" pattern="[0-9]+" size="4">

  </th>

   <th>

  Silver miner: <input type="text" name="silver" pattern="[0-9]+" size="4">

  </th>

   <th>

  Common miner: <input type="text" name="common" pattern="[0-9]+" size="4">

        </th>

  <th>

  Gold attacker: <input type="text" name="golda" pattern="[0-9]+" size="4">

  </th>

   <th>

  Silver attacker: <input type="text" name="silvera" pattern="[0-9]+" size="4">

  </th>

   <th>

  Common attacker: <input type="text" name="commona" pattern="[0-9]+" size="4">

	 </th>

      </tr>

<tr><td colspan='7' style="text-align:center">    <input type="submit"></form></td></tr>

    </thead>

	</table>

  <table style="font-size:16px">

   

      <tr>

        <td data-title='Provider Name'>

           Cube/hr: <?php $cubeperhour=($miningpowercubeperhr*3*$gold)+($miningpowercubeperhr*1.3*$silver)+($miningpowercubeperhr*1*$common); echo $cubeperhour; ?>

        </td>

        <td >

          Gold miner: <?php echo $gold; ?>

        </td>

		

		   <td >

          Silver miner: <?php echo $silver; ?>

        </td>

           <td >

          Common miner: <?php echo $common; ?>

        </td>

        

      </tr>

	      <tr>

        

        <td >

          Gold attacker: <?php echo $golda; ?>

        </td>

		

		   <td >

          Silver attacker: <?php echo $silvera; ?>

        </td>

           <td >

          Common attacker: <?php echo $commona; ?>

        </td>

        

      </tr>

	  

           <tr >

        <td data-title='Provider Name'>

           Cube cost/hr: <?php $cubehrcost=($gold*0.1)+($silver*0.1429)+($common*0.1875); 

		   $acubehrcost=($golda*0.107)+($silvera*0.15)+($commona*0.1875);  

		   echo ($cubehrcost+$acubehrcost); ?> Cube

        </td>

        <td >

          Krypton cost/hr: <?php  $Kryptonhrcost=($gold*0.005)+($silver*0.007)+($common*0.009375); $Kryptonhrcosta=($golda*0.00535)+($silvera*0.0075)+($commona*0.009375);echo ($Kryptonhrcost+$acubehrcost); ?> Krypton

        </td>

		

		   <td >

          Cube cost/day : <?php echo ($cubehrcost+$acubehrcost)*24; ?> Cube

        </td>

           <td >

          Krypton cost/day: <?php echo ($Kryptonhrcost+$Kryptonhrcosta)*24; ?> Krypton

        </td>

		</tr>

		</table>

		 

	    <table style="font-size:16px">

	    

          <tr >

        <td data-title='Provider Name' >

          Earning/hr after refill 

        </td>

        <td >

          Earning/day after refill 

        </td>

		

		   <td >

          Earning/month(30days) after refill

        </td>

		 </tr>

		 

                 <tr >

				 

        <td data-title='Provider Name' c>

          <?php $earninghr=($cubeperhour*$cubepricejson['last_price'])-(($cubehrcost+$acubehrcost)*$cubepricejson['last_price'])-(($Kryptonhrcost+$Kryptonhrcosta)*$Kryptonpricejson['last_price']); echo $earninghr;  ?> WAX | <?php echo  $earninghr*$waxpricejson['wax']['usd'] ?> USD

        </td>

        <td >

         <?php echo $earninghr*24 ?> WAX | <?php echo  $earninghr*$waxpricejson['wax']['usd']*24 ?> USD

        </td>

		

		   <td >

          <?php echo $earninghr*24*30 ?> WAX | <?php echo  $earninghr*$waxpricejson['wax']['usd']*24*30 ?> USD

        </td>

        

      </tr>

       

  </table>
<br><br>
							</section>



						<!-- Two -->

							<section id="two">


							<table style="font-size:30px">

								  <thead>

      <tr>

        <th>

         

		  <form action="index.php#two" method="post">

 asset id: <input type="text" name="asset_id" size="50" pattern="[0-9]+">

 </th>

  <th>







	 </th>

      </tr>

<tr><td colspan='7' style="text-align:center">    <input type="submit"></form></td></tr>

    </thead>

	</table>

	<br>



  <table style="font-size:30px">

   



    <tbody>

      <tr>

        <td data-title='Provider Name'>

           asset id: <?php echo $assetwaxjson['rows'][0]['asset_id']; ?>

        </td>

		

		   <td >

          stamina remaining: <?php echo $assetwaxjson['rows'][0]['stamina_remain']; ?>

        </td>

         

       

  </table><br><br><br><br>

							</section>
	<section id="three">

<div class="row" >
  <div class="column" style="overflow: scroll ;height:700px;">
   
        <?php echo build_table($titan,true);?>
</div>
  <div class="column" style="overflow: scroll ;height:700px;">
 
     <?php echo build_table($chaos,true);?>
  

  </div>
  <div class="column" style="overflow: scroll ;height:700px;">
   
 
     <?php echo build_table($asta,true);?>
	
  </div>
</div>

					</section>	
					
	<section id="four">
<br><br>
		  <form action="index.php#four" method="post">

Address: <input type="text" name="playermission" size="50" >

   <center><input type="submit"></center></form>
       <?php  if(isset($_POST['playermission'])) {
		    echo build_table($missonplayerjson['rows'],false);
		  echo build_table($stakeplayerjson['rows'],false);
		  echo "<br><br><br><br><br><br><br><br><br><br><br><br><br>";
	   }
	   else{
		   echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		   
	   } ?>

					</section>	


					</div>



				<!-- Footer -->

					<section id="footer">

						<div class="container">

							<ul class="copyright">

								<li>&copy; Paxwaxwallet. All rights reserved.</li>

							</ul>

						</div>

					</section>



			</div>



		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>

			<script src="assets/js/jquery.scrollex.min.js"></script>

			<script src="assets/js/jquery.scrolly.min.js"></script>

			<script src="assets/js/browser.min.js"></script>

			<script src="assets/js/breakpoints.min.js"></script>

			<script src="assets/js/util.js"></script>

			<script src="assets/js/main.js"></script>



	</body>

</html>