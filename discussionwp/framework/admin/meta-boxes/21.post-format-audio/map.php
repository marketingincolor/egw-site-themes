<?php

/*** Audio Post Format ***/

$audio_post_format_meta_box = discussion_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => 'Audio Post Format',
		'name' 	=> 'post_format_audio_meta'
	)
);

	discussion_add_meta_box_field(
		array(
			'name'        => 'mkd_post_audio_link_meta',
			'type'        => 'text',
			'label'       => 'Link',
			'description' => 'Enter Audion Link',
			'parent'      => $audio_post_format_meta_box,

		)
	);