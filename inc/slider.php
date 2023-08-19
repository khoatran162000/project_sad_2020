 <div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getFirstSuggestion = $product->getFirstSuggestion();
				if($getFirstSuggestion){
					while($resultfirstsuggest = $getFirstSuggestion->fetch_assoc()){
				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultfirstsuggest['productId'] ?>"> <img src="admin/upload/<?php echo $resultfirstsuggest['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Suggestion</h2>
						<p><?php echo $fm->textShorten($resultfirstsuggest['productName'],35) ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultfirstsuggest['productId'] ?>">Details</a></span></div>
				   </div>
			   </div>
			   <?php
				}}
			    ?>

			    <?php
				$getSecondSuggestion = $product->getSecondSuggestion();
				if($getSecondSuggestion){
					while($resultsecondsuggest = $getSecondSuggestion->fetch_assoc()){
				 ?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $resultsecondsuggest['productId'] ?>"><img src="admin/upload/<?php echo $resultsecondsuggest['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Suggestion</h2>
						  <p><?php echo $fm->textShorten($resultsecondsuggest['productName'],35) ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultsecondsuggest['productId'] ?>">Details</a></span></div>
					</div>
				</div>
				<?php
				}}
			    ?>
			</div>
			<div class="section group">
				<?php
				$getThirdSuggestion = $product->getThirdSuggestion();
				if($getThirdSuggestion){
					while($resultthirdsuggest = $getThirdSuggestion->fetch_assoc()){
				 ?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultthirdsuggest['productId'] ?>"> <img src="admin/upload/<?php echo $resultthirdsuggest['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Suggestion</h2>
						<p><?php echo $fm->textShorten($resultthirdsuggest['productName'],35) ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultthirdsuggest['productId'] ?>">Details</a></span></div>
				   </div>
			   </div>
			   <?php
				}}
			    ?>

				<?php
				$getFourthSuggestion = $product->getFourthSuggestion();
				if($getFourthSuggestion){
					while($resultfourthsuggest = $getFourthSuggestion->fetch_assoc()){
				 ?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultfourthsuggest['productId'] ?>"> <img src="admin/upload/<?php echo $resultfourthsuggest['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Suggestion</h2>
						<p><?php echo $fm->textShorten($resultfourthsuggest['productName'],35) ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultfourthsuggest['productId'] ?>">Details</a></span></div>
				   </div>
			   </div>
			   <?php
				}}
			    ?>			
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php 
						$get_slider = $product->showSlider();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
						<li><img src="admin/upload/<?php echo $result_slider['slider_image'] ?>" alt=""/></li>
						<?php 
						}
						}
						 ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>