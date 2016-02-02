<?php  

include '_includes/head.php'; 

$google_client = new Google_Client();
$service = new Google_CalendarService($google_client);

?>

	<div class="main_container">

		<?php
			$main_navigation = "home";  
			include '_includes/header.php';
		?>

		<div id="home_page_slideshow" class="module width_75 drop_shadow_1 remove_padding">
			<img src="<?php echo base_url(); ?>_images/people-having-drinks.png" />
		</div>

		<div id="calendar_module" class="module width_25 background_1 drop_shadow_1 rounded_corners">
			<h2>Calendar</h2>
			<?php
				date_default_timezone_set('EST');
				$yesterday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
				$end_date = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+30, date("Y")));
				$start_min = $yesterday."T00:00:00-05:00";
				$start_max = $end_date."T23:23:59-05:00";
				$parameters = array (
					"maxResults"	=> 4,
					"timeMin"		=> $start_min,
					"timeMax"		=> $start_max,
					"singleEvents" 	=> true,
					"orderBy" 		=> "startTime"
				);
				$events = $service->events->listEvents('n23ouens7j8s3ef6afvnt516ts@group.calendar.google.com', $parameters);
 				foreach ($events["items"] as $event) {
 					echo "<div class='crease_1'></div>";
 					if (isset($event["start"]["date"])) {
 						$start_date = $event["start"]["date"];
 						$parsed_date = date_parse_from_format("Y-m-d", $start_date);
 					} elseif (isset($event["start"]["dateTime"])) {
 						$start_date = $event["start"]["dateTime"];
 						$parsed_date = date_parse_from_format("Y-m-d", $start_date);
 					}
 					$matched_date_format = $parsed_date["month"]."-".$parsed_date["day"]."-".$parsed_date["year"];
 					echo "<div class='event_date'>";
 					echo $matched_date_format;
 					echo "</div>";
 					echo "<div class='event_title'>";
 					echo $event["summary"]."<br />";
 					echo "</div>";
				}
				echo "<div class='crease_1'></div>";
				echo "<a id='view_all_events' href='".base_url()."calendar'>View All Events »</a>";
			?>
		</div>

		<div class="clear_float"></div>

		<div id="signup_module" class="module width_100 background_1 drop_shadow_1 rounded_corners">
			<img src="<?php echo base_url(); ?>_images/ipad.png" />
			<div class="signup_text">
				<h2>Win an iPad!</h2>
				<p>Sign up for our weekly newsletter to find out about all the specials, events and contests coming up.</p>
			</div>
			<form id="subscribe_form" name="input" method="post">
				<input id="email" class="rounded_corners toggle_input_value" type="text" name="email" value="Email Address">
				<input id="subscribe_button" class="drop_shadow_1" type="submit" value="Submit">
				<input id="server_path" name="server_path" type="hidden" value="<?php echo base_url(); ?>" />
			</form>
			<img id="working_indicator" src="<?php echo base_url(); ?>_images/working_indicator.gif" />
			<p id="error_message"></p>
			<p id="success_message">Hey, thanks for signing up. We'll be in touch soon.</p>
			<div class="clear_float"></div>		
		</div>

		<div id="about_us" class="module width_75 background_1 drop_shadow_1 rounded_corners">
			<h2>Our Menu</h2>
			<div id="menu">
				<div class='crease_1'></div>
				<h3>Appetizers</h3>

				<h4>Nachos</h4>			
				<p>Lettuce, cheese, jalapenos, black olives &amp;amp; Salsa...<span class="price">$6</span></p>			
				<p>Add sour cream $1.00, Chicken $3, Beef ...<span class="price">$4</p> 

				<h4>Bruschetta</h4>		
				<p>Rotating, weekly preparation...<span class="price">$8</span></p>

				<h4>Loaded Potatoes</h4>	
				<p>Roasted Potatoes, Shredded Beef &amp;amp; Melted Cheese...<span class="price">$8</span></p>

				<h4>Soup/Chowder</h4>	
				<p>Daily Selection...<span class="price">$3/6</span></p>

				<h4>Parmesan Sticks</h4>
				<p>Parmesan Sticks	With Marinara Dipping Sauce...<span class="price">$7</span></p>	

				<h4>Mussels</h4>		
				<p>White Wine, Garlic, Onion, Bacon, Tomato &amp;amp; Herbs...<span class="price">$10</span></p>

				<div class='crease_1'></div>

				<h3>Salads</h3>

				<h4>Mediterranean</h4> 	
				<p>Cucumber, Tomato, Red Onion, Chick Peas, Feta Cheese...<span class="price">$7</span></p>

				<h4>Ceasar</h4>
				<p>Ceasar Dressing, Parmesan Cheese, Crostini...<span class="price">$6</span></p>

				<h4>The Front</h4>		
				<p>Dried Cherries, Cheddar, Walnuts, Apple, Maple Vinaigrette...<span class="price">$8</span></p>

				<div class='crease_1'></div>

				<h3>Tacos</h3>

				<h4>Chicken Tacos</h4>
				<p>Lettuce, Tomato, Chili-Lime Vinaigrette, Cilantro...<span class="price">$8</span></p>

				<h4>Beef Tacos</h4>
				<p>Cucumber, Tomato, Carrot, Cilantro, Sriracha Mayo...<span class="price">9</span></p>

				<h4>Fish Tacos</h4>
				<p>Lettuce, Tomato, Avocado-Lime Sauce Vierge...<span class="price">$10</span></p>

				<div class='crease_1'></div>

				<h3>Kids</h3>

				<h4>Mac &amp; Cheese</h4>		
				<p>Served with Vegetable or Potato...<span class="price">$4</span></p>

				<h4>Grilled Cheese</h4>
				<p>Choice of Bread with Chips...<span class="price">$4</span></p>

				<div class='crease_1'></div>

				<h3>Paninis &amp; Wraps (Served with Chips)</h3>

				<h4>Steak &amp; Cheese</h4>	
				<p>Short Rib, Mushroom, Onion, American Cheese...<span class="price">$10</span></p>	

				<h4>Burger*</h4>
				<p>Lettuce, Tomato choice of cheese (.50), Bacon (1.50)...<span class="price">$7</span></p>

				<h4>Pizza</h4>			
				<p>Pepperoni, Mushroom, Onion, Mozzarella, Provolone, Marinara...<span class="price">$8</span></p>

				<h4>Pesto Chicken</h4> 		
				<p>Chicken, bacon, Tomato, Provolone, Pesto...<span class="price">$8</span></p>	

				<h4>BBQ Chicken</h4>		
				<p>Chicken, Bacon, Onion, Cheddar...<span class="price">$8</span></p>		

				<h4>Buffalo Chicken</h4>
				<p>Pulled Chicken, Buffalo Sauce, Blue Cheese, Lettuce, Tomato...<span class="price">$8</span></p>

				<h4>Burrito Wrap</h4> 		
				<p>Short Rib, Cheese, Black Beans, Lettuce, Tomato, Salsa...<span class="price">$8</span></p>

				<div class='crease_1'></div>				

				<h3>Pizza 8”</h3>

				<h4>Cheese Pizza...<span class="price">$7</span></h4>

				<h4>Olde Bath</h4>		
				<p>Chicken, Bacon, Mushroom, Tomato...<span class="price">$9</span></p>

				<h4>Front St.</h4>		
				<p>Pesto, Tomato, Red Onion, Fresh Mozzarella...<span class="price">$8</span></p>

				<h4>Kennebec</h4>
				<p>Beef, Mushroom, Onion, Tomato...<span class="price">$10</span></p>

				<h4>Carleton</h4>
				<p>Buffalo Chicken, Blue Cheese, Tomato, Red Onion...<span class="price">$9</span></p>

				<h4>North End</h4>
				<p>Beef, Lettuce, Tomato, Black Bean, Nacho Cheese, Salsa...<span class="price">$10</span></p>

				<div class='crease_1'></div>

				<h3>Dinner</h3>

				<h4>Short Ribs</h4>
				<p>House Braised Short Ribs, Potato, Vegetable...<span class="price">$16</span></p>

				<h4>Baked Haddock</h4>
				<p>Lemon, Bacon, Breadcrumbs with Potato, Vegetable...<span class="price">$16</span></p>

				<h4>Garlic Chicken</h4>	
				<p>Braised 1/2 Chicken, Garlic Pan Sauce, Potato, Vegetable...<span class="price">$14</span></p>

				<h4>Chicken Pasta</h4>
				<p>Bacon, Mushroom, Tomato, Garlic Cream, Linguini...<span class="price">$14</span></p>

				<p class="disclaimer">* This food is or may be served raw or undercooked or may contain raw or undercooked foods. Consumption of this food may increase the risk of foodborne illness. Please check with your physician if you have any questi
				ons about consuming raw or undercooked foods.</p>
			</div>
		</div>

		<div id="connect" class="module width_25 background_1 drop_shadow_1 rounded_corners">
			<h2>Contact Us</h2>
			<div class='crease_1'></div>
			<p>
				102 Front St.<br />
				Bath, Maine<br />
				04530<br />
				<a href="tel:+1-207-442-6700">1-207-442-6700</a>
			<div id="map">
				<iframe width="314" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=102+Front+St,+Bath,+ME&amp;aq=0&amp;oq=102&amp;sll=43.896188,-69.972478&amp;sspn=0.447293,1.056747&amp;ie=UTF8&amp;hq=&amp;hnear=102+Front+St,+Bath,+Maine+04530&amp;t=m&amp;ll=43.919782,-69.812536&amp;spn=0.021639,0.026951&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=102+Front+St,+Bath,+ME&amp;aq=0&amp;oq=102&amp;sll=43.896188,-69.972478&amp;sspn=0.447293,1.056747&amp;ie=UTF8&amp;hq=&amp;hnear=102+Front+St,+Bath,+Maine+04530&amp;t=m&amp;ll=43.919782,-69.812536&amp;spn=0.021639,0.026951&amp;z=14&amp;iwloc=A" style="color:#2085cb;text-align:left">View Larger Map</a></small>
			</div>
		</div>

		<div class="clear_float"></div>

	<?php  include '_includes/footer_module.php'; ?>

	</div>

<?php  include '_includes/footer.php'; ?>
