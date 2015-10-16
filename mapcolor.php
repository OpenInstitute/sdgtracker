<?php include ('inc/conn.inc'); 

$params = explode('_', $_GET['params']); 
$goal_id = $params[0];
$ind = $params[1];
$Yr = $params[2];
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
					
					//echo $_GET['ind'];
					$sdgid =  ($goal_id=='') ? 1 : $goal_id;
					$sql_ = "SELECT * FROM sdg_indicators WHERE sdg_goalID = $sdgid AND indicator_tablesource != '' LIMIT 1 ";
					//echo $sql_;
					$result_ = mysql_query($sql_) or die(mysql_error());
					$data_ = mysql_fetch_assoc($result_);
					$ind_ = $data_['id'];
					
					$indicator =  ($ind=='') ? $ind_ : $ind;
					
					$sql0 = "SELECT * FROM sdg_indicators WHERE `id` = $indicator ";
					//echo $sql0;
					$result0 = mysql_query($sql0) or die(mysql_error());
					$data0 = mysql_fetch_assoc($result0);
					$tbl = $data0['indicator_tablesource'];
					
//------------- Get initial year
					$sql1 = "SELECT * FROM $tbl ";
					$result1 = mysql_query($sql1) or die(mysql_error());
					//$yr = '2000';
					while($get_info=mysql_fetch_assoc($result1))
						{
							foreach($get_info as $field => $value)
							{
								if($field[0]=='Y'){
									$yr = substr($field, 1, 4);
								}
							}
						}
///-------------					
					if (is_numeric($Yr) && ($Yr!='')) {$yr = $Yr;}
					
					if ($data0['heatmap']==0){
						
						//$mC = $data0['meanCountry'];
						$sql1 = "SELECT  AVG(Y$yr) as Y FROM ". $data0['indicator_tablesource'] ." WHERE  `ISO_Code` != ''";
						//echo $sql1 ;
						$result1 = mysql_query($sql1) or die(mysql_error());
						$data1 = mysql_fetch_assoc($result1);
						$meanVal = $data1['Y'];
						
						$sql = str_replace('$yr', $yr, $data0['sqlstatement']);
						$sql = str_replace('$mC', $meanVal, $sql);
						//echo $sql;
						$result = mysql_query($sql) or die(mysql_error());
						while ($data = mysql_fetch_array($result)) {
							
								$k[$data['ISO_Code']] = $data['colorcode'] ;
							
						}
					} else {
						
						$sql = "SELECT ISO_Code, Y$yr FROM ". $data0['indicator_tablesource'] ." WHERE ISO_Code != ''";
						//echo $sql;
						$result = mysql_query($sql) or die(mysql_error());
						while ($data = mysql_fetch_array($result)) {
							
								$k[$data['ISO_Code']]= "#". PercToHex($data['Y'.$yr]);
							
						}
					}
					print(json_encode($k));
					?>
