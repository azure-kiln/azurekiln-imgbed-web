<?php
require_once 'config.php';

$imageKey = $_GET['key'] ?? '';

if (empty($imageKey)) {
    http_response_code(400);
    exit('Missing image key');
}

$ch = curl_init();
$apiUrl = $API_BASE_URL . '/img/' . urlencode($imageKey);

curl_setopt_array($ch, [
    CURLOPT_URL => $apiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_FOLLOWLOCATION => true,
]);

$response = curl_exec($ch);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpCode === 200 && $response) {
    header('Content-Type: ' . ($contentType ?: 'image/jpeg'));
    header('Cache-Control: public, max-age=86400');
    echo $response;
} else {
    http_response_code(500);
    echo 'Image fetch failed';
}
