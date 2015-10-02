<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 1-10-15 - 12:15
 */


/**
 * Define constants that hold system path information.
 */
define( "CAMPUSWERK_SITE_ROOT_DIR", "/var/www/CWsite/" );
define( "CAMPUSWERK_SITE_CONFIG_DIR", CAMPUSWERK_SITE_ROOT_DIR . "Config/" );
define( "CAMPUSWERK_SITE_COMPOSER_DIR", CAMPUSWERK_SITE_ROOT_DIR . "work/vendor/" );
define( "CAMPUSWERK_SITE_SOURCE_DIR", CAMPUSWERK_SITE_ROOT_DIR . "work/src/" );
define( "CAMPUSWERK_SITE_PAGES_DIR", CAMPUSWERK_SITE_ROOT_DIR . "work/pages/" );

/**
 * Debug mode constant do not set it to 0 on a production server!
 */

define( "CAMPUSWERK_SITE_DEBUG_LEVEL", 5 );