<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="utf-8">
		<title>Material 2018 — The Web as a material — Friday, November 16th, Reykjavík</title>
		<link href='https://www.google.com/fonts#UsePlace:use/Collection:Open+Sans:300,600,600italic,400italic' rel='stylesheet' type='text/css'>
		<link href=".src/sass/material.min.css" rel="stylesheet"/>
		<link rel="canonical" href="https://material.is/2018/">
		<meta name="description" content="A friendly 1-day, 1-track conference exploring the concept of the Web as a material — Reykjavík, Iceland — by Joschi Kuphal &amp; Brian Suda">
		<meta name="author" content="Joschi Kuphal (@jkphl) &amp; Brian Suda (@briansuda)">
		<meta name="robots" content="index,follow">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:site_name" content="Material 2018">
		<meta property="og:type" content="website">
		<meta property="og:locale" content="en_US">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@jkphl">
		<meta name="twitter:creator" content="@jkphl">
		<meta property="og:url" content="https://material.is/2018/">
		<meta property="og:title" name="twitter:title" content="Material 2018 — Friday, November 16th — Reykjavík, Iceland">
		<meta property="og:description" name="twitter:description" content="A friendly 1-day, 1-track conference exploring the concept of the Web as a material — Reykjavík, Iceland — by Joschi Kuphal &amp; Brian Suda">
		<meta property="og:image" content="https://material.is/2018/img/m18-poster.jpg">
		<meta name="twitter:image" content="https://material.is/2018/img/m18-poster.jpg">
		<meta name="google-site-verification" content="pnkWehmDSC4i8Uq9n-0X3wKUqTuMPIybn4vbScdeUNQ" />
		<!-- favicon -->
	</head>
	<body class="h-event" itemscope="itemscope" itemtype="http://schema.org/Event">
		<main>
			<section>
				<h1><a href="https://material.is/2018/" class="u-url" itemprop="url"><span class="p-name" itemprop="name">Material 2018</span></a></h1>
				<h2 class="p-summary" itemprop="summary">A conference exploring the concept of the Web as a material</h2>
				<p class="schedule-location">
					<time class="dt-start" itemprop="startDate" datetime="2018-11-18">November 16th, 2018</time> — <span class="p-location h-adr" itemprop="location" itemscope="itemscope" itemtype="http://schema.org/Address"><span class="p-locality" itemprop="locality">Reykjavík</span>, <span class="p-country-name" itemprop="country-name">Iceland</span></span>
				</p>
			</section><?php

			$token = empty($_SERVER['SLACK_TOKEN']) ? false : $_SERVER['SLACK_TOKEN']; // admin token generated at https://api.slack.com/docs/oauth-test-tokens
			$email = (empty($_POST['email']) || !filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) ? false : trim($_POST['email']);
			$error = 'unknown';

			// If a slack API token is given
			if ($token && $email) {
				$data = array(
					'email' => $email,
					'channels' => '',
					'first_name' => '',
					'token' => trim($token),
					'set_active' => 'true',
					'_attempts' => '1',
				);
				$url = 'https://visitingiceland.slack.com/api/users.admin.invite?t=1';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, count($data));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
				$result = curl_exec($ch);
				curl_close($ch);

				// Validate the result
				if (strlen($result) && is_object($status = @json_decode($result))) {
					if (isset($status->ok) && $status->ok) {
						$error = false;
					} else {
						$error = empty($status->error) ? 'unknown' : $status->error;
					}
				}
			}

			if ($error):

				?><h2 data-error="<?= htmlspecialchars($error); ?>">Ooops! Something went wrong ...</h2>
				<p>An error occured while requesting an invite to our <a href="https://visitingiceland.slack.com" target="_blank">Visiting Iceland Slack Team</a>. Please <a href="mailto:info@material.is">get in touch with us</a> to sort this out. Sorry for the inconvenience!</p><?php

			else:

				?><section>
				<h2>Thank you!</h2>
				<p>Your invite to our <a href="https://visitingiceland.slack.com" target="_blank">Visiting Iceland Slack Team</a> should be on its way to your inbox now. Thanks for getting involved!</p>
			<?php

			endif;

		?><p><a href="index.html">Back to main page</a></p></section>
		</main>
		<footer>
			<section>
				<h2>#Material18</h2>
				<p>This conference is about understanding materials. The 18th material in the periodic table is Argon. If you visit any of Iceland in the dark and see some purple northen lights, you'll understand why that's interesting.</p>
				<p><a href="https://ti.to/material-conference/material-2018.ics">Add Material Conference to your calendar</a></p>
			</section>
			<section>
				<h2>Who's behind this?</h2>
				<p>The two organizers are <a href="https://jkphl.is">Joschi Kuphal</a> and <a href="http://suda.co.uk/">Brian Suda</a>. You may <a href="mailto:info@material.is">contact us via email</a>.
			</section>
			<section>
				<p><a href="code-of-conduct.html">Code of Conduct</a></p>
			</section>
		</footer>
	</body>
</html>