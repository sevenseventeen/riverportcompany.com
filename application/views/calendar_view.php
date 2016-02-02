<?php  

include '_includes/head.php'; 
require_once '_api_google/src/Google_Client.php';
require_once '_api_google/src/contrib/Google_CalendarService.php';

$google_client = new Google_Client();
$service = new Google_CalendarService($google_client);

?>

	<div class="main_container">

		<?php
			$main_navigation = "calendar";  
			include '_includes/header.php';
		?>


		<div id="full_calendar">
			<iframe src="https://www.google.com/calendar/embed?showTz=0&amp;height=960&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=n23ouens7j8s3ef6afvnt516ts%40group.calendar.google.com&amp;color=%232952A3&amp;ctz=America%2FNew_York" style=" border-width:0 " width="960" height="960" frameborder="0" scrolling="no"></iframe>
		</div>

	<?php  include '_includes/footer_module.php'; ?>

	</div>

<?php  include '_includes/footer.php'; ?>
