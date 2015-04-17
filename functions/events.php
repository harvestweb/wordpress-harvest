<?php

/**
 * EVENTS.PHP
 * =============================================================================
 * Customize the events calendar
 */


/**
 * Remove default stylesheet, replaced by custom stylesheet in
 * gemini/src/sass/custom/_events.scss
 */
function replace_tribe_events_calendar_stylesheet() {
  return false;
}
add_filter('tribe_events_stylesheet_url', 'replace_tribe_events_calendar_stylesheet');
