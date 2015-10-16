<?php include ('inc/conn.inc'); ?>
<?php include ('inc/home-header.php'); ?>
<?php include ('inc/home-menu.php');?>

	<!-- Main Slider -->
<section class="slider-container" style="background-image: url(home-assets/images/slide-img-1-bg.png); margin-bottom:20px;">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-12">
				
				<div class="slides">
					
					<!-- Slide 1 -->
					<div class="slide" >
					
						<div class="slide-content">
							<h2>
								End Poverty
							</h2>
							
							<p>
								By 2030, eradicate extreme poverty for all people everywhere, currently measured as people living on less than $1.25 a day
								<a href="http://www.sdgtracker.info/goals.php" style="color:#fff;"><div class="btn btn-info">Go to Tracker</div></a>
							</p>
						</div>
						
						<div class="slide-image">
							<a href="#">
								<img src="home-assets/images/poverty_1.jpg" class="img-responsive" />
							</a>							
						</div>
						
					</div>
					
					<!-- Slide 2 -->
					<div class="slide" data-bg="home-assets/images/education.jpg">
						
						<div class="slide-image">
							
							<a href="#">
								<img src="home-assets/images/hunger_1.jpg" class="img-responsive" />
							</a>
						</div>
					
						<div class="slide-content text-right">
							<h2>
								End Hunger
							</h2>
							
							<p>
							End hunger, achieve food security and improved nutrition and promote sustainable agriculture
							<a href="http://www.sdgtracker.info/goals.php" style="color:#fff;"><div class="btn btn-info">Go to Tracker</div></a>
							</p>
							
						</div>
						
					</div>
					
					<!-- Slide 3 -->
					<div class="slide">
					
						<div class="slide-content">
							<h2>
								Protect the Earth
							</h2>
							
							<p>
								Integrate climate change measures into national policies, strategies and planning and Promote mechanisms for raising capacity for effective climate change-related planning and management in least developed countries and small island developing States, including focusing on women, youth and local and marginalized communities
								<a href="http://www.sdgtracker.info/goals.php" style="color:#fff;"><div class="btn btn-info">Go to Tracker</div></a>
							</p>
						</div>
						
						<div class="slide-image">
							<a href="#">
								<img src="home-assets/images/climate_1.jpg" class="img-responsive" />
							</a>
						</div>
						
					</div>
					<!-- Slide 2 -->
					<div class="slide" data-bg="home-assets/images/education.jpg">
						
						<div class="slide-image">
							
							<a href="#">
								<img src="home-assets/images/Education_1.jpg" class="img-responsive" />
							</a>
						</div>
					
						<div class="slide-content text-right">
							<h2>
								Quality Education
							</h2>
							
							<p>
							 By 2030, ensure that all girls and boys complete free, equitable and quality primary and secondary education leading to relevant and Goal-4 effective learning outcomes
							 <a href="http://www.sdgtracker.info/goals.php" style="color:#fff;"><div class="btn btn-info">Go to Tracker</div></a>
							</p>
							
						</div>
						
					</div>
					
					<!-- Slider navigation -->
					<div class="slides-nextprev-nav">
						<a href="#" class="prev">
							<i class="entypo-left-open-mini"></i>
						</a>
						<a href="#" class="next">
							<i class="entypo-right-open-mini"></i>
						</a>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</div>

</section>

<section style="margin-bottom:30px;">
<a id="contribute"></a>
	<div class="container">

	<div class="col-md-6">
		<div class="row">
			<center><div class="panel panel-header"><h3>About SDG Tracker</h3></div></center>
			
				<p style="font-size:15px;">	On September 25th 2015, 193 world leaders will commit to 17 Global Goals to achieve 3 extraordinary things in the next 15 years. End extreme poverty. Fight inequality and injustice. Fix climate change. The Global Goals for sustainable development could get these things done. In all countries. For all people.
				</p>
				<p><small style="font-size:67%;">(Copied verbatim from The <a href="http://globalgoals.org">Global Goals website</a>)</small></p>
				<p style="font-size:15px;">But then how do we know that we are making progress? More importantly, how do ordinary citizens know that we are making progress? We hope that the visualisations on this dashboard will be useful to enable all of us to see where we have come from with the Millennium Development Goals - and where we are going, looking forward. </p>
				<p><small style="font-size:67%;">We confess to have borrowed rather heavily (images especially) from the Global Goals campaign. We did this, not mischievously, but with the intention of contributing to the agenda.</small></p>
		</div>
		<div class="panel panel-header"><center><h3>Sign up for updates</h3></center></div>
		<p>Sign up to receive updates on Sustainable Development Goals or any new dataset added</p><br>
		<?php

  if (isset($_POST['emailUpdate']))  {
  
 
  $to = "hello@openinstitute.com";
  $email = $_POST['emailUpdate'];
  $subject = "New email Sign up from ". $email;
  $msg = $email." has just signed up from SDG Tracker website"; 

  
  
  mail($to, "$subject", $msg, "From:" . $email);
  
  
 

  $query = "INSERT INTO  `sdgtracker_db`.`MailingListSignUp` (`id` ,`email`) VALUES ('',  '$email');";
	  if(mysql_query($query)){
	    $fdbk = "Your email has been added to our mailing list successfully.";
	} else{
	    echo "ERROR: Could not able to execute $rs. " . mysql_error();
	}

	 echo '<div class="success col-md-12">Hi '.$email.' , Thank you for signing up! '.$fdbk.'</div>';
	  }
  
  
  else  {
?>
<form name="newsletter" method="post">
			 <div class="input-group">
			      <input type="email" class="form-control" required name="emailUpdate" id="emailUpdate" placeholder="Sign up for updates">
			      <span class="input-group-btn">
			      <input  class="btn btn-default" type="submit" name="getUpdate" value"Sign Up">
			      </span>
		    </div>
		</form> <br>
  
<?php
  }
?>
		
	</div>
	<div class="col-md-5 col-md-offset-1">

		<div class="panel panel-header"><h3>Point us to data/upload data</h3></div>
		<p>We have some data uploaded here and we have some that we are curating to upload in the next few days. Do look at the Data Catalog and if there’s any data that you have, or can help us find, upload it or point us in its direction…</p><br><br>
				<?php

					  if (isset($_POST['submitUpload']))  {
					  
					 
					  $to0 = "hello@openinstitute.com";
					  $from0 = $_POST['emailUpload'];
					  $name0 = $_POST['nameUpload'];
					  $attachment = $_POST['fileUpload'];
					  $suggestion = $_POST['commentUpload'];
					  $subject0 = $name0." has just uploaded/suggested a dataset to SDG Tracker website upload section";
					 

						$name_of_uploaded_file = basename($_FILES['fileUpload']['name']);
						$type_of_uploaded_file = substr($name_of_uploaded_file, strrpos($name_of_uploaded_file, '.') + 1);
						 
						$size_of_uploaded_file = $_FILES["fileUpload"]["size"]/1024;//size in KBs

						$max_allowed_file_size = 20000; // size in KB
						$allowed_extensions = array("ods", "jpeg", "csv", "xls", "odf");
	 

						if($size_of_uploaded_file > $max_allowed_file_size )
							{
							  $errors .= "\n Size of file should be less than $max_allowed_file_size";
							}
	 

						$allowed_ext = false;
						for($i=0; $i<sizeof($allowed_extensions); $i++)
							{
							  if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
							  {
							    $allowed_ext = true;
							  }
							}
	 
							if(!$allowed_ext)
							{
							  $errors .= "\n The uploaded file is not supported file type. ".
							  " Only the following file types are supported: ".implode(',',$allowed_extensions);
							}

							$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
							$tmp_path = $_FILES["fileUpload"]["tmp_name"];
							 
							if(is_uploaded_file($tmp_path))
							{
							  if(!copy($tmp_path,$path_of_uploaded_file))
							  {
							    $errors .= '\n error while copying the uploaded file';
							  }
							}

							$msg0 = new Mail_mime();
 
							$msg0->setTXTBody($text);
							 
							$msg0->addAttachment($path_of_uploaded_file);
							 
							$body = $msg0->get();
							 
							$extraheaders = array("From"=>$name0, "Subject"=>$subject0,"Reply-To"=>$from0);
							 
							$headers = $msg0->headers($extraheaders);
							 
							$mail = Mail::factory("mail");
							 
							$mail->send($to0, $headers, $body);

					  
					  
					  
					  
					  echo '<div class="success col-md-12">Hi '.$name0.' , Thank you for the feedback The information you provided is of much value to us!</div>';
					  }
					  
					  
					  else  {
					?>
		<form method="post" action="index.php" enctype="multipart/form-data">
			<input type="text" class="form-control" placeholder="Your name" required name="nameUpload"><br>
			<input type="email" class="form-control" placeholder="Your e-mail address" required name="emailUpload"><br>
			<textarea class="form-control" cols="40" rows="5" Placeholder="Say something" name="commentUpload"></textarea><br>
			<input type="file" class="form-control" name="fileUpload"><br>
			<div class="g-recaptcha" data-sitekey="6LcLhw0TAAAAAJzhlxDs-cjYBPdvmucbxP_cKLRS"></div><br>
			<div class="col-md-6">
			<input type="submit" name="submitUpload" class="form-control  cont-submit" value="submit">
			</div>
			<div class="col-md-6">
				<input type="reset" name="reset" class="form-control reset " value="cancel">
			</div>
		</form>

		<?php
		  }
		?>

	</div>
</section>


<!-- Client Logos 
<section class="clients-logos-container">
<div class="panel panel-header"><center><h3>The Goals</h3></center></div>
	
	<div class="container">
		
		<div class="row">
			
			<div class="client-logos carousel slide" data-ride="carousel" data-interval="3000">
			
				<div class="carousel-inner">
							
				
                           <?php
									
								$i=0;
								$sql = "SELECT * FROM  `sdg_goals` ";
										$result = mysql_query($sql) or die(mysql_error());
										while ($data = mysql_fetch_array($result)) {
											
											if($i==1) {$act = 'active';}
											$img = "";
											$img .='<div class="item '.$act .'"><a href="goal-1.php?goal_id='.$data['id'].'">';
											$img .= '<img src="'.$data['menu_img'].'"/>';
											
											$img .= '</a></div>';
$act = '';
$i++;
											echo $img;
										
										}
								
				 			?>
					
					
					
				</div>
				
			</div>
			
		</div>
		
	</div>	
</section>	
-->
<!-- Testimonails
<section class="testimonials-container">
	
	<div class="container">
		
		<div class="col-md-12">
			
			<div class="testimonials carousel slide" data-interval="8000">
			
				<div class="carousel-inner">
					
					<div class="item active">
					
						<blockquote>
							<p>
								
							</p>
							<small>
								Al Kags - co-founder at Open Institute
							</small>
						</blockquote>
						
					</div>
					
					<div class="item">
					
						<blockquote>
							<p>
								
							</p>
							<small>
								Jay Bhalla - co-founder at Open Institute
							</small>
						</blockquote>
						
					</div>
					
					
				
				</div>
			
			</div>
			
		</div>
		
	</div>
	
</section>
 -->

<!-- Client Logos 
<section class="clients-logos-container" style="min-height:150px;">
<a id="partners"></a>
<div class="panel panel-header"><center><h3>Partners</h3></center></div>
	
	<div class="container">
		
		<div class="row">
			
			<div class="client-logos carousel slide" data-ride="carousel" data-interval="5000">
			
				<div class="carousel-inner">
				
					<div class="item active">
						
						<a href="#">
							<img src="home-assets/images/oi-logo.png" />
						</a>
				
												
					</div>
					
					
					
				</div>
				
			</div>
			
		</div>
		
	</div>


	
</section>
-->	
<section style="margin-top:20px;">
	<a id="contacts"></a>
<div class="row">


	<div class="col-md-12"><center><h3>Contact Us</h3><center></div>
	<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
	<?php

  if (isset($_POST['name']))  {
  
 
  $to = "hello@openinstitute.com";
  $name = $_POST['name'];
  $from = $_POST['email'];
  $comment = $_POST['comment'];
  $subject = "New Message from ". $name. " from Contact form on SDG Tracker";

	$headers  = "From: ".$from;

  $msg = $name.' says: '."\r\n". $comment. "\r\n". 'Email address: '. $from;
  
  mail($to, $subject, $msg, $headers);


  
  
  echo '<div class="success col-md-12"> Hi '.$name.' , Thank you for the feedback, we will get in touch shortly!</div>';
  }
  
  
  else  {
?>

		<form action="index.php" method="post" name="contactForm">
            <p>
              <label for="name" id="name">Name</label><br>
              <input type="text" id="name" name="name"  size="40" placeholder="Your name (required)" required/>
              <p class="error"></p>
            </p>
            <p>
              <label for="email" id="email">E-mail</label><br>
              <input type="email" id="email" name="email" size="40" placeholder="Your email address(required)" required/><br>
              <p class="error"></p>
            </p>
           
            <p>
              <label for="comment" id="comment">Comment</label><br>
              <textarea  id="comment" name="comment" placeholder="What are your views about SDG Tracker?" cols="42" rows="7"></textarea>
            </p>
            
            	
            
            <div class="col-md-12">
              <div class="col-md-6">
                <input type="submit" name="submitCont" size="20" value="Submit" class="form-control cont-submit"/>
              </div>
              <div class="col-md-6">
                <input type="reset" name="reset" value="Clear" class="form-control reset"/>
              </div>
            </div>        
          </form>
          <?php } ?>

	</div>
	<div class="col-md-3"></div>
</div>
</section>
<style type="text/css">
	.success {
    color: green;
    border: 2px solid green;
    padding:5px;
}
/*
*Custom css
*/


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

.cont-submit, .reset {
    padding: 0 !important;
    width: 90%;
    height: 40px;
    border: 0;
    color: #fff;
    background: #545454;
    -webkit-transition: linear 0.5s;
    transition: linear 0.5s;
}
.cont-submit:hover {
	border:2px solid green;
	background: #fff;
	color: #545454;
	-webkit-transition: linear 0.5s;
	transition: linear 0.5s;
}

.reset:hover {
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

.btn-color{
     background-color: #dbdbdd;
  border-color: #d0d0d3;
}

.intro{
    font-size: 17px;
}
</style>
<?php include('inc/home-footer.php'); ?>