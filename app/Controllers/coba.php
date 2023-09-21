<?php
    // Include the Composer autoloader
    require 'vendor/autoload.php';

    // Replace with your Firebase Web API Key
    $apiKey = 'AIzaSyDGm9DaPOck0hr1D5Gh6FEleIcZdDULWn8';

    // Replace with your Firebase project ID
    $projectId = 'tugasakhir-9a972';

    // URL of your Firebase Realtime Database
    $databaseUrl = "https://tugasakhir-9a972-default-rtdb.firebaseio.com/";

    // Path to the data you want to retrieve (e.g., '/users', '/messages', etc.)
    $firebasePath = '/Data';

    // Create a Guzzle HTTP client
    $client = new GuzzleHttp\Client();
try {
    // Make a GET request to fetch data from Firebase
    $response = $client->request('GET', $databaseUrl . $firebasePath . '.json', [
        'query' => [
            'auth' => $apiKey,
        ],
    ]);
    // Decode the JSON response
    $data = json_decode($response->getBody(), true);
    // Calculate average per hour
    $hourlyData = []; // Array to store hourly data
    $hourlyCount = []; // Array to store hourly count
    foreach ($data as $key => $value) {
        // Assuming the datetime is stored in $value['timestamp'] (change this to your actual datetime key)
        $timestamp = strtotime($value['timestamp']);
        $hour = date('H', $timestamp);

        // Add the value to the corresponding hourly data and update count
        if (isset($hourlyData[$hour])) {
            $hourlyData[$hour] += $value['suhu']; // Change 'nilai' to your actual key for the value to be averaged
            $hourlyCount[$hour]++;
        } else {
            $hourlyData[$hour] = $value['suhu']; // Change 'nilai' to your actual key for the value to be averaged
            $hourlyCount[$hour] = 1;
        }
    }
    $hourlyAverage = []; // Array to store hourly averages
    foreach ($hourlyData as $hour => $total) {
        // Calculate the average for each hour
        $hourlyAverage[$hour] = $total / $hourlyCount[$hour];
    }
    // Print the hourlyAverage array
    //foreach ($hourlyAverage as $hour => $average) {
    //    echo "Hour {$hour}: {$average}\n";
    //}
    // Set the response headers to indicate JSON content
    header('Content-Type: application/json');
    return $this->response->setJSON($hourlyAverage);
} catch (RequestException $e) {
    // Handle exceptions if necessary
    return $this->response->setJSON(['error' => 'Error fetching data from Firebase']);
}
?>
