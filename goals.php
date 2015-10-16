<?php $title = "SDG Tracker | All Goals"; ?>
<?php $headerTitle = "All Sustainable Development Goals"; ?>
<?php include('inc/header.php'); ?>
<?php include('inc/menu.php'); ?>
<?php include('inc/top-bar.php'); ?>




			
<div class="row">
	
			
				<?php $goal_id =  ($_GET['goal_id']=='') ? 1 : $_GET['goal_id']; ?>
                           <?php
								for ($i=0; $i < 18; $i++) { 
									
								
								$sql = "SELECT * FROM  `sdg_goals` WHERE $i = $goal_id";
										$result = mysql_query($sql) or die(mysql_error());
										while ($data = mysql_fetch_array($result)) {
											

											$img = "";
											$img .='<div class="goal-tile-wrapper"><a href="goal-1.php?goal_id='.$data['id'].'" class="goal-tile">';
											$img .= '<div class="goal-tile-content"><img src="'.$data['menu_img'].'" class="goal--frontpage-icon"/>';
											$img .= '<div class="overlay">';
											$img .= '<h4 class="inverted">Read More</h4></div></div></a></div>';

											echo $img;
										
										}
								}
				 			?>		
			

			
</div>

<style type="text/css">
img{
	width:100%;
}

input#name, input#email, input#subject {
    width: 100%;
    height: 40px;
    border-radius: 3px;
    border: 1px solid #ccc;
    padding: 2px 10px;
}

textarea#comment {
    width: 100%;
    border-radius: 3px;
    border: 1px solid #ccc;
}

#cont-submit, #reset {
    padding: 0 !important;
    width: 90%;
    height: 40px;
    border: 0;
    color: #fff;
    background: #545454;
    -webkit-transition: linear 0.5s;
    transition: linear 0.5s;
}
#cont-submit:hover {
	border:2px solid green;
	background: #fff;
	color: #545454;
	-webkit-transition: linear 0.5s;
	transition: linear 0.5s;
}

#reset:hover {
	border:2px solid red;
	background: #fff;
	color: #545454;
	-webkit-transition: linear 0.5s;
	transition:linear 0.5s;}

.pimg{
	width:250px;

}
.goal-tile-wrapper {
    float: left;
    color: white;
    width: 16.66667%;
    height: 0;
    padding-bottom: 16.66667%;
    display: block;
    position: relative;
    margin: 4px;}
    
.goal-tile .overlay, .download-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: 100%;
    width: 100%;
    background: black;
    background: rgba(0,0,0,0.7);
    opacity: 0;
    -webkit-transition: opacity 0.2s ease-out;
    -moz-transition: opacity 0.2s ease-out;
    -ms-transition: opacity 0.2s ease-out;
    -o-transition: opacity 0.2s ease-out;
    transition: opacity 0.2s ease-out;}
</style>
<?php include('inc/footer.php'); ?>