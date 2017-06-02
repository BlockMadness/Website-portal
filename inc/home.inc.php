
<?php
/*Calling classes for pinigng*/
	use xPaw\MinecraftPing;
	use xPaw\MinecraftPingException;
	/*server settings to ping */
	define('MQ_SERVER_ADDR', '5.200.2.204');
	define('MQ_SERVER_PORT', 25565);
	define('MQ_TIMEOUT', 1);
	
	require_once 'minecraftping.class.php';
	require_once 'minecraftpingexception.class.php';
	
	$Info = false;
	$Query = null;
	/*pinging server*/
	try {
		$Query = new MinecraftPing( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );
		$Info = $Query->Query( );
		if( $Info === false ) {
			/*
			 * If this server is older than 1.7, we can try querying it again using older protocol
			 * This function returns data in a different format, you will have to manually map
			 * things yourself if you want to match 1.7's output
			 *
			 * If you know for sure that this server is using an older version,
			 * you then can directly call QueryOldPre17 and avoid Query() and then reconnection part
			 */
			$Query->Close( );
			$Query->Connect( );
			$Info = $Query->QueryOldPre17( );
		}
	}
	catch( MinecraftPingException $e ) {
		$Exception = $e;
	}
	if( $Query !== null ) {
		$Query->Close( );
	}
?>
<!-- website -->
		<!-- Carousel -->
		<div id="bmCarousel" class="carousel slide" data-ride="carousel">
			<!-- Overlay logo -->
			<div class="carousel-overlay">
				<img class="carousel-overlay-logo" src="img/home-logo01.png">
			</div>
			<!-- actual carousel -->
			<div class="carousel-inner" role="listbox">
			<!-- slide 1 -->
				<div class="item active">
					<img class="first-slide" src="img/home-banner01.png">
					<div class="container">
						<div class="carousel-caption"></div>
					</div>
				</div>
				<!-- slide 2 -->
				<div class="item">
					<img class="second-slide" src="img/home-banner02.png">
					<div class="container">
						<div class="carousel-caption"></div>
					</div>
				</div>
				<!-- slide 3 -->
				<div class="item">
					<img class="third-slide" src="img/home-banner03.png">
					<div class="container">
						<div class="carousel-caption"></div>
					</div>
				</div>
			</div>
			<!-- Carousel buttons  -->
			<a class="left carousel-control" href="#bmCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#bmCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- end carousel -->

		<!-- Jumbotron -->
		<div class="jumbotron">
			<div class="container">
			<!-- Clickable server IP -->
				<div class="jumbotron-left">
					<p>
						Play with us at <span class="jumbotron-server"><button class="jumbotron-server" data-clipboard-text="play.blockmadness.com">play.blockmadness.com</button></span>
						<span id="jumbotron-copier"><i class="fa fa-clipboard"></i> Click to copy</span>
					</p>
				</div>
				<!-- Player counter --> 
				<div class="jumbotron-right">
					<p><span class="playercount">
						<?php
							if( isset( $Exception ) ) {
								echo '?';
							} else {
								if( $Info !== false ) {
									foreach( $Info as $InfoKey => $InfoValue ) {
										if( htmlspecialchars( $InfoKey ) == 'players' && Is_Array( $InfoValue) ) {
											echo $InfoValue['online']; /* $InfoValue['max']; */
										}
									}
								} else {
									echo '?';
								}
							}
						?>
					</span> players currently online</p></div>
			</div>
		</div> <!-- /.jumbotron -->

		<!-- Features section -->
		<div class="features">
			<!-- feautre list -->
			<div class="feature-list">
			<!-- Notice that server is down -->
				<div class="container">
					<div class="row">
						<div class="col">&nbsp;</div>
						<div class="col" class="alert alert-danger" role="alert">We are aware that the server is not up at this time, We are doing our best to get it working ASAP.</div>
						<div class="col">&nbsp;</div>
						</div>
					</div>
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-gamepad fa-3x"></i>
						</div>
						<!-- Row one of features -->
						<div class="col-md-8">
							<h3>In-game monitoring</h3>
							<p>Our wonderful staff team is active in all of our servers, in order to provide you the best experience.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-gamepad fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Games</h3>
							<p>We don't only offer a minecraft server but we also host different game servers! Check out our server page!</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-comments-o fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Great Community</h3>
							<p>With a friendly community of devoted players, keep in touch with ingame messaging, Voice chat on Teamspeak or Discord and the forums!</p>
						</div>
					</div>
				</div>
				<!-- Row 2 of features -->
				
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-space-shuttle fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Leaderboards</h3>
							<p>Check who's got the highest mcMMO levels with <code>/mctop</code> in our Factions servers.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-gamepad fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>DDoS Protected</h3>
							<p>Our servers feature some of the most advanced DDoS mitigation available, so you can play with confidence.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-angle-double-up fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Ranks</h3>
							<p>We do not Sell any ranks unlikely to other server! With us you rank up depening on your play time!</p>
						</div>
					</div>
				</div>

			</div><!-- /.feature-list -->
		</div><!-- /.features -->

		<script src="js/clipboard.min.js"></script>
		<script>
			/* Server (ip) address and tooltip */
			var serverClipboard = new Clipboard('.jumbotron-server');
			
			function showTooltip(elem, msg) {
				document.getElementById('jumbotron-copier').innerHTML = msg;
			}

			serverClipboard.on('success', function(e) {
				e.clearSelection();
				showTooltip(e.trigger, '<i class="fa fa-thumbs-o-up success"></i> Copied!');
			});

			serverClipboard.on('error', function(e) {
				showTooltip(e.trigger, '<i class="fa fa-thumbs-o-down error"></i> ' + fallbackMessage(e.action));
			});
		</script>