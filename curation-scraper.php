<?php

// error_reporting(0);
// @ini_set('display_errors', 0);

#if (is_admin())
#{	
	#echo 'this: '.$_GET['url'];
if (!empty($_GET['url']) && $_GET['action'] == 'cc') {
	include_once('.' . '/helpers/simple_html_dom2.php');

	$url = str_replace('http://', '', $_GET['url']);


	$options = array(

		CURLOPT_CUSTOMREQUEST => "GET",        //set request type post or get
		CURLOPT_POST => false,        //set to GET
		CURLOPT_COOKIEFILE => "cookie.txt", //set cookie file
		CURLOPT_COOKIEJAR => "cookie.txt", //set cookie jar
		CURLOPT_RETURNTRANSFER => true,     // return web page
		CURLOPT_HEADER => false,    // don't return headers
		CURLOPT_FOLLOWLOCATION => true,     // follow redirects
		CURLOPT_ENCODING => "",       // handle all encodings
		CURLOPT_AUTOREFERER => true,     // set referer on redirect
		CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
		CURLOPT_TIMEOUT => 120,      // timeout on response
		CURLOPT_MAXREDIRS => 10,       // stop after 10 redirects
	);

	$ch = curl_init($url);
	curl_setopt_array($ch, $options);
	$content = curl_exec($ch);
	$err = curl_errno($ch);
	$errmsg = curl_error($ch);
	$header = curl_getinfo($ch);
	curl_close($ch);



	$html = str_get_html_wp_curation($content);


	$url_info = parse_url('http://' . $url);

	switch ($_GET['mode']) {
		case 'text':
			foreach ($html->find('p') as $e) {
				echo '<p>' . strip_tags($e, '<em><b><i><strong>') . '</p>';
			}
			break;
		default:
				//strip relative script tags to stop javascript execution failures on our side.
			foreach ($html->find('script') as $e) {

				$e->src = rel2abs($e->src, $url_info['scheme'] . '://' . $url_info['host']);	
					
					//echo $e->src;
			}

			foreach ($html->find('a') as $e) {
				$e->href = rel2abs($e->href, $url_info['scheme'] . '://' . $url_info['host']);	
					
					#echo $e->href . ' :: ';
			}

			$html->save();

			echo $html;
			break;
	}
}
#}

function rel2abs($rel, $base)
{
    /* return if already absolute URL */
	if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;

    /* queries and anchors */
	if ($rel[0] == '#' || $rel[0] == '?') return $base . $rel;

	$path = '';
	
    /* parse base URL and convert to local variables:
       $scheme, $host, $path */
	extract(parse_url($base));

	if (!$scheme)
		$scheme = 'http';
		
    /* remove non-directory element from path */
	$path = preg_replace('#/[^/]*$#', '', $path);

    /* destroy path if relative url points to root */
	if ($rel[0] == '/') $path = '';

    /* dirty absolute URL */
	$abs = "$host$path/$rel";

    /* replace '//' or '/./' or '/foo/../' with '/' */
	$re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
	for ($n = 1; $n > 0; $abs = preg_replace($re, '/', $abs, -1, $n)) {
	}

    /* absolute URL is ready! */
	return $scheme . '://' . $abs;
}

function InternetCombineUrl($absolute, $relative)
{
	$p = parse_url($relative);
	if ($p["scheme"]) return $relative;

	extract(parse_url($absolute));

	$path = dirname($path);

	if ($relative {
		0} == '/') {
		$cparts = array_filter(explode("/", $relative));
	} else {
		$aparts = array_filter(explode("/", $path));
		$rparts = array_filter(explode("/", $relative));
		$cparts = array_merge($aparts, $rparts);
		foreach ($cparts as $i => $part) {
			if ($part == '.') {
				$cparts[$i] = null;
			}
			if ($part == '..') {
				$cparts[$i - 1] = null;
				$cparts[$i] = null;
			}
		}
		$cparts = array_filter($cparts);
	}
	$path = implode("/", $cparts);
	$url = "";
	if ($scheme) {
		$url = "$scheme://";
	} else {
		$url = "http://";
	}
	if ($user) {
		$url .= "$user";
		if ($pass) {
			$url .= ":$pass";
		}
		$url .= "@";
	}
	if ($host) {
		$url .= "$host/";
	}
	$url .= $path;
	return $url;
}
?>