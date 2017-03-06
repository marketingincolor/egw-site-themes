/**
 * Author: Doe
 * Purpose: Animations for blog containers
 * Date: 02/06/2017
 */

jQuery(document).ready(function(){
	jQuery('.sponsored-post-bar').mouseenter(function(){
		jQuery(this).animate({height: '100%', opacity: '0.95'}, 300);
		jQuery('.tooltip-text').css('display', 'block');
	});
	jQuery('.sponsored-post-bar').mouseleave(function(){
		jQuery(this).animate({height: '25px', opacity: '1'}, 300);
		jQuery('.tooltip-text').hide();
	});
	// jQuery('.sponsored-by').mouseenter(function(){
	// 	jQuery('.sponsored-posts-orange-tooltip').animate({height: "100%", opacity: '0.95'}, "slow");
	// 	jQuery('.tooltip-text').css('display', 'block');
	// 	jQuery('.tooltip-heading').css('display', 'block');
	// 	jQuery('.tooltip-paragraph').css('display', 'block');
	// });
	// jQuery('.sponsored-by').mouseleave(function(){
	// 	jQuery('.sponsored-posts-orange-tooltip').animate({height: '0%', opacity: '0'}, "slow");
	// 	jQuery('.tooltip-text').hide();
	// 	jQuery('.tooltip-heading').hide();
	// 	jQuery('.tooltip-paragraph').hide();
	// });
});