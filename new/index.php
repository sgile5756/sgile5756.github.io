<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="css.css"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Pointer Place Apartments</title>

<script type="text/javascript" src="js/jquery.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 637;
  var slides = $('.slide');
  var numberOfSlides = slides.length;
 
  // Remove scrollbar in JS
  $('#slidesContainer').css('overflow', 'hidden');
 
  // Wrap all .slides with #slideInner div
  slides
    .wrapAll('<div id="slideInner"></div>')
    // Float left to display horizontally, readjust .slides width
	.css({
      'float' : 'left',
      'width' : slideWidth
    });
 
  // Set #slideInner width equal to total width of all slides
  $('#slideInner').css('width', slideWidth * numberOfSlides);
 
  // Insert controls in the DOM
  $('#slideshow')
    .prepend('<span class="control" id="leftControl">Clicking moves left</span>')
    .append('<span class="control" id="rightControl">Clicking moves right</span>');
 
  // Hide left arrow control on first load
  manageControls(currentPosition);
 
  // Create event listeners for .controls clicks
  $('.control')
    .bind('click', function(){
    // Determine new position
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    
	// Hide / show controls
    manageControls(currentPosition);
    // Move slideInner using margin-left
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });
 
  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
  	$('#footer').html('<span>Slide '+ (position+1) +' of '+ numberOfSlides +'</span>'); 
  
    // Hide left arrow if position is first slide
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }	    
});
</script>
</head>

<?php
function getDirectoryList ($directory) 
  {
    // create an array to hold directory list
    $results = array();

    // create a handler for the directory
    $handler = opendir($directory);

    // open directory and walk through the filenames
    while ($file = readdir($handler)) {

      // if file isn't this directory or its parent, add it to the results
      if ($file != "." && $file != "..") {
        $results[] = $file;
      }
    }

    // tidy up: close the handler
    closedir($handler);

    // done!
    return $results;
  } 
  $array = getDirectoryList('pictures');
  ?>


<body>
<div id="wrapper">
	<div id="head"><img src="images/header.png" alt="Pointer Place Apartments" /></div>
	<div id="content">
		<div id="top">
			<div class="left">
			<div id="slideshow">
			  <div id="slidesContainer">
				  <?php
					for ($i = 0; $i < count($array); ++$i)  {
						echo '<div class="slide">';
					    echo '<image id="' . $i . '" src="pictures/' . $array[$i] . '" />';
					    echo '</div>';
					}
					?>
				</div>
				<div id="footer"></div>
			</div>

			</div>
			<div class="right">
			<div class="center">
			<div class="green" style="font-size:12pt; width:70%; margin:auto;">Pointer Place was built with students in mind!</div> 
			<br/>
			</div>
			Pointer Place Apartments offers students high quality townhome-style living only minutes from campus.
			<br/><br/>
			<span class="green">General Info:</span>
 			<ul>
 				<li>5 to 6 BIG bedrooms with plenty of closet space</li>
 				<li>Large living and kitchen areas</li>
 				<li>2.5 bathrooms</li>
 				<li>9 or 12 month leases available</li>
 			</ul>

  For more information or for a showing, contact Scott at 715-340-0381 or email us!
			</div>
		</div>
		<div id="bottom">
			<div class="left">
			Additional Amenities:
 
  ● Two refrigerators
  ● Dishwasher
  ● Range
  ● Microwave
  ● Washer &amp; Dryer
  ● Cable/Internet hookups
  <br/>
  What’s included in rent:
 
  ● Heat
  ● Parking
  ● Snow Removal
  ● Lawn Care
  <br/>
  There is a bus stop directly in front of the building! The Campus Connection - Doolittle Dr. bus line will arrive at 
approximately :04 and :34 after the hour, Monday - Friday.
			</div>
			<div class="right"></div>
		</div>
	</div>
</div>
</body>

</html>
