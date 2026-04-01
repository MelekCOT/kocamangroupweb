<?php
/**
 * Sayfa: faaliyet-chickers
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/service-detail', null, array( 'key' => 'chickers' ) );
get_footer();
