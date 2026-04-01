<?php
/**
 * Sayfa: faaliyet-gayrimenkul
 *
 * @package Kocaman_Group
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/service-detail', null, array( 'key' => 'gayrimenkul' ) );
get_footer();
