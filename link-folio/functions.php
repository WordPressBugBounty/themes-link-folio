<?php

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Link Folio for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'link_folio_register_required_plugins', 0);
function link_folio_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => 'Superb Addons',
			'slug'      => 'superb-blocks',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'link-folio',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}


function link_folio_pattern_styles()
{
	wp_enqueue_style('link-folio-patterns', get_template_directory_uri() . '/assets/css/patterns.css', array(), filemtime(get_template_directory() . '/assets/css/patterns.css'));
	if (is_admin()) {
		global $pagenow;
		if ('site-editor.php' === $pagenow) {
			// Do not enqueue editor style in site editor
			return;
		}
		wp_enqueue_style('link-folio-editor', get_template_directory_uri() . '/assets/css/editor.css', array(), filemtime(get_template_directory() . '/assets/css/editor.css'));
	}
}
add_action('enqueue_block_assets', 'link_folio_pattern_styles');


add_theme_support('wp-block-styles');

// Removes the default wordpress patterns
add_action('init', function () {
	remove_theme_support('core-block-patterns');
});

// Register customer Link Folio pattern categories
function link_folio_register_block_pattern_categories()
{
	register_block_pattern_category(
		'header',
		array(
			'label'       => __('Header', 'link-folio'),
			'description' => __('Header patterns', 'link-folio'),
		)
	);
	register_block_pattern_category(
		'call_to_action',
		array(
			'label'       => __('Call To Action', 'link-folio'),
			'description' => __('Call to action patterns', 'link-folio'),
		)
	);
	register_block_pattern_category(
		'content',
		array(
			'label'       => __('Content', 'link-folio'),
			'description' => __('Link Folio content patterns', 'link-folio'),
		)
	);
	register_block_pattern_category(
		'teams',
		array(
			'label'       => __('Teams', 'link-folio'),
			'description' => __('Team patterns', 'link-folio'),
		)
	);
	register_block_pattern_category(
		'banners',
		array(
			'label'       => __('Banners', 'link-folio'),
			'description' => __('Banner patterns', 'link-folio'),
		)
	);
	register_block_pattern_category(
		'contact',
		array(
			'label'       => __('Contact', 'link-folio'),
			'description' => __('Contact patterns', 'link-folio'),
		)
	);
	register_block_pattern_category(
		'layouts',
		array(
			'label'       => __('Layouts', 'link-folio'),
			'description' => __('layout patterns', 'link-folio'),
		)
	);
	register_block_pattern_category(
		'testimonials',
		array(
			'label'       => __('Testimonial', 'link-folio'),
			'description' => __('Testimonial and review patterns', 'link-folio'),
		)
	);

}

add_action('init', 'link_folio_register_block_pattern_categories');

// Initialize information content
require_once trailingslashit(get_template_directory()) . 'inc/vendor/autoload.php';

use SuperbThemesThemeInformationContent\ThemeEntryPoint;

ThemeEntryPoint::init([
	'theme_url' => 'https://superbthemes.com/link-folio/',
	'demo_url' => 'https://superbthemes.com/demo/link-folio/'
]);
