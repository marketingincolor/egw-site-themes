/**
 * Author: Doe
 * Purpose: Animations for blog containers
 * Date: 02/06/2017
 */

jQuery(document).ready(function(){
	jQuery('.sponsored-post-bar').mouseenter(function(){
		jQuery(this).stop().animate({height: '100%', opacity: '0.95'}, "slow");
		jQuery('.tooltip-text').css('display', 'block');
	});
	jQuery('.sponsored-post-bar').mouseleave(function(){
		jQuery(this).stop().animate({height: '25px', opacity: '1'}, "slow");
		jQuery('.tooltip-text').hide();
	});
});