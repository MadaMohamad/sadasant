<!DOCTYPE HTML>

<!--
sadasant.com
by Daniel R.
c) 2012
-->

<?
$minified = $_GET['development'] ? '' : '.min';
if ($_GET['turn']) {
  $_SESSION['black'] = $_SESSION['black'] ? false : true;
}
$B = !$_SESSION['black'];
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no"/>
	<title>sadasant.com</title>
	<link rel="icon" type="image/x-icon" href="/images/sadasant.ico" />
	<link rel="alternate" type="application/rss+xml" href="/rss/" title="sadasant's RSS" />
	<link href='http://fonts.googleapis.com/css?family=Fenix&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/yui-reset-min.css" />
	<link rel="stylesheet" href="/css/<?=$B?'':'white'?>style.css" />
	<script type="text/javascript" src="/js/Shade<?=$minified?>.js"></script>
</head>
<body>

	<div id="main">
		<div id="names">
			<a href="/<?=$_GET['development']?'?development=1':''?>">
				<h1>sadasant</h1>
				<em>Daniel Rodríguez</em>
			</a>
		</div>
		<ul id="links">
			<li><a href="/about">About</a></li>
			<li><a href="/projects">Projects</a></li>
			<li><a href="/hobbies">Hobbies</a></li>
			<li><a href="http://feeds.feedburner.com/Sadasant" target="_blank">RSS</a></li>
			<li><a href="http://gkl.st/sadasant" target="_blank">Geeklist</a></li>
			<li><a href="https://github.com/sadasant" target="_blank">Github</a></li>
			<li><a href="https://twitter.com/sadasant" target="_blank">Twitter</a></li>
			<li><a href="https://plus.google.com/111462690043808716220/" target="_blank">G+</a></li>
			<li><a href="https://facebook.com/sadasant" target="_blank">Facebook</a></li>
			<li><a href="http://www.linkedin.com/in/sadasant" target="_blank">LinkedIn</a></li>
		</ul>
	</div>


	<div id="left">
        <a href="<?$_SERVER['PATH_INFO']?>?turn=1"><img id="logo" src="/images/<?=$B?'white':''?>skull.png" alt="" /></a>
		<ul id="filter">
			<li><input type="text" placeholder="Type Here!" autocomplete="off"/></li>
<?
// Listing the tags
if ($p['active_tags']) {
  foreach ($p['active_tags'] as $k => $v) {
    echo '<li class="active"><a href="/?filter=' . $v . '">' . $v . '</a></li>';
  }
}
if ($p['tags']) {
  foreach ($p['tags'] as $k => $v) {
    if ($p['active_tags'] && in_array($v, $p['active_tags'])) {
      continue;
    } else {
      echo '<li><a href="/?filter=' . $v . '">' . $v . '</a></li>';
    }
  }
}
?>
		</ul>
	</div>

	<div id="trunk">
<?
// Rendering the view
self::view($p['view'], $p);
?>
	</div>

</body>
<script type="text/javascript" src="/js/site<?=$minified?>.js"></script>
</html>
