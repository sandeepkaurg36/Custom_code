<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

function custom_post_type() {
  
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'twentytwentyone' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentytwentyone' ),
        'menu_name'           => __( 'Movies', 'twentytwentyone' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentytwentyone' ),
        'all_items'           => __( 'All Movies', 'twentytwentyone' ),
        'view_item'           => __( 'View Movie', 'twentytwentyone' ),
        'add_new_item'        => __( 'Add New Movie', 'twentytwentyone' ),
        'add_new'             => __( 'Add New', 'twentytwentyone' ),
        'edit_item'           => __( 'Edit Movie', 'twentytwentyone' ),
        'update_item'         => __( 'Update Movie', 'twentytwentyone' ),
        'search_items'        => __( 'Search Movie', 'twentytwentyone' ),
        'not_found'           => __( 'Not Found', 'twentytwentyone' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
    );
      
// Set other options for Custom Post Type
      
    $args = array(
        'label'               => __( 'movies', 'twentytwentyone' ),
        'description'         => __( 'Movie news and reviews', 'twentytwentyone' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
  
add_action( 'init', 'custom_post_type', 0 );

$categories_labels = array(
    'label' => 'Categories',
    'hierarchical' => true,
    'query_var' => true
);

/*  Register taxonomies for extra post type capabilities */
register_taxonomy('movies_categories', 'movies', $categories_labels);

function add_custom_image_meta_box() {
    add_meta_box(
        'custom_image_meta_box',      // ID of the meta box
        'Custom Image',               // Title of the meta box
        'show_custom_image_meta_box', // Callback function
        'movies',                       // Post type
        'side'                        // Context (side, normal, advanced)
    );
}
add_action('add_meta_boxes', 'add_custom_image_meta_box');

function show_custom_image_meta_box($post) {
    $custom_image = get_post_meta($post->ID, '_custom_image', true);
    $custom_url =get_post_meta($post->ID, '_custom_url', true);
    $custom_select =get_post_meta($post->ID, '_custom_select', true);

    ?>
    <input type="button" id="upload_button" value="Upload Image" class="button" />
    <input type="hidden" name="custom_image" id="custom_image" value="<?php echo $custom_image; ?>" />
        <input type="url" name="custom_url" id="custom_url" value="<?php echo $custom_url; ?>" />
        <label for="cars">Choose a car:</label>
<select id="cars" name="custom_select" id="custom_select" value="<?php echo $custom_select; ?>" />
>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>

    <div id="image_preview">
        <?php if ($custom_image): ?>
            <img src="<?php echo $custom_image; ?>" style="max-width:100%;">
        <?php endif; ?>
    </div>
    <?php
}

function enqueue_image_uploader_script() {
    wp_enqueue_media();
    wp_enqueue_script('custom-image-uploader', get_template_directory_uri() . '/custom-image-uploader.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_image_uploader_script');

function save_custom_image($post_id) {
    if (isset($_POST['custom_image'])) {
        update_post_meta($post_id, '_custom_image', $_POST['custom_image']);
                update_post_meta($post_id, '_custom_url', $_POST['custom_url']);
                 update_post_meta($post_id, '_custom_select', $_POST['custom_select']);


    }
}
add_action('save_post', 'save_custom_image');


/*
* Creating a function to create our CPT
*/
  
