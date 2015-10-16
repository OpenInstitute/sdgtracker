<?php include ('inc/conn.inc'); 

		$y = "";
		$t = date(Y) - 10;
		$indicator =  (($_POST['indicatorVal']=='') || ($_POST['indicatorVal']=='Choose Year')) ? 1 : $_POST['indicatorVal'];

		$sql0 = "SELECT * FROM sdg_indicators WHERE `id` = $indicator ";
		$result0 = mysql_query($sql0) or die(mysql_error());
		$data0=mysql_fetch_assoc($result0);
		$tbl = $data0['indicator_tablesource'];
		
		$sql1 = "SELECT * FROM $tbl LIMIT 1";
		$result1 = mysql_query($sql1) or die(mysql_error());
		while($get_info=mysql_fetch_assoc($result1))
		{
			foreach($get_info as $field => $value)
			{
				if(($field[0]=='Y') && (substr($field, 1, 4)>=$t) ){
					
					$y .= "<option>". substr($field, 1, 4) ."</option>";
				}
			}
		}
		echo $y;
		//~ 
				//~ $y = "";
				//~ $yr = date(Y) - 10;
					//~ $sql0 = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tbl'";
					//~ $result0 = mysql_query($sql0) or die(mysql_error());
					//~ while($data0 = mysql_fetch_assoc($result0)){
						//~ if($data0['COLUMN_NAME'][0]=='Y'){
							//~ $t = substr($data0['COLUMN_NAME'], 1, 4);
							//~ if ( $t >= $yr){
								//~ $y .= "<option>". substr($data0['COLUMN_NAME'], 1, 4) ."</option>";
							//~ }
						//~ }
					//~ }
				//~ 
