<?php include('inc/conn.inc'); ?>
<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="index.php">
						<img src="assets/images/sdg-logo.png" width="120" alt="" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
			
			 	
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li class="active opened active">
					<a href="index.php">
						<i class="entypo-gauge"></i>
						<span class="title">Home</span>
					</a>
					
				</li>

				<li>
					<a href="#">
					<i class="entypo-graduation-cap"></i>
					<span class="title">SDG Goals</span>
					</a>
					<ul>
					<?php

					$goal_id =  ($_GET['goal_id']=='') ? 1 : $_GET['goal_id'];
					



							$query = "SELECT * FROM  `sdg_goals` ";
							$menuItem = mysql_query($query) or die(mysql_error());

							while ($menus = mysql_fetch_array($menuItem)) {

								$link = "<li>";
								$link .= '<span class="title">';
								$link .= $menus['menu_name'];
								$link .= "</span></li>";

								echo '<a href="goal-1.php?goal_id='.$menus['id'].'">'. $link. '</a>';
							}
					?>
						
					</ul>
				</li>

				<li>
					<a href="#">
						<i class="entypo-globe"></i>
						<span class="title">Region</span>
					</a>
					<ul>
					<?php

					
					


							$link0 = "";
							$query0 = "SELECT DISTINCT Region FROM  `CountryRegion` ";
							$menuItem0 = mysql_query($query0) or die(mysql_error());

							while ($menus0 = mysql_fetch_array($menuItem0)) {

								$link0 .= "<li>";
								$link0 .= '<a href="#">';
								$link0 .= '<span class="title">'.$menus0['Region'].'</span>'; 
								$link0 .= "</a>";

									$cid =  ($_GET['cid']=='') ? 1 : $_GET['cid'];
									$query1 = "SELECT id, CountryName FROM  `CountryRegion` WHERE Region = '".$menus0['Region'] ."'" ;
									$menuItem1 = mysql_query($query1) or die(mysql_error());
									$link0 .= "<ul>";
									while ($menus1 = mysql_fetch_array($menuItem1)) {

										$link0 .= "<li>";
										$link0 .= '<a href="country.php?cid='.$menus1['id'].'">';
										$link0 .= '<span class="title">'.$menus1['CountryName'].'</span>'; 
										$link0 .= "</a>";
										$link0 .= "</li>";

										}	
									$link0 .= "</ul>";
								$link0 .= "</li>";


							}
							echo $link0;
							
					?>
						
					</ul>
				</li>

				<li class="partner">
					<a href="index.php#partners">
						<i class="entypo-users"></i>
						<span class="title">Partners</span>
					</a>
				</li>

				<li class="contact">
					<a href="index.php#contacts">
						<i class="entypo-mail"></i>
						<span class="title">Contact Us</span>
					</a>
				</li>









			</ul>
			
		</div>

	</div>

	<div class="main-content">
