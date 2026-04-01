<?php
/**
 * Sayfa: faaliyet-insaat
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/service-detail', null, array( 'key' => 'insaat' ) );
get_footer();
