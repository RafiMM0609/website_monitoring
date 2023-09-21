<?php
class api2 extends CI_Controller{
    public function get_data()
    {
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
            echo $data;
            // Convert the data array to a JSON-formatted string
            // Now you can use the data as an associative array
            
            // Set the response headers to indicate JSON content
            header('Content-Type: application/json');

            // Convert the data array to a JSON-formatted string
            // Now you can use the data as an associative array
            echo json_encode($data);
        } catch (GuzzleHttp\Exception\RequestException $e) {
            // Handle exceptions if necessary
            echo 'Error: ' . $e->getMessage();
        }
    }
}
