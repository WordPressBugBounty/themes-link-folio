<?php
defined('ABSPATH') || exit;
$current_theme = wp_get_theme();
$theme_name = wp_get_theme()->name;
$theme_slug = get_stylesheet();
$review_url = sprintf('https://wordpress.org/support/theme/%s/reviews/', $theme_slug);

?>
<div class="notice notice-info is-dismissible <?php echo esc_attr($notice['unique_id']); ?>">
    <style>
        .sp-review-popup-button {
            background: none;
            color: #2271b1;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }
    </style>
    <p>
        <?php echo esc_html__("We're extremely happy to see that you've been enjoying ", 'link-folio'); ?>
        <strong><?php echo $theme_name ?></strong>
        <?php echo esc_html__(" for the past week!", 'link-folio'); ?><br>
        <?php echo esc_html__("If you could take a moment to leave a rating on WordPress.org, it would help more people discover our theme and bring us joy and motivation to keep improving the theme.", 'link-folio'); ?>
    </p>
    <p>
        <?php echo esc_html__("Your support would mean everything to us!", 'link-folio'); ?>
    </p>
    <strong><a class="sp-review-popup-button" href="<?php echo esc_url($review_url); ?>" target="_blank" rel="nofollow">Yes, I'd love to!</a></strong><br>
    <button type="button" class="sp-notice-dismiss-inline sp-review-popup-button">No.</button><br>
    <button type="button" class="sp-notice-dismiss-inline sp-review-popup-button">Yes, I've already done it</button><br><br>
</div>