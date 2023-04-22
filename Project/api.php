<?php


// API configuration
$apiUrl = 'https://api.perfumes.com';
$apiKey = 'your_api_key_here';

// call the perfume API using curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl . '/perfumes');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $apiKey));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// parse the API response and store it in the database
$perfumes = json_decode($response, true);
foreach ($perfumes as $perfume) {
    $stmt = $pdo->prepare("INSERT INTO perfumes (name, brand, price, description) VALUES (:name, :brand, :price, :description)");
    $stmt->execute(array(
        ':name' => $perfume['name'],
        ':brand' => $perfume['brand'],
        ':price' => $perfume['price'],
        ':description' => $perfume['description']
    ));
}
