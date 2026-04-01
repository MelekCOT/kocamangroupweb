<?php
/**
 * Sayfa: faaliyet-villa
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/service-detail', null, array( 'key' => 'villa' ) );
get_footer();
