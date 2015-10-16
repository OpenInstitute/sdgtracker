<?php include ('inc/conn.inc'); ?>
<?php $title = "SDG Tracker | Country Goal"; ?>
<?php include ('inc/header.php'); ?>
<?php include ('inc/menu.php'); ?>
<?php include ('inc/top-bar.php'); ?>
<?php 
$cid0 = 0;
if($_GET['reg']!=''){
	$reg = str_replace('"','',$_GET['reg']);
	$reg = str_replace(']','',$reg);
	$reg = str_replace('[','',$reg);
	//echo $reg;
	
	$sql0 = "SELECT * FROM  CountryRegion WHERE  ISO_Code = '$reg'";
	$result0 = mysql_query($sql0) or die(mysql_error());
	$data0 = mysql_fetch_array($result0);
	$cid0 = $data0['id'];
	
}
	$cid =  ($_GET['cid']=='') ? (($cid0==0) ? 1 : $cid0) : $_GET['cid'];
	$sql_ = "SELECT * FROM  CountryRegion WHERE  id = $cid";
	$result_ = mysql_query($sql_) or die(mysql_error());
	$data_ = mysql_fetch_array($result_);
	$ISOCode = $data_['ISO_Code'];
	$CountryName = $data_['CountryName'];
	
	$cid2 =  ($_GET['cid2']=='') ? 1 : $_GET['cid2']; 
	$sql_2 = "SELECT * FROM  CountryRegion WHERE  id = $cid2";
	$result_2 = mysql_query($sql_2) or die(mysql_error());
	$data_2 = mysql_fetch_array($result_2);
	$ISOCode2 = $data_2['ISO_Code'];
	$CountryName2 = $data_2['CountryName'];
?>

<div class="row">
	<div class="col-sm-6"> 
		<div class="panel panel-primary panel-table"> 
			<div class="panel-heading"> 
				<div class="panel-title"> 
					<h3>Map of <?php echo $data_['CountryName']; ?></h3> 
				</div> 
				<div class="panel-options"> 
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg">
						<i class="entypo-cog"></i>
					</a> 
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> 
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> 
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a> 
				</div> 
			</div> 
			<div class="panel-body">
				<script type="text/javascript">
					jQuery(document).ready(function($){
						
						(function() {
							var myCustomColors = {
								<?php
								//-----------------------------------------
										echo "'".$data_['ISO_Code']. "' : '#00FF00',\n";
								
								?>
							};
							
							map = new jvm.WorldMap({
								map: 'world_mill_en',
								container: $('#worldmap'),
								backgroundColor: '#383f47',
								showTooltip: true,
								enableZoom: true,
								regionsSelectable: true,
								regionsSelectableOne: true,
								onRegionSelected: function(){
								//alert(JSON.stringify(map.getSelectedRegions()));
								window.location.href = 'country.php?reg='+JSON.stringify(map.getSelectedRegions());
								},
								series: {
									regions: [{
									attribute: 'fill'
									}]
								}
								 
							});
						
							map.series.regions[0].setValues(myCustomColors);
						})();
						
						$('#indicator').change(function(){
							window.location.href = 'country.php?cid=<?php echo $cid;?>&cid2=<?php echo $cid2;?>&gid='+this.value;
						});
						
						$('#cid2').change(function(){
							window.location.href = 'country.php?gid=<?php echo $gid;?>&cid=<?php echo $cid;?>&cid2='+this.value;
						});
					});

				</script>

				<div id="worldmap" style="height:450px;width:100%;" class="map"></div>
			</div>
		</div>
	</div>
	<div class="col-sm-6"> 
		<div class="panel panel-primary panel-table"> 
			<div class="panel-heading"> 
				<div class="panel-title"> 
					<h3><?php echo $data_['CountryName']; ?> metadata</h3> 
				</div> 
				<div class="panel-options"> 
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg">
						<i class="entypo-cog"></i>
					</a> 
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> 
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> 
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a> 
				</div> 
			</div> 
			<div class="panel-body">
				<table class="table table-responsive"> 
					<thead> 
						<tr> 
							<th class="col-md-4">Flag</th> 
							<th class="col-md-8"><div class="flag" id="<?php echo $data_['CountryCode']; ?>"></div></th> 
						</tr> 
					</thead> 
					<tbody> 
						<tr> 
							<td><strong>Region</strong></td> 
							<td><?php echo $data_['Region'];?></td> 
						</tr>
						<tr> 
							<td><strong>Income Group</strong></td> 
							<td><?php echo $data_['IncomeGroup'];?></td> 
						</tr>
						<tr> 
							<td><strong>Special Notes</strong></td> 
							<td><?php echo $data_['SpecialNotes'];?></td> 
						</tr>
					</tbody> 
				</table>
			</div> 
		</div> 
	</div>
</div>
<a name="data"></a>
<div class="row" style="margin-top: 20px;">
	<div class="panel panel-default " data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->
		<!-- panel head -->
		<div class="panel-heading">
			<div class="panel-title col-md-12">
			<form method="post" action="country.php?cid=<?php echo $cid; ?>#data">
			<div class="col-md-6">
			<label class="col-sm-12 control-label">Select Goal</label>
				<select class="selectpicker btn btn-default col-md-12 btn-color" name="gid" id="indicator">
					
				<?php
					$sql = "SELECT * FROM  sdg_goals  ";
					$result = mysql_query($sql) or die(mysql_error());
					while ($data = mysql_fetch_array($result)) {
						if($_GET['gid']==$data['id']){ $sel='selected'; }
							echo "<option value=".$data['id']." ". $sel ."> ".$data['menu_name'].  "</option>";
							$sel='';
					}
				?>
				 </select>
				</div>
				<div class="col-md-6">
				<label class="col-sm-12 control-label">Compare <b><?php echo $data_['CountryName']; ?></b> with other country?</label>
				<select class="selectpicker btn btn-default col-md-12 btn-color" name="countyid2" id="cid2">
				<?php
					//$sdgid =  ($_POST['gid']=='') ? 1 : $_POST['gid']; 
					$sqlC = "SELECT DISTINCT CountryName, id FROM CountryRegion WHERE ISO_Code IS NOT NULL ORDER BY  CountryName ASC ";
					$resultC = mysql_query($sqlC) or die(mysql_error());
					echo "<option value=0> Select to Compare</option>";
					while ($dataC = mysql_fetch_array($resultC)) {
						if($_GET['cid2']==$dataC['id']){ $sel1='selected'; }
							echo "<option value=".$dataC['id']." ". $sel1 ."> ".$dataC['CountryName'].  "</option>";
							$sel1='';
					}
				?>
				 </select>
				 </div>
			</div>
			
			</form>	
		</div>
	</div>
</div>				
<div class="row">
	<div class="col-md-12">
		<!-- start the indicator table loop -->
		<script type="text/javascript">
		// Line Charts
			
		jQuery(document).ready(function($) {
			<?php
			$counter=0;
			$sdgid =  ($_GET['gid']=='') ? 1 : $_GET['gid']; 
			$sql2 = "SELECT * FROM  sdg_indicators WHERE  sdg_goalID = $sdgid AND indicator_tablesource !=''";
			$result2 = mysql_query($sql2) or die(mysql_error());
			
			while ($data2 = mysql_fetch_array($result2)) {
			$d='';	
			$tbl = $data2['indicator_tablesource'];
			$tbl_head[] = $data2['IndicatorHeader'];
			?>


				// Line Charts
			var line_chart_<?php echo $counter; ?> = $("#line-chart-<?php echo $counter; ?>");
			line_chart_<?php echo $counter; ?>.parent().show();
			
			var line_chart<?php echo $counter; ?> = Morris.Line({
			element: 'line-chart-<?php echo $counter; ?>',
data: [<?php 
				$y = array();
				$c = array();
				$c1 = array();
				$c2 = array();
				$yr = date(Y) - 10;
					$sql0 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tbl'";
					$result0 = mysql_query($sql0) or die(mysql_error());
					while($data0 = mysql_fetch_assoc($result0)){
						if($data0['COLUMN_NAME'][0]=='Y'){
							$t = substr($data0['COLUMN_NAME'], 1, 4);
							if ( $t >= $yr){
								$c[] = $data0['COLUMN_NAME'];
								$y[] = "'". substr($data0['COLUMN_NAME'], 1, 4) ."'";
							}
						}
					}
					$col = implode(",", $c); 
//------country 1 -------
					$sqlC1 = "SELECT $col FROM $tbl WHERE ISO_Code = '$ISOCode'";
					//echo $sql1;
					$resultC1 = mysql_query($sqlC1) or die(mysql_error());
					$t=0;
					$dataC1 = mysql_fetch_assoc($resultC1);
					foreach($c as $valC1){
						$c1[] = $dataC1[$valC1]*1;
						$t++;
					}
//------country 2 -------	

					$sqlC2 = "SELECT $col FROM $tbl WHERE ISO_Code = '$ISOCode2'";
					//echo $sql2;
					$resultC2 = mysql_query($sqlC2) or die(mysql_error());
					$dataC2 = mysql_fetch_assoc($resultC2);
					foreach($c as $valC2){
						$c2[] = $dataC2[$valC2]*1;
					}


//------Enc country list -------			
						
					for($j=0; $j<$t; $j++) {
						$d .= "{";
						$d .= "y: ". $y[$j] .",";
						$d .= "a:". $c1[$j] .",b:". $c2[$j];
						$d .= "},";
					}
					$d = substr($d, 0, -1);
					echo $d .'],';
?>

				xkey: 'y',
				ykeys: ['a','b'],
				labels: ['<?php echo $CountryName;?>','<?php echo $CountryName2;?>'],
				lineColors:['#1E00FF','#045C02'],
				redraw: true
				});
				line_chart_<?php echo $counter; ?>.parent().attr('style', '');
<?php $counter++; } ?>
		
		}); 
		</script>

<?php 	
	for ($i=0; $i<$counter; $i++) {
?>	

<div class="col-sm-6"> 
	<div class="panel panel-primary panel-table"> 
		<div class="panel-heading"> 
			<div class="panel-title"> 
				<strong><?php echo $tbl_head[$i]; ?></strong>
			</div> 
			<div class="panel-options"> 
				<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg">
					<i class="entypo-cog"></i>
				</a> 
				<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> 
				<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> 
				<a href="#" data-rel="close"><i class="entypo-cancel"></i></a> 
			</div> 
		</div> 
		<div class="panel-body">
			<div id="line-chart-<?php echo $i; ?>"></div>
		</div> 
	</div> 
</div>
		
	<?php } ?>
	</div>
</div>	
		

		<?php include('inc/footer.php'); ?>
