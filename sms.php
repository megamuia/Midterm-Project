<?php
include_once("connection.php");
$sql="SELECT * FROM doctor;";
$result=mysqli_query($conn, $sql);
    while($row= $result->fetch_assoc())
    {
    $numbers= $row["phone"];
    $apiKey = urlencode('KBeufUThkhU-fmL7AlkiRcgiFLUZbYPQQIT5UvNyPF	');
    $textMessage="Hi, $fname please remember to take your medication today";
   
   // Message details
   $numbers = array($numbers);
   $sender = urlencode('AMAS');
   $message = rawurlencode($textMessage);
   $numbers = implode(',', $numbers);
   // Prepare data for POST request
   $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
   // Send the POST request with cURL
   $ch = curl_init('https://api.txtlocal.com/send/');
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($ch);
   curl_close($ch);   
   // Process your response here
   echo $response;

    }
