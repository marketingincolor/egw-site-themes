/**
 * Author: Doe
 * Purpose: Animations for blog containers
 * Date: 02/06/2017
 */

jQuery(document).ready(function(){
	jQuery('div.sponsored-post-bar').mouseenter(function(){
		jQuery('.sponsored-post-bar').animate({height: '100%', opacity: '0.95'}, "slow");
		jQuery('.tooltip-text').css('display', 'block');
	});
	jQuery('div.sponsored-post-bar').mouseleave(function(){
		jQuery('.sponsored-post-bar').animate({height: '25px', opacity: '1'}, "slow");
		jQuery('.tooltip-text').hide();
	});
	jQuery('.sponsored-by').mouseenter(function(){
		jQuery('.sponsored-posts-orange-tooltip').animate({height: "100%", opacity: '0.95'}, "slow");
		jQuery('.tooltip-text').css('display', 'block');
		jQuery('.tooltip-heading').css('display', 'block');
		jQuery('.tooltip-paragraph').css('display', 'block');
	});
	jQuery('.sponsored-by').mouseleave(function(){
		jQuery('.sponsored-posts-orange-tooltip').animate({height: '0%', opacity: '0'}, "slow");
		jQuery('.tooltip-text').hide();
		jQuery('.tooltip-heading').hide();
		jQuery('.tooltip-paragraph').hide();
	});
});