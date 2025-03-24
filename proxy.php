
<?php
header('Content-Type: application/json');
$apiKey = "sk-replace-this-with-your-real-api-key";

$input = json_decode(file_get_contents('php://input'), true);
$prompt = $input['prompt'];

$data = [
  "model" => "gpt-4",
  "messages" => [
    ["role" => "system", "content" => "You are a top-performing closer for AID Financial. Your job is to handle objections during debt relief calls. Respond confidently, helpfully, and directly."],
    ["role" => "user", "content" => $prompt]
  ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Content-Type: application/json",
  "Authorization: Bearer " . $apiKey
]);

$result = curl_exec($ch);
curl_close($ch);
$response = json_decode($result, true);
echo json_encode(["response" => $response['choices'][0]['message']['content']]);
?>
