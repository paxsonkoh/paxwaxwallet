<!DOCTYPE html>
<html >

<head>
  <meta charset="UTF-8">
  <title>Responsive Table + Detail View</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

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

</head>

<body>
 <h1>
  <a href="index.php">KRYPTON Calculator</a>
<a href="kryptonchecker.php">KRYPTON NFT Checker</a>
 </h1>
   
     

  <h1>
  KRYPTON NFT Checker
</h1>

<main>

    <thead>
      <tr>
        <th>
         
		  <form action="kryptonchecker.php" method="post">
 asset id: <input type="text" name="asset_id" size="50">
 </th>
  <th>



	 </th>
      </tr>
<tr><td colspan='7' style="text-align:center">    <input type="submit"></form></td></tr>
    </thead>
	</table>
	<br>
  <table>
   

    <tbody>
      <tr>
        <td data-title='Provider Name'>
           asset id: <?php echo $assetwaxjson['rows'][0]['asset_id']; ?>
        </td>
		
		   <td >
          stamina remaining: <?php echo $assetwaxjson['rows'][0]['stamina_remain']; ?>
        </td>
         
       
  </table>
 
 

</main>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
