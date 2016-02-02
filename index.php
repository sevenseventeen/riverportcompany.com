<?php  

include '_includes/head.php'; 

// $google_client = new Google_Client();
// $service = new Google_CalendarService($google_client);

?>

	<div class="main_container">

		<?php
			$main_navigation = "home";  
			include '_includes/header.php';
		?>

		<div id="home_page_slideshow" class="module width_100 remove_padding rounded_corners">
			<img class="rounded_corners drop_shadow_1" src="_images/property.jpg" />
		</div>

		<div class="clear_float"></div>

		<div id="about_us" class="module width_75 background_1 drop_shadow_1 rounded_corners">
			<h2>Property Services</h2>
			<div id="menu">
				<div class='crease_1'></div>
				<h3>Handyman Services</h3>
				<h3>Lawn Care</h3>
				<h3>Landscaping</h3>
				<h3>Hurricane Readiness</h3>
				<h3>Painting</h3>
				<h3>Pressure Washing</h3>
				<h3>Seasonal Opening and Securing</h3>
				<h3>Real Estate Staging</h3>
				<h3>Services for Real Estate Professionals</h3>
				<h3>Roofing</h3>
				<h3>Plumbing</h3>
				<h3>Bank Property Services</h3>
			</div>
		</div>

		<div id="connect" class="module width_25 background_1 drop_shadow_1 rounded_corners">
			<h2>Contact Us</h2>
			<div class='crease_1'></div>
			<p>
				Jim Knight | Riverport/South<br />
				Port Charlotte, Florida<br />
				<a href="tel:+1-207-841-5403">1-207-841-5403</a>
			<div id="map">
				<iframe width="314" height="350" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28443.65304423575!2d-82.12444805316579!3d26.984101468192602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88db542cb1f42f61%3A0x7ae4c8ee21342bec!2sPort+Charlotte%2C+FL!5e0!3m2!1sen!2sus!4v1454449172942" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>

		<div class="clear_float"></div>

	<?php  include '_includes/footer_module.php'; ?>

	</div>

<?php  include '_includes/footer.php'; ?>
