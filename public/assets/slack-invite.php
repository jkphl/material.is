<?php

$group = 'visitingiceland'; // team name
$token = 'xoxp-25867975393-25930531155-176748458691-2f825b9d76cf1ec8b07664e6c8606f9d'; // admin token generated at https://api.slack.com/docs/oauth-test-tokens

// -------------------------------------------------------------

$data = array(
	'email' => $_POST['email'],
	'channels' => '',
	'first_name' => '',
	'token' => trim($token),
	'set_active' => 'true',
	'_attempts' => '1',
);
$url = 'https://'.$group.'.slack.com/api/users.admin.invite?t=1';

// Request the invite
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($data));
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$result = curl_exec($ch);
curl_close($ch);