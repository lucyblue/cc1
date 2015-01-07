<?php

/**
 * Combine pro settings 
 */
define('is_pro', 1); // this constant used ony for changing labels for free/pro version
require_once '_inc/shortcodes.php';
require_once '_inc/style.php';
require_once '_inc/style-helper-functions.php';
//require_once TEMPLATEPATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'library.php';

/**
 * Add additional color schemes Color scheme options
 * @param array $schemes
 * @return array schemes with additional options
 */
function cc_pro_add_color_scheme($schemes) {
    $additinal_schemes = array(__('light', 'cc'), __('black', 'cc'), __('natural', 'cc'));
    return array_merge($schemes, $additinal_schemes);
}

add_filter('cc_get_color_scheme', 'cc_pro_add_color_scheme');

function cc_pro_add_archive_sidebar_position($positions) {
    $additinal_positions = array(__('full-width', 'cc'));
    return array_merge($positions, $additinal_positions);
}

add_filter('cc_get_archive_sidebar_position', 'cc_pro_add_archive_sidebar_position');

function cc_pro_cap_get_options($options, $tab_id) {

    if ($tab_id == 'footer') {
        $pro_options = array(
            new BooleanOption(
                    "Show credits links in footer", "Show the credits liks in the footer.", "disable_credits_footer", true, 'start', 'Credit links'),
            new TextOption(
                    "Your own credits links in footer", "Write in your own credits - links - text. You can use HTML.", "my_credits_footer", "", '', 'end'),
        );
        $options = array_merge($options, $pro_options);
    }

    if ($tab_id == 'overwrite') {
        $pro_options = array(
            new DropdownOption(
                    __('Use static css file', 'cc'), __('If "yes" - static file will be saved in wp-content/upload directory and loaded instead of inline styles.<br/> If "no" - all styles will be placed inline in head section of a site (bad for SEO).<br/> You shouldn\'t edit "main.css" file manually - it will be overwritten and you will lose all changes.<br/>', 'cc'), 'static_css', array(__('no', 'cc'), __('yes', 'cc')), '', false, ''),
        );
        $options = array_merge($pro_options, $options);
    }
    if ($tab_id == 'profile') {
        if (defined('BP_VERSION')) {
            global $bp;

            $nav_tabs = array();
            foreach ($bp->bp_nav as $nav) {
                $nav_tabs[] = $nav['slug'];
            }
            $pro_options = array(
                new DropdownOption(
                        __('Main tab in profile menu', 'cc'), __('Main tab in profile menu', 'cc'), 'main_profile_menu_tab', $nav_tabs, 'activity', true, true
                )
            );
            $options = array_merge($options, $pro_options);
        }
    }
    if ($tab_id == 'groups') {
        global $bp;
        $nav_group_tabs = array('home', 'members', 'send-invites', 'admin');
        $pro_options = array(
            new DropdownOption(
                    __('Main tab in group menu', 'cc'), __('Main tab in group menu', 'cc'), 'main_group_menu_tab', $nav_group_tabs, 'activity', true, true
            )
        );
        $options = array_merge($options, $pro_options);
    }

    if ($tab_id == 'slideshow') {
        $pro_options = array(
            new DropdownOption(
                    __('Stretch the big image?', 'cc'), __('Stretch the big image?', 'cc'), 'stretch_big_image', array(__('default', 'cc'), __('on', 'cc'), __('off', 'cc')), __('default', 'cc')
            ),
            new DropdownOption(
                    __('Open slideshow links in new tabs', 'cc'),
                    __('Open slideshow links in new tabs', 'cc'),
                    'open_new_tab',
                    array('no', 'yes'),
                    'no'
            )
        );
        $options = array_merge($options, $pro_options);
    }
    if ($tab_id == 'general') {

        $post_types = array();
        $post_types_raw = get_post_types(array('public' => true));
        foreach ($post_types_raw as $post_type) {
            $post_type_item = array('id' => $post_type, 'name' => str_replace('_', ' ', ucfirst($post_type)));
            array_push($post_types, $post_type_item);
        };

        $pro_options = array(
            new DropdownOption(
                    __("Show titles at all pages?", 'cc'), __("Global setting for show titles at all pages", 'cc'), "show_titles_all_pages", array(__('yes', 'cc'), __('no', 'cc')), __("yes", 'cc'), 'start'
            ),
            new DropdownOption(
                    __("Center title", 'cc'), __("Global setting for on/off center text position for title", 'cc'), "titles_center", array(__('no', 'cc'), __('yes', 'cc')), __("no", 'cc'), ''
            ),
            new CheckboxGroupOptions(
                    __("Center title", 'cc'), __("Global setting for on/off center text position for title", 'cc'), "titles_post_types", $post_types, '', "end"
            )
        );
        $options = array_merge($options, $pro_options);
    }

    return $options;
}

add_filter('cc_cap_get_options', 'cc_pro_cap_get_options', 100, 2);

function cc_pro_load_constants() {
    if (defined('BP_VERSION') && (bp_is_user() || bp_is_group() || (function_exists('is_bbpress') && is_bbpress() && !bp_is_user() && !bp_is_group()))) {
        return;
    }
    global $cap, $post;
    $sidebar_position = $cap->sidebar_position;
    $tpl = !empty($post) ? get_post_meta($post->ID, '_wp_page_template', true) : 'default';

    if ($tpl != 'default' /* && !is_search() */) {
        switch ($tpl) {
            case '_pro/tpl-left-sidebar.php':
            case '_pro/tpl-search-left-sidebar.php': $cap->rightsidebar_width = 0;
                break;
            case '_pro/tpl-right-sidebar.php':
            case '_pro/tpl-search-right-sidebar.php': $cap->leftsidebar_width = 0;
                break;
            case 'tpl-search-full-width.php':
            case 'full-width.php': $cap->leftsidebar_width = 0;
                $cap->rightsidebar_width = 0;
                break;
        }
    } else {
        switch ($sidebar_position) {
            case __('left', 'cc') : $cap->rightsidebar_width = 0;
                break;
            case __('right', 'cc') : $cap->leftsidebar_width = 0;
                break;
            case __('none', 'cc') : $cap->leftsidebar_width = 0;
                $cap->rightsidebar_width = 0;
                break;
            case __('full-width', 'cc') : $cap->leftsidebar_width = 0;
                $cap->rightsidebar_width = 0;
                break;
        }
    }
}

add_action('bp_head', 'cc_pro_load_constants', 2);

/**
 * Add css highlight scripts in Theme Options->CSS 
 */
function cc_css_hilight_lib_js() {
    wp_enqueue_script('cc_admin_js_highlight', get_template_directory_uri() . '/_inc/js/codemirror.js');
    wp_enqueue_script('cc_admin_js_highlight_css_mode', get_template_directory_uri() . '/_inc/js/css.js');
}

add_action("admin_print_scripts-appearance_page_theme_settings", 'cc_css_hilight_lib_js');

/**
 * Add css highlight styles in Theme Options->CSS 
 */
function css_hilight_lib_css() {
    wp_enqueue_style('cc_admin_css_highlight', get_template_directory_uri() . '/_inc/css/codemirror.css');
}

add_action('admin_print_styles-appearance_page_theme_settings', 'css_hilight_lib_css');

/**
 * Add Pro Widgets areas
 */
function cc_pro_widgets_init() {

    register_sidebars(15, array(
        'name' => 'shortcode %1$s',
        'id' => 'shortcode',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><div class="clear"></div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
            )
    );
}

add_action('widgets_init', 'cc_pro_widgets_init', 100);

add_action('bp_init', 'cc_change_main_tab', 9);

function cc_change_main_tab() {
    global $bp, $cap;
    $main_menu = $cap->main_profile_menu_tab;
    if (empty($main_menu)) {
        return;
    }
    foreach ($bp->bp_nav as $key => &$item) {
        if ($key === $main_menu) {
            $item['position'] = 9;
        }
    }
}

add_action('bp_init', 'cc_change_main_group_tab');

function cc_change_main_group_tab() {
    global $bp, $cap;
    $main_menu = $cap->main_group_menu_tab;
    if (empty($main_menu)) {
        return;
    }
    $group_slug = isset($bp->groups->current_group->slug) ? $bp->groups->current_group->slug : false;
    if (!empty($bp->bp_options_nav[$group_slug])) {
        foreach ($bp->bp_options_nav[$group_slug] as $key => &$item) {
            if ($key === $main_menu) {
                $item['position'] = 1;
            }
        }
    }
}

?>
