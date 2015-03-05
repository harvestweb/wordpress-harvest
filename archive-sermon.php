<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package   WordPress
 * @subpackage  Timber
 * @since     Timber 0.2
 */

  $templates = array('archive-'.get_post_type().'.twig', 'archive.twig', 'index.twig');

  $data = Timber::get_context();

  $data['title'] = 'Sermons';
  $data['sermons'] = Timber::get_posts();
  $data['series_group'] = Timber::get_terms('sermon-series');

  Timber::render($templates, $data);
