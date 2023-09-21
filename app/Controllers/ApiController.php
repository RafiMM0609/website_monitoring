<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiController extends BaseController
{
    public function serverResponse()
    {
        $apiKey = 'AIzaSyDGm9DaPOck0hr1D5Gh6FEleIcZdDULWn8';
        $projectId = 'tugasakhir-9a972';
        $databaseUrl = "https://tugasakhir-9a972-default-rtdb.firebaseio.com/";
        $firebasePath = '/Data';
        $client = new Client();
        try {
            $response = $client->request('GET', $databaseUrl . $firebasePath . '.json', [
                'query' => [
                    'auth' => $apiKey,
                ],
            ]);
            $data = json_decode($response->getBody(), true);
            header('Content-Type: application/json');
            return $this->response->setJSON($data);
        } catch (RequestException $e) {
            // Handle exceptions if necessary
            return $this->response->setJSON(['error' => 'Error fetching data from Firebase']);
        }
    }
    public function averageSuhu(){
        $apiKey = 'AIzaSyDGm9DaPOck0hr1D5Gh6FEleIcZdDULWn8';
        $projectId = 'tugasakhir-9a972';
        $databaseUrl = "https://tugasakhir-9a972-default-rtdb.firebaseio.com/";
        $firebasePath = '/Data';
        $client = new Client();
        try {
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
            $timestamp = strtotime($value['timestamp']);
            $hour = date('H', $timestamp);
            if (isset($hourlyData[$hour])) {
                    $hourlyData[$hour] += $value['suhu']; 
                    $hourlyCount[$hour]++;
                } else {
                    $hourlyData[$hour] = $value['suhu']; 
                    $hourlyCount[$hour] = 1;
                }
        }
        $hourlyAverage = [];
        foreach ($hourlyData as $hour => $total) {
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
    }
    public function averageKecepatan(){
        $apiKey = 'AIzaSyDGm9DaPOck0hr1D5Gh6FEleIcZdDULWn8';
        $projectId = 'tugasakhir-9a972';
        $databaseUrl = "https://tugasakhir-9a972-default-rtdb.firebaseio.com/";
        $firebasePath = '/Data';
        $client = new Client();
        try {
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
            $timestamp = strtotime($value['timestamp']);
            $hour = date('H', $timestamp);
            if (isset($hourlyData[$hour])) {
                    $hourlyData[$hour] += $value['kecepatan']; 
                    $hourlyCount[$hour]++;
                } else {
                    $hourlyData[$hour] = $value['kecepatan']; 
                    $hourlyCount[$hour] = 1;
                }
        }
        $hourlyAverage = [];
        foreach ($hourlyData as $hour => $total) {
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
    }
    public function averageHumidity(){
        $apiKey = 'AIzaSyDGm9DaPOck0hr1D5Gh6FEleIcZdDULWn8';
        $projectId = 'tugasakhir-9a972';
        $databaseUrl = "https://tugasakhir-9a972-default-rtdb.firebaseio.com/";
        $firebasePath = '/Data';
        $client = new Client();
        try {
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
            $timestamp = strtotime($value['timestamp']);
            $hour = date('H', $timestamp);
            if (isset($hourlyData[$hour])) {
                    $hourlyData[$hour] += $value['humidity']; 
                    $hourlyCount[$hour]++;
                } else {
                    $hourlyData[$hour] = $value['humidity']; 
                    $hourlyCount[$hour] = 1;
                }
        }
        $hourlyAverage = [];
        foreach ($hourlyData as $hour => $total) {
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
    }
    
}
