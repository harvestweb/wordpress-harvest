<?php

function harvest_sermon_init() {

  $slug      = 'sermons';
  $menu_icon = ( floatval( get_bloginfo( 'version' ) ) >= '3.8' ) ? 'dashicons-book-alt' : NULL;


  //
  // Enable the custom post type.
  //

  $labels = array(
    'name'               => __( 'Sermons', '__harvest__' ),
    'singular_name'      => __( 'Sermon', '__harvest__' ),
    'add_new'            => __( 'Add New Sermon', '__harvest__' ),
    'add_new_item'       => __( 'Add New Sermon', '__harvest__' ),
    'edit_item'          => __( 'Edit Sermon', '__harvest__' ),
    'new_item'           => __( 'Add New Sermon', '__harvest__' ),
    'view_item'          => __( 'View Sermon', '__harvest__' ),
    'search_items'       => __( 'Search Sermons', '__harvest__' ),
    'not_found'          => __( 'No sermon items found', '__harvest__' ),
    'not_found_in_trash' => __( 'No sermon items found in trash', '__harvest__' )
  );

  $args = array(
    'labels'          => $labels,
    'public'          => true,
    'show_ui'         => true,
    'supports'        => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'author', 'custom-fields', 'revisions' ),
    'capability_type' => 'post',
    'hierarchical'    => false,
    'rewrite'         => array( 'slug' => $slug, 'with_front' => false ),
    'menu_position'   => 5,
    'menu_icon'       => $menu_icon,
    'has_archive'     => true,
    'show_in_nav_menus' => true
  );

  $args = apply_filters( 'sermonposttype_args', $args );

  register_post_type( 'sermon', $args );


  //
  // Sermon tags taxonomy.
  //

  $taxonomy_sermon_tag_labels = array(
    'name'                       => __( 'Sermon Tags', '__harvest__' ),
    'singular_name'              => __( 'Sermon Tag', '__harvest__' ),
    'search_items'               => __( 'Search Sermon Tags', '__harvest__' ),
    'popular_items'              => __( 'Popular Sermon Tags', '__harvest__' ),
    'all_items'                  => __( 'All Sermon Tags', '__harvest__' ),
    'parent_item'                => __( 'Parent Sermon Tag', '__harvest__' ),
    'parent_item_colon'          => __( 'Parent Sermon Tag:', '__harvest__' ),
    'edit_item'                  => __( 'Edit Sermon Tag', '__harvest__' ),
    'update_item'                => __( 'Update Sermon Tag', '__harvest__' ),
    'add_new_item'               => __( 'Add New Sermon Tag', '__harvest__' ),
    'new_item_name'              => __( 'New Sermon Tag Name', '__harvest__' ),
    'separate_items_with_commas' => __( 'Separate sermon tags with commas', '__harvest__' ),
    'add_or_remove_items'        => __( 'Add or remove sermon tags', '__harvest__' ),
    'choose_from_most_used'      => __( 'Choose from the most used sermon tags', '__harvest__' ),
    'menu_name'                  => __( 'Sermon Tags', '__harvest__' )
  );

  $taxonomy_sermon_tag_args = array(
    'labels'            => $taxonomy_sermon_tag_labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_ui'           => true,
    'show_tagcloud'     => true,
    'hierarchical'      => false,
    'rewrite'           => array( 'slug' => $slug . '-tag', 'with_front' => false ),
    'show_admin_column' => true,
    'query_var'         => true
  );

  register_taxonomy( 'sermon-tags', array( 'sermon' ), $taxonomy_sermon_tag_args );


  //
  // Sermon categories taxonomy.
  //

  $taxonomy_sermon_category_labels = array(
    'name'                       => __( "Sermon Series", '__harvest__' ),
    'singular_name'              => __( 'Sermon Series', '__harvest__' ),
    'search_items'               => __( "Search Sermon Series", '__harvest__' ),
    'popular_items'              => __( "Popular Sermon Series", '__harvest__' ),
    'all_items'                  => __( "All Sermon Series", '__harvest__' ),
    'parent_item'                => __( 'Parent Sermon Series', '__harvest__' ),
    'parent_item_colon'          => __( 'Parent Sermon Series:', '__harvest__' ),
    'edit_item'                  => __( 'Edit Sermon Series', '__harvest__' ),
    'update_item'                => __( 'Update Sermon Series', '__harvest__' ),
    'add_new_item'               => __( 'Add New Sermon Series', '__harvest__' ),
    'new_item_name'              => __( 'New Sermon Series Name', '__harvest__' ),
    'separate_items_with_commas' => __( "Separate sermon series with commas", '__harvest__' ),
    'add_or_remove_items'        => __( "Add or remove sermon series", '__harvest__' ),
    'choose_from_most_used'      => __( "Choose from the most used sermon series", '__harvest__' ),
    'menu_name'                  => __( "Sermon Series", '__harvest__' ),
  );

  $taxonomy_sermon_category_args = array(
    'labels'            => $taxonomy_sermon_category_labels,
    'public'            => true,
    'show_in_nav_menus' => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_tagcloud'     => true,
    'hierarchical'      => true,
    'rewrite'           => array( 'slug' => $slug . '-category', 'with_front' => false ),
    'query_var'         => true
  );

  register_taxonomy( 'sermon-series', array( 'sermon' ), $taxonomy_sermon_category_args );


  //
  // Flush rewrite rules if sermon slug is updated.
  //

  if ( get_transient( 'sermon_slug_before' ) != get_transient( 'sermon_slug_after' ) ) {
    flush_rewrite_rules( false );
    delete_transient( 'sermon_slug_before' );
    delete_transient( 'sermon_slug_after' );
  }

}

add_action( 'init', 'harvest_sermon_init' );
