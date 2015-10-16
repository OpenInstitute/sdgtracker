<?php include ('inc/conn.inc'); ?>
<?php $title = "SDG Tracker | Goals"; ?>
<?php include ('inc/header.php'); ?>
<?php include ('inc/menu.php'); ?>
<?php include ('inc/top-bar.php'); ?>
<?php 
	$sdgid =  ($_GET['goal_id']=='') ? 1 : $_GET['goal_id']; 
	$sql_ = "SELECT * FROM  sdg_goals WHERE  id = $sdgid";
	$result_ = mysql_query($sql_) or die(mysql_error());
	$data_ = mysql_fetch_array($result_);
	$sdgGoal = $data_['menu_name'];
	
	$sql_ = "SELECT * FROM sdg_indicators WHERE sdg_goalID = $sdgid AND indicator_tablesource != '' LIMIT 1 ";
	//echo $sql_;
	$result_ = mysql_query($sql_) or die(mysql_error());
	$data_ = mysql_fetch_assoc($result_);
	$ind = $data_['id'];
	
	$indicator =  ($_POST['ind']=='') ? $ind : $_POST['ind'];
?>
<div class="row">
	<div class="col-md-12 panel panel-heading">
		<h3><?php echo $sdgGoal; ?></h3>
	</div>
</div>
<div class="row">
	<div class="panel panel-default " data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
		<!-- panel head -->
		<div class="panel-heading">
			<form method="post" action="goal-1.php?goal_id=<?php echo $sdgid; ?>">
				<div class="panel-title col-md-10">
					<select class="selectpicker btn btn-color btn-default col-md-12" name="indicator" id="indicator">
						<option value="">Choose Indicator</option>
					<?php
					
						$sql = "SELECT * FROM  `sdg_indicators` WHERE  `sdg_goalID` = $sdgid AND indicator_tablesource != ''";
						$result = mysql_query($sql) or die(mysql_error());
						while ($data = mysql_fetch_array($result)) {
							if($_POST['indicator']==$data['id']){ $sel='selected'; }
								echo "<option value=".$data['id']." ". $sel ."> ".$data['indicator'].  "</option>";
								$sel='';
						}
					?>
					</select>
				</div>
				
			</form>
		</div>
	</div>
	<div class="layout-slider col-md-12 center" >
    Year &nbsp;<span style="display: inline-block; width: 800px; padding: 0 0 0 35px;">
		  <input id="Slider1" type="slider" name="slider" value="2014" />  </span>
    </div>
<div id="mapdata"></div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
		
			<?php
			$sdgid =  ($_GET['goal_id']=='') ? 1 : $_GET['goal_id'];
					$sql_ = "SELECT * FROM sdg_indicators WHERE sdg_goalID = $sdgid AND indicator_tablesource != '' LIMIT 1 ";
					//echo $sql_;
					$result_ = mysql_query($sql_) or die(mysql_error());
					$data_ = mysql_fetch_assoc($result_);
					$ind = $data_['id'];
					
					$indicator =  ($_POST['indicator']=='') ? $ind : $_POST['indicator'];
					
					$sql0 = "SELECT * FROM sdg_indicators WHERE `id` = $indicator ";
					//echo $sql0;
					$result0 = mysql_query($sql0) or die(mysql_error());
					$data0 = mysql_fetch_assoc($result0);
					$tbl = $data0['indicator_tablesource'];
					
				$y=array();
				$t = date(Y) - 10;
				$i = 0;
				$sql1 = "SELECT * FROM $tbl LIMIT 1";
				$result1 = mysql_query($sql1) or die(mysql_error());
				while($get_info=mysql_fetch_assoc($result1))
				{
					foreach($get_info as $field => $value)
					{
						if(($field[0]=='Y') && (substr($field, 1, 4)>=$t) ){
							if ($i==0){ 
								$from = substr($field, 1, 4); 
							}
							$y[] =  substr($field, 1, 4);
							$to =  substr($field, 1, 4);
							$i++;
						}
						
					}
				}
			?>
			var $myText = $("#Slider1");
			$myText.data("value", $myText.val());

			setInterval(function() {
				var data = $myText.data("value"),
					val = $myText.val();

				if (data !== val) {
					$myText.data("value", val);
					mapper(val);
				}
			}, 100);
	
			mapper(<?php echo $to;?>);
			
			function mapper(Yy){
				//alert('tuko');
				
				$.get('mapcolor.php?params=<?php echo $_GET['goal_id']."_". $indicator ."_";?>'+ Yy , function(d){
				//alert(d);
				$(".jvectormap-container").remove();
						var myCustomColors = JSON.parse(d);
										
						map = new jvm.WorldMap({
							map: 'world_mill_en',
							container: $('#worldmap'),
							backgroundColor: '#383f47',
							normalizeFunction: 'polynomial',
							hoverOpacity: 0.7,
							hoverColor: false,
							regionsSelectable: true,
							regionsSelectableOne: true,
							onRegionSelected: function(){
								//alert(JSON.stringify(map.getSelectedRegions()));
								window.location.href = 'country.php?reg='+JSON.stringify(map.getSelectedRegions());
							  
							},
							series: {
								regions: [{	attribute: 'fill' }]
							}
							
						});
						map.series.regions[0].setValues(myCustomColors);
					
				});	
			}
			
			jQuery("#Slider1").slider({
				from: <?php echo $from;?>, 
				to: <?php echo $to;?>, 
				step: 1, 
				dimension: '',
				skin: 'plastic',
				scale: [<?php echo implode($y,",")?>],
			 });
			 
			$('#indicator').change(function(){
				this.form.submit();
			});
		});

	</script>
	<div class="col-md-12" ><h5><?php echo $data0['IndicatorHeader'];?></h5></div>
	<div id="worldmap" style="height:450px;width:100%;" class="map"></div>
	<div class="row">
		<div class="col-md-12">
			<?php 
			function PercToHex($value){
						
						$thirdColorHex = '00';
						$first = (1-($value/100))*255;
						$second = ($value/100)*255;

						// Find the influence of the middle color (yellow if 1st and 2nd are red and green)
						$diff = abs($first-$second);    
						$influence = (255-$diff)/2;     
						$first = intval($first + $influence);
						$second = intval($second + $influence);

						// Convert to HEX, format and return
						$firstHex = str_pad(dechex($first),2,0,STR_PAD_LEFT);     
						$secondHex = str_pad(dechex($second),2,0,STR_PAD_LEFT); 

					return $firstHex . $secondHex . $thirdColorHex ;
					}
			if ($data0['heatmap']==0){?>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th colspan="1">Legend</th>
					</tr>
					<tr>
						<th>Color</th>
						<th>Name</th>
					</tr>
				</thead>
				<?php
					echo $data0['legend'];
				?>
			</table>
			<?php } else {?>
				<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th colspan="1">Legend</th>
					</tr>
					<tr>
						<th>Color</th>
						<th>Name</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td><a href="#"><span class="badge badge-success">Green</span></a></td>
						<td>Countries that are within the global standard</td>
					</tr>
					<tr>
						<td>
							<?php
							for ($i=1; $i<10; $i++){
								$k = $i*10;
								echo '<span class="badge badge-secondary" style="background-color:#'. PercToHex($k) . '">&nbsp;</span></span>';
							}
							?>
							</td>
						<td>Countries that are not within the global standard</td>
					</tr>
					<tr>
						<td><a href="#"> <span class="badge badge-primary">Others</span></a></td>
						<td>Countries with no data</td>
					</tr>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>	
</div>
<?php include('inc/footer.php'); ?>
