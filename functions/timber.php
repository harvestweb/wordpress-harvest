<?php

/**
 * TIMBER.PHP
 * =============================================================================
 * Functions for Timber (Twig)
 */

if (!class_exists('Timber')){
  add_action( 'admin_notices', function(){
    echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
  });
  return;
}

class MySite extends TimberSite {

  function __construct(){
    add_theme_support('post-formats');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_filter('timber_context', array($this, 'add_to_context'));
    add_filter('get_twig', array($this, 'add_to_twig'));
    add_action('init', array($this, 'register_post_types'));
    add_action('init', array($this, 'register_taxonomies'));
    parent::__construct();
  }

  function register_post_types(){
    //this is where you can register custom post types
  }

  function register_taxonomies(){
    //this is where you can register custom taxonomies
  }

  function path() {
    return rtrim(ABSPATH, "/");
  }

  function add_to_context($context){
    $context['foo'] = 'bar';
    $context['stuff'] = 'I am a value set in your functions.php file';
    $context['notes'] = 'These values are available everytime you call Timber::get_context();';
    $context['menu'] = new TimberMenu();
    $context['short_menu'] = new TimberMenu('Short');
    $context['site'] = $this;
    return $context;
  }

  function add_to_twig($twig){
    /**
     * Function to check if a file exists.
     * NOTE: This requires an absolute path
     */
    $twig->addExtension(new Twig_Extension_StringLoader());
    $twig->addFunction('file_exists', new Twig_Function_Function('file_exists'));
    $twig->addFunction('environment', new Twig_Function_Function('get_environment'));
    return $twig;
  }

}

new MySite();

function get_environment() {
 return isset($_GET['environment']) ? $_GET['environment'] : "none";
}
