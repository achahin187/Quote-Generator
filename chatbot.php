<?php

// Function to make a POST request to the ChatGPT API
function chatGptApiRequest($message)
{
    $apiKey = "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";

    $model = "gpt-3.5-turbo"; // Specify the desired ChatGPT model
    $endpoint = "https://api.openai.com/v1/engines/davinci/completions"; // Use the "davinci" engine for the "gpt-3.5-turbo" model
    // Example user input
    $userInput = "Hello, ChatGPT!";

    // Prepare the data payload
    $data = array(
        'prompt' => $userInput,
        'max_tokens' => 100,
    );

    // Convert data to JSON
    $jsonData = json_encode($data);

    // Prepare the cURL request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ));
    $result = curl_exec($ch);

    return $result;
}

// Generate a random quote using ChatGPT API
function generateQuote()
{
    $message = 'Generate a random quote.';
    $response = chatGptApiRequest($message);
    $responseObj = json_decode($response);
    $quote = $responseObj->choices[0]->text;

    return $quote;
}

// Generate a random quote from ChatGPT API
$randomQuote = generateQuote();

$response = [
    'quote' => $randomQuote
];

// Return the response as a JSON object
echo json_encode($response);