
<?php $title = "SDG Tracker | Country"; ?>
<?php include('inc/header.php'); ?>
<?php include('inc/menu.php'); ?>
<?php include('inc/top-bar.php'); ?>

<div class="panel-body no-padding">
						<script type="text/javascript">
							jQuery(document).ready(function($){
								(function() {
									var myCustomColors = {
										'GR': '#f04239',
										'ES': '#f04239',
										'PT': '#f04239',
										'SE': '#f04239',
										'SI': '#f04239',
										'DK': '#f04239',
										'DE': '#f04239',
										'NL': '#f04239',
										'BE': '#f04239',
										'LU': '#f04239',
										'BG': '#f04239',
										'FR': '#f04239',
										'GB': '#f04239',
										'IE': '#f04239',
										'IT': '#f04239',
										'HR': '#f04239',
										'RO': '#f04239',
										'EE': '#f04239',
										'LV': '#f04239',
										'LT': '#f04239',
										'PL': '#f04239',
										'AT': '#f04239',
										'HU': '#f04239',
										'SK': '#f04239',
										'CZ': '#f04239',
										'LT': '#f04239',
										'FI': '#f04239',
										'CY': '#f04239',
										// Arab League
										'SA': '#06b53c',
										'SO': '#06b53c',
										'DZ': '#06b53c',
										'EG': '#06b53c',
										'LY': '#06b53c',
										'TN': '#06b53c',
										'YE': '#06b53c',
										'QA': '#06b53c',
										'JO': '#06b53c',
										'KW': '#06b53c',
										'OM': '#06b53c',
										'LB': '#06b53c',
										'SY': '#06b53c',
										'PS': '#06b53c',
										'IQ': '#06b53c',
										'MA': '#06b53c',
										'MR': '#06b53c',
										'DJ': '#06b53c',
										'AE': '#06b53c',
										'BH': '#06b53c',
										'KM': '#06b53c',
										// NFATA
										'US': '#2b303a',
										'CA': '#2b303a',
										'MX': '#2b303a',
										'KE': 'http://google.com'
									};
									
									map = new jvm.WorldMap({
										map: 'world_mill_en',
										container: $('#worldmap'),
										backgroundColor: '#CCC',
										series: {
											regions: [{
												attribute: 'fill'}]
										}
									});
								
									map.series.regions[0].setValues(myCustomColors);
								})();
							});
		
						</script>
						<div id="worldmap" style="height:450px;width:100%;" class="map"></div>
		
						
					</div>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Color</th>
						<th>Name</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td><a href="#"> <span class="badge badge-secondary">EU</span></a></td>
						<td>European Union</td>
					</tr>
					<tr>
						<td><a href="#"> <span class="badge badge-primary">NAFTA</span></a></td>
						<td>North American Free Trade Agreement</td>
					</tr>
					<tr>
						<td><a href="#"> <span class="badge badge-success">AL</span></a></td>
						<td>Arab League</td>
					</tr>
				</tbody>
			</table>		


<?php include('inc/footer.php'); ?>