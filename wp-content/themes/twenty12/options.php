<?php

function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}
function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'agency' ),
		'two' => __( 'Two', 'agency' ),
		'three' => __( 'Three', 'agency' ),
		'four' => __( 'Four', 'agency' ),
		'five' => __( 'Five', 'agency' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'agency' ),
		'two' => __( 'Pancake', 'agency' ),
		'three' => __( 'Omelette', 'agency' ),
		'four' => __( 'Crepe', 'agency' ),
		'five' => __( 'Waffle', 'agency' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Basic Settings', 'agency' ),
		'type' => 'heading'
	);






    $options[] = array(
		'name' => __( 'Add Logo', 'agency' ),
		'placeholder' => __( 'upload logo.', 'agency' ),
		'id' => 'agency_logo',
		'type' => 'upload'
	);






	    $options[] = array(
		'name' => __( 'Add Ratina Logo', 'agency' ),
		'placeholder' => __( 'upload ratina logo.', 'agency' ),
		'id' => 'ratina_logo',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Add Footer Logo', 'agency' ),
		'placeholder' => __( 'upload Footer logo.', 'agency' ),
		'id' => 'footer_logo',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Add Menu file', 'agency' ),
		'placeholder' => __( 'upload menu file.', 'agency' ),
		'id' => 'menu_file',
		'type' => 'upload'
	);

	
	
	
	
	
	$options[] = array(
		'name' => __( 'Phone No:', 'agency' ),
		'placeholder' => __( 'Enter Phone No.', 'agency' ),
		'id' => 'phone',
		'std' => '+61 0280064761',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Time:', 'agency' ),
		'placeholder' => __( 'Enter Time.', 'agency' ),
		'id' => 'time',
		'std' => 'Sunday to Monday 8:30 am - 5.00 pm',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Email:', 'agency' ),
		'placeholder' => __( 'Enter Email Address.', 'agency' ),
		'id' => 'email',
		'std' => 'sales@yourwebsite.com',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Address:', 'agency' ),
		'placeholder' => __( 'Your Address.', 'agency' ),
		'id' => 'address',
		'type' => 'textarea'
	);
		$options[] = array(
		'name' => __( 'Add Map', 'agency' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'agency' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'map',
		'type' => 'editor',
		'settings' => $wp_editor_setting
		);

		$options[] = array(
		'name' => __( 'Website:', 'agency' ),
		'placeholder' => __( 'Website link.', 'agency' ),
		'id' => 'website',
		'std' => '#',
		'type' => 'text'
	);

    $options[] = array(
		'name' => __( 'Facebook:', 'agency' ),
		'placeholder' => __( 'Enter Facebook link.', 'agency' ),
		'id' => 'facebook',
		'std' => '#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Instagram:', 'agency' ),
		'placeholder' => __( 'Enter instagram link', 'agency' ),
		'id' => 'instagram',
		'std' => '#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Youtube:', 'agency' ),
		'placeholder' => __( 'Enter Youtube link', 'agency' ),
		'id' => 'youtube',
		'std' => '#',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Pinterset:', 'agency' ),
		'placeholder' => __( 'Enter Pinterset link', 'agency' ),
		'id' => 'pinter',
		'std' => '#',
		'type' => 'text'
	);



	$options[] = array(
		'name' => __( 'Footer Text', 'agency' ),
		'type' => 'heading',
'id' => 'footer_text'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Footer About Text', 'agency' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'agency' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'footer_text',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
		

	return $options;
	
}