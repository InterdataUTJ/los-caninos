<?php

/*
Router file to use with PHP's built-in server.
Do not use in production.
*/

const CUSTOM_MIME_TYPES = array(
  'txt' => 'text/plain',
  'htm' => 'text/html',
  'html' => 'text/html',
  'php' => 'text/html',
  'css' => 'text/css',
  'js' => 'application/javascript',
  'json' => 'application/json',
  'xml' => 'application/xml',
  'swf' => 'application/x-shockwave-flash',
  'flv' => 'video/x-flv',
  'png' => 'image/png',
  'jpe' => 'image/jpeg',
  'jpeg' => 'image/jpeg',
  'jpg' => 'image/jpeg',
  'gif' => 'image/gif',
  'bmp' => 'image/bmp',
  'ico' => 'image/vnd.microsoft.icon',
  'tiff' => 'image/tiff',
  'tif' => 'image/tiff',
  'svg' => 'image/svg+xml',
  'svgz' => 'image/svg+xml',
  'zip' => 'application/zip',
  'rar' => 'application/x-rar-compressed',
  'exe' => 'application/x-msdownload',
  'msi' => 'application/x-msdownload',
  'cab' => 'application/vnd.ms-cab-compressed',
  'mp3' => 'audio/mpeg',
  'qt' => 'video/quicktime',
  'mov' => 'video/quicktime',
  'pdf' => 'application/pdf',
  'psd' => 'image/vnd.adobe.photoshop',
  'ai' => 'application/postscript',
  'eps' => 'application/postscript',
  'ps' => 'application/postscript',
  'doc' => 'application/msword',
  'rtf' => 'application/rtf',
  'xls' => 'application/vnd.ms-excel',
  'ppt' => 'application/vnd.ms-powerpoint',
  'odt' => 'application/vnd.oasis.opendocument.text',
  'ods' => 'application/vnd.oasis.opendocument.spreadsheet'
);

$query = isset($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING'] : '';
$url = str_replace($query, '', $_SERVER['REQUEST_URI']);

function get_mime($url) {
  $extension = explode("?", pathinfo($url, PATHINFO_EXTENSION))[0];
  if (isset(CUSTOM_MIME_TYPES[$extension])) return CUSTOM_MIME_TYPES[$extension];
  else return 'text/plain';
}

function page($path, $status = 200) {
  http_response_code($status);
  require(__DIR__.$path);
}

function asFile($path) {
  http_response_code(200);
  header('Content-Length: '.filesize(__DIR__.$path));
  header('Content-Type: '.get_mime($path));
  readfile(__DIR__.$path);
}

if (preg_match('/^\/phpmyadmin$/', $url)) {
  header("Location: /phpmyadmin/index.php");
  exit();
} else if (preg_match('/^\/phpmyadmin/', $url)) {
  return false;
}

// Match unallowed paths
if (preg_match('/^\/models\/.*$/', $url)) return page("/views/error/404.php", 404);
else if (preg_match('/^\/components\/.*$/', $url)) return page("/views/error/404.php", 404);

// Match index
else if ($url === '/') return page("/views/index.php");

// Match files inside subdirectories
else if (
  preg_match('/\/$/', $url) && 
  !preg_match('/^\/controllers/', $url) &&
  is_file(__DIR__.preg_replace('/^\/(.+?)\/$/', '/views/${1}.php', $url))
) return page(preg_replace('/^\/(.+?)\/$/', '/views/${1}.php', $url));

// Match index.php files
else if (
  preg_match('/\/$/', $url) && 
  !preg_match('/^\/controllers/', $url) &&
  is_dir(__DIR__."/views".$url) &&
  is_file(__DIR__."/views".$url."index.php")
) return page("/views".$url."index.php");

// Match any other file inside views
else if (
  !preg_match('/\/$/', $url) && 
  !preg_match('/^\/controllers/', $url) &&
  is_file(__DIR__."/views".$url)
) return asFile("/views".$url);

// Match files in controllers
else if (
  preg_match('/\/$/', $url) && 
  preg_match('/^\/controllers/', $url) &&
  is_file(__DIR__.preg_replace('/(.+?)\/$/', '${1}.php', $url))
) return page(preg_replace('/(.+?)\/$/', '${1}.php', $url));

// Match index.php files in controllers
else if (
  preg_match('/\/$/', $url) && 
  preg_match('/^\/controllers/', $url) &&
  is_dir(__DIR__.$url) &&
  is_file(__DIR__.$url."index.php")
) return page($url."index.php");

// Not found
else return page("/views/error/404.php", 404);

?>