
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
					
							<!-- Clickable server IP -->
				<div class="jumbotron-left">
					<p>
						Chat with us at <span class="jumbotron-server"><button class="jumbotron-server"><a href="ts3server://talk.blockmadness.com">talk.blockmadness.com</a></button></span>
						<span id="jumbotron-copier"></i> Click to open Teamspeak</span>
					</p>
				</div>	
			</div>
		</div> <!-- /.jumbotron -->
		<!-- Notice that server is down -->
			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col col-lg-2">
					</div>
					<div class="col-12 col-md-auto">
					<div class="alert alert-danger" role="alert">We are aware that the server is not up at this time, We are doing our best to get it working ASAP.</div>
					</div>
					<div class="col col-lg-2">
					</div>
				</div>
			</div>
		<!-- Features section -->
		<div class="features">
			<!-- feautre list -->
			<div class="feature-list">
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon-check">
							<i class="fa fa-check fa-3x"></i>
						</div>
						<!-- Row one of features -->
						<div class="col-md-8">
							<h3>In-game monitoring</h3>
							<p>Our wonderful staff team is active in all of our servers, in order to provide you the best experience. </p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-gamepad fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Games</h3>
							<p>At BlockMadness we offer a variety game servers! Continuously adding more overtime!</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-comments-o fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Great Community</h3>
							<p>With a friendly community of devoted players, keep in touch with in-game messaging, Voice-Chat on Teamspeak or Discord or participate in discussions on the forums!</p>
						</div>
					</div>
				</div>
				<!-- Row 2 of features -->
				
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-handshake-o fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Competitiveness</h3>
							<p>Compete together with a group of friends in a variety of games! We all have our individual talents!</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-hdd-o fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Dedicated Hardware</h3>
							<p>With our own high-spec hardware! We can ensure our services run smoothly!</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-4 col-md-icon">
							<i class="fa fa-users fa-3x"></i>
						</div>
						<div class="col-md-8">
							<h3>Clans</h3>
							<p>Within BlockMadness we have a range of clans. Create or join your own!</p>
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
