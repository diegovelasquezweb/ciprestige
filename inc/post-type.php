<?php
  //@teachers custom post type
  function create_posttype() {
           //@classes
           register_post_type( 'events-post',
           array(
             'labels' => array(
               'name' => __( 'Noticias y eventos' ),
               'singular_name' => __( 'Noticia y evento' )
             ),
             'public' => true,
             'has_archive' => true,
             'rewrite' => array('slug' => 'noticias'),
             'menu_position'  => 4,
             'menu_icon' => 'dashicons-clipboard'
           )
         );


}
add_action( 'init', 'create_posttype' );
