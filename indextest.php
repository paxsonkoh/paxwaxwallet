
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



    function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
	
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}



    

?>


		  <form action="indextest.php" method="post">

Address: <input type="text" name="playermission" size="50" >

   <input type="submit"></form>
        <?php echo build_table($missonplayerjson['rows']);?>
		 <?php echo build_table($stakeplayerjson['rows']);?>
 

