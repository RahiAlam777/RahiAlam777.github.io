<?php
//Jailbreak Query
    require __DIR__ . '/../SourceQuery/bootstrap.php';
	use xPaw\SourceQuery\SourceQuery;
	
	// For the sake of this example
	Header( 'X-Content-Type-Options: nosniff' );
			
	// Edit this ->
	define( 'SQ_SERVER_ADDR', '149.202.88.7' ); //149.202.88.7
	define( 'SQ_SERVER_PORT', 27015 );
	define( 'SQ_TIMEOUT',     2 );
	define( 'SQ_ENGINE',      SourceQuery::SOURCE );
	// Edit this <-
			
	error_reporting(0);
	$Query = new SourceQuery( );
	$playersOnline = Array();
		
	$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );
	
	$map = $Query->GetInfo( )[Map];
	$pOnline = $Query->GetInfo( )[Players];
	$maxPlayers = $Query->GetInfo( )[MaxPlayers];
	
	foreach ($Query->GetPlayers( ) as $player) {
		array_push($playersOnline, $player[Name]);
	}
		
	$Query->Disconnect( );
	
	$status = "";
	$statusWord = "";
	function ping($host,$port=27015,$timeout=6)
	{
        $fsock = fsockopen($host, $port, $errno, $errstr, $timeout);
        if ( ! $fsock )
        {
                return FALSE;
        }
        else
        {
                return TRUE;
        }
	}
	
	$host = 'jb.join-ob.com';
	$up = ping($host);
	
	if ( $up ) {
		$status = "statusText";
		$colorCode = "dot";
		$statusWord = "Online";
	}
	else {
		$status = "statusTextOffline";
		$colorCode = "dotRed";
		$statusWord = "Offline";
	}
	?>
	
	
	<?php 
    // TEAMSPEAK QUERY
    date_default_timezone_set("Europe/London");
    require_once("TeamSpeak3/TeamSpeak3.php");
    TeamSpeak3::init();
    
    header('Content-Type: text/html; charset=utf8');
    
    $TSstatus = "statusText";
    $count = 0;
    $max = 0;
	$TScolorCode = "dot";
	$TSstatusWord = "Online";
	
    try {
        $ts3 = TeamSpeak3::factory("serverquery://LandingPage:oSykFkwW@149.202.88.7:10011/?server_port=9987&use_offline_as_virtual=1&no_query_clients=1");
        $TSstatus = $ts3->getProperty("virtualserver_status");
        $count = $ts3->getProperty("virtualserver_clientsonline") - $ts3->getProperty("virtualserver_queryclientsonline");
        $max = $ts3->getProperty("virtualserver_maxclients");
        if ($TSstatus=="offline")
        {
            $TSstatus = "statusTextOffline";    
            $TScolorCode = "dotRed";
    	    $TSstatusWord = "Offline";
        } 
        else {
            $TSstatus = "statusText";  
        }
    }
    catch (Exception $e) {
        //echo '<div style="background-color:red; color:white; display:block; font-weight:bold;">QueryError: ' . $e->getCode() . ' ' . $e->getMessage() . '</div>';
        echo $e->getMessage();
        $TSstatus = "statusTextOffline";
    }
    //echo '<span class="ts3status">TS3 Server Status: ' . $status . '</span><br/><span class="ts3_clientcount">Clients online: ' . $count . '/' . $max . '</span>';
    ?>
    
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to OB</title>
	<link rel="shortcut icon" href="img/ob.ico">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
</head>

<body id="page-top" class="index">
	
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="page-scroll" href="#page-top">
<img class="logoimg" src="img/obbanner.png" alt="Outbreak Community">
</a>
            </div>
	
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
	<div class="logoimg"></div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Servers</a>
                    </li>
		    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Links</a>
                    </li>
                    <li>
                        <a href="http://www.outbreak-community.com/Donate/" target="_blank">Donate <i class="fa fa-external-link" style="font-size: 15px;vertical-align:top;"></i></a>
                    </li>
                     <li>
                        <a href="http://join-ob.com/forums" target="_blank">Forums <i class="fa fa-external-link fa-lg" style="font-size: 15px;vertical-align:top;"></i></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
<div class="container">
            <div class="intro-text">
                
		<?php
		
		$useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		{
		    echo '<img style="padding-top:100px" width=70% height=auto src="img/logo2.png"/>';    
		}
		else {
		    echo '<iframe style="max-width:100%;min-height:100%;border: 6px solid #191918;" width="1156" height="640" src="https://www.youtube.com/embed/ZND-mqrJXsM?&amp;rel=0&amp;loop=1&amp;modestbranding=0&amp;hd=1&amp;showinfo=0&amp;controls=1&amp;iv_load_policy=3&amp;wmode=transparent&amp;autohide=1&amp;autoplay=0&amp;disablekb=1&amp;fs=0&amp;html5=1&amp;enablejsapi=1" frameborder="0" allowfullscreen></iframe>';
		}
	    ?>
	
	    <!--<video style="max-width:100%;min-height:100%;" width="1156" height="640" controls poster="https://cdn.photographylife.com/wp-content/uploads/2014/06/Nikon-D810-Image-Sample-6.jpg">
  <source src="OBIntro.mp4" type="video/mp4">
</video>-->
	
		<div class="intro-heading">Gaming Community since 2012</div>
		
                <a href="http:\\join-ob.com/forums" class="page-scroll btn btn-xl">Proceed to Forums</a><br><br>

<a href="#services" class="page-scroll">
          <i class="fa fa-chevron-circle-down fa-3x" style="color:#fff;"></i>
        </a>
            </div>
		</div>

    </header>
    <!-- Services Section -->
    <section id="services" class="bg-light-gray">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12 text-center" >
                    <h2 class="section-heading">Our Servers</h2>
                    <h3 class="section-subheading text-muted">Come and get involved!</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="team-member">
			<div class="image">
                        <img src="img/team/jb.jpg" class="img-responsive" alt=""/>
			<div class="sSquare"></div> <!-- status background -->
			<ul class="dot">
			    	
			    <?php echo '<li class="'.$colorCode.'"></li> <h3 class="'.$status.'">'.$statusWord.'</h3>'; 	?>
		</ul></div>
			
                        <h4>Jailbreak</h4>
                        <p class="text-muted">jb.join-ob.com
                        <?php 
                            if ($up)
                        {
                            echo '<br>';
                            echo 'Current Map: <span class="mapColor">'.$map.'</span>';
                            echo '<br>';
                            echo 'Players: <span class="playersColor">'.$pOnline.'/'.$maxPlayers.'</span>';
                        }
                        ?>
                        </p>
  	<button class="buttonc" onclick="window.location = 'steam://connect/jb.join-ob.com'"><span>Join </span></button>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="team-member">
                        <div class="image">
                        <img src="img/team/ts5.png" class="img-responsive " alt="Teamspeak Image">
                        <div class="sSquare"></div> <!-- status background -->
            			<ul class="dot">
            			    <?php echo '<li class="'.$TScolorCode.'"></li> <h3 class="'.$TSstatus.'">'.$TSstatusWord.'</h3>'; 	?>
            		    </ul></div>
                        <h4>Teamspeak</h4>
                        <p class="text-muted">ts.join-ob.com
                        <br>
                        <?php echo 'Users Online: <span class="playersColor">'.$count.'/'.$max.'</span>'; ?>
                        <br>
                        </p>
                        
  	<button class="buttonc" onclick="window.location = 'ts3server://ts.join-ob.com?port=9987'"><span>Join </span></button>
<!--steam://connect/jb.join-ob.com-->
                    </div>
                </div>
                
                <!--<div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/csoonv2.png" class="img-responsive " alt="">
                        <h4>TBC</h4>
                        <p class="text-muted">surf.join-ob.com</p>
                        
  	<button class="buttonc" onclick="window.location = 'steam://connect/surf.join-ob.com'"><span>Join </span></button>-->

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">We specialise in providing a fun atmosphere and great player experience on our servers as we believe you should enjoy playing with the players as well as your favourite game mode. 

If CS:GO isn't your thing, don't worry! Our community has a very diversed player-base who actively play other games such as League of Legends, GTA V, Overwatch and much more!</p>
                </div>
            </div>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Tell me more about OB!</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/logo.png" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    
                                    <h4 class="subheading">Who are we?</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">We are an online gaming community formed in February 2012 from Counter-Strike:Source. We then later moved on to be a CS:GO based, multi-gaming community planning to continue growing and progressing. </p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/atmos.png" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    
                                    <h4 class="subheading">Community Atmosphere</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">The friendly and lively atmosphere created by our members makes the servers a daily hang-out place after school or work. Whether you just want to have a chat with your best mates in the OG Channel or play a 5v5 competitive Gather, we can guarantee you will have a great time.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/event.png" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    
                                    <h4 class="subheading">Events & Tournaments</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Every 2 weeks, on a Sunday night, the community gathers on teamspeak for an Event hosted by different members of Staff. Events can be something like a prop-hunt, zombie survival or involve other games like GTA or LoL. We also host larger and more competitive tournaments such as OB Championship(League of Legends) and ESL Outbreak(CS:GO) where you team up with others to win prize money and much more!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/meetup.png" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                   
                                    <h4 class="subheading">Meetups</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">What really separates us from other communites are the meetups! We have had multiple meetups in the last few years where members from all over Europe including the UK, Netherlands, Norway and Finland have booked their flight/train or hotel tickets and have met up for drinks and activies such as Clubbing,Go-Karting and more!
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Community!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

 <!-- Links Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Links</h2>
                    <h3 class="section-subheading text-muted">Check out our other pages!</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="http://steamcommunity.com/groups/OutbreakRegular/members" target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/steamgroup.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Outbreak Fan Club</h4>
                        <p class="text-muted">Our Official Steam Group</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="http://www.outbreak-community.com/Donate/" target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/donation.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Donation Page</h4>
                        <p class="text-muted">Help keep the community going</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="http://www.outbreak-community.com/forums/index.php?/staff/" target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/staff.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Staff Team</h4>
                        <p class="text-muted">Outbreak Admin Team</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="http://www.outbreak-community.com/forums" target="_blank" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/forums.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>FORUMS</h4>
                        <p class="text-muted">Catch up on the latest drama!</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/csoon.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>OB Server Maps</h4>
                        <p class="text-muted">Find out more about our maps!</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/csoon.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>In-game Store Items</h4>
                        <p class="text-muted">View our models & player items!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    <div class="bottomBar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6"  >
                    <a href="http://www.outbreak-community.com/forums/index.php?/forum/4-introduce-yourself/">
			<center>
                       <i class="fa fa-hand-paper-o fa-3x"></i>
			<h4>Introduce Yourself</h4>
			</center>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="http://www.outbreak-community.com/forums/index.php?/forum/9-news-and-updates/">
                       <center>
                       <i class="fa fa-newspaper-o fa-3x"></i>
			<h4>News and Updates</h4>
			</center>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="http://www.outbreak-community.com/forums/index.php?/forum/31-events/">
                       <center>
                       <i class="fa fa-star-o fa-3x"></i>
			<h4>Events and Tournaments</h4>
			</center>
                    </a>
                </div>
                <!--<div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">
	
                    </a>
                </div>-->
            </div>
        </div>
   </div>

    <footer style="background-color:#222;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright" style="color:#E94618;">Copyright &copy; 2016 Outbreak-Community</span>
	
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a target="_blank" href="http://steamcommunity.com/groups/OutbreakRegular"><i class="fa fa-steam"></i></a>
                        </li>
                        <li><a target="_blank" href="https://www.twitch.tv/outbreakcommunity"><i class="fa fa-twitch"></i></a>
                        </li>
                        <li><a target="_blank" href="https://www.youtube.com/channel/UCSGbAoE-MdwPnKUvoJ2LYIw"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
<li><span style="color:#E94618;">Design:</span> <span style="color:#E94618;">Gunstar</span></a>
                       </li>
                        <li><a href="http://www.outbreak-community.com/forums/index.php?/contact/" target="_blank">Contact Us</a>
                       </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

    <script>
	$(function() {
	    $('.scroll-down').click (function() {
	      $('html, body').animate({scrollTop: $('section.ok').offset().top }, 'slow');
	      return false;
	    });
	  });
	</script>
</body>

</html>