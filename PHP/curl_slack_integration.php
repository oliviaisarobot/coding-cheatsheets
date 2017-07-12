// include this php function in your file to easily send messages to your Slack webhooks

public function sendToSlack($channelname, $username, $message, $webhookurl) {
  $payload = [
    'channel' => $channelname,
    'username' => $username,
    'text' => $message
  ];

  $data = json_encode($payload);

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_URL, $webhookurl);
  curl_setopt($curl, CURLOPT_POSTFIELDS, array('payload' => $data));

  $result = curl_exec($curl);
  
  if (!$result) {
    die('Error: ' . curl_error($curl));
  }
  
  curl_close($curl);
}
