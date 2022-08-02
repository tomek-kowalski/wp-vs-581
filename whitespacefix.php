<?php
/**
* Plugin Name:Whitespace.
* Plugin URI: https://www.kowlski-engineering.com/
* Description: 1. Removing whitespaces.
* Version: 1.0
* Requires at least: 5.2
* Requires PHP:7.2
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Author: Tomasz Kowalski
* Text Domain: whitespace.
* Author URI: https://pl.linkedin.com/in/tomasz-kowalski-6bb6a830
**/

function ___wejns_wp_whitespace_fix($input) {
    $allowed = false;
    $found = false;
    foreach (headers_list() as $header) {
        if (preg_match("/^content-type:\\s+(text\\/|application\\/((xhtml|atom|rss)\\+xml|xml))/i", $header)) {
            $allowed = true;
        }
        if (preg_match("/^content-type:\\s+/i", $header)) {
            $found = true;
        }
    }
    if ($allowed || !$found) {
        return preg_replace("/\\A\\s*/m", "", $input);
    } else {
        return $input;
    }
}
ob_start("___wejns_wp_whitespace_fix");


