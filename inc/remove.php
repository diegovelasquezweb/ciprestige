<?php
//@remove adminBar
add_filter('show_admin_bar', '__return_false');
// add_action('after_setup_theme', 'remove_admin_bar');
// function remove_admin_bar() {
//   if (!current_user_can('administrator') && !is_admin()) {
//   show_admin_bar(false);
//   }
// }
//@Remove emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


//@Remove favicon admin
function remove_styles_sections(){
    global $wp_customize;
    $wp_customize->remove_control('site_icon');
}
add_action( 'customize_register', 'remove_styles_sections', 20 );

//@Remove tags
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');

add_action('init', function() {
    register_taxonomy('product_tag', 'product', [
        'public'            => false,
        'show_ui'           => false,
        'show_admin_column' => false,
        'show_in_nav_menus' => false,
        'show_tagcloud'     => false,
    ]);
}, 100);

/**
 * .. and also remove the column from Products table - it's also hardcoded there.
 */
add_action( 'admin_init' , function() {
    add_filter('manage_product_posts_columns', function($columns) {
        unset($columns['product_tag']);
        return $columns;
    }, 100);
});
//@Remove comments
add_action( 'admin_init', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

//@Remove default post-type
add_action('admin_menu','remove_default_post_type');

function remove_default_post_type() {
	remove_menu_page('edit.php');
}

remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');