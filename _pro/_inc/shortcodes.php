<?php
/**
 * Shortcodes to Pro version
 */
// [shortcode widget]
function widget($atts) {
    extract(shortcode_atts(array(
        'id'  => '',
        'css' => ''
    ), $atts));
    $tmp = '';
    $tmp .= '<style type="text/css">';
    $tmp .= 'div.widget'.$id.'{ width:auto !important; }';
    $tmp .= $css;
    $tmp .= '</style>';

    $tmp .= '<div class="widgetarea cc-widget widget'.$id.' widget">';
    $tmp .= get_dynamic_sidebar( 'shortcode '.$id);
    $tmp .= '</div><div class="clear"></div>';
    return $tmp;

}
add_shortcode('cc_widget', 'widget');

// [two_third_col = two third column, left floated]
function two_third_col($atts,$content = null) {
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent',
        'radius'           => '0',
        'shadow_color'     => 'transparent',
        'height'           => 'auto',
        'background_image' => 'none',
        'hierarchical'     => 'off',
    ), $atts));

    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; }

    $add='';
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:60.6%;'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="two_third_col"
                style="background:'.$background_color.';
                        border: 1px solid; border-color:'.$border_color.';
                        -moz-border-radius:'.$radius.'px;
                        -webkit-border-radius:'.$radius.'px;
                        border-radius:'.$radius.'px;
                        -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                        -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                        box-shadow: 2px 2px 2px '.$shadow_color.';'.$add_bg.'
                                  height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div>';
    }
    return $tmp;
}
add_shortcode('cc_two_third_col', 'two_third_col');

// [two_third_col_right = two third column, right floated]
function two_third_col_right($atts,$content = null) {
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent',
        'radius'           => '0',
        'shadow_color'     => 'transparent',
        'height'           => 'auto',
        'background_image' => 'none',
        'hierarchical'     => 'off',
    ), $atts));

    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; }

    $add='';
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:60.6%;'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="two_third_col_right"
                style="background:'.$background_color.';
                        border: 1px solid; border-color:'.$border_color.';
                        -moz-border-radius:'.$radius.'px;
                        -webkit-border-radius:'.$radius.'px;
                        border-radius:'.$radius.'px;
                        -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                        -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                        box-shadow: 2px 2px 2px '.$shadow_color.';'.$add_bg.'
                        height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div><div class="clear"></div>';
    }
    return $tmp;
}
add_shortcode('cc_two_third_col_right', 'two_third_col_right');

// [fourth_col = one fourth column, left floated]
function fourth_col($atts,$content = null) {
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent',
        'radius'           => '0',
        'shadow_color'     => 'transparent',
        'height'           => 'auto',
        'background_image' => 'none',
        'hierarchical'     => 'off',
    ), $atts));

    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; }

    $add='';
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:18.5%;'; }
    $addborder='';
    if($border_color !='transparent') { $addborder ='border:1px solid '.$border_color.'; margin-right:2.7%;'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="fourth_col"
                style="background:'.$background_color.';'.$addborder.'
                        -moz-border-radius:'.$radius.'px;
                        -webkit-border-radius:'.$radius.'px;
                        border-radius:'.$radius.'px;
                        -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                        -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                        box-shadow: 2px 2px 2px '.$shadow_color.';'.$add_bg.'
                        height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div>';
    }
    return $tmp;
}
add_shortcode('cc_fourth_col', 'fourth_col');

// [fourth_col_right = one fourth column, right floated]
function fourth_col_right($atts,$content = null) {
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent',
        'radius'           => '0',
        'shadow_color'     => 'transparent',
        'height'           => 'auto',
        'background_image' => 'none',
        'hierarchical'     => 'off',
    ), $atts));

    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; }

    $add='';
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:18.5%;'; }
    $add_border='';
    if($border_color !='transparent') { $add_border ='border:1px solid '.$border_color.';'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="fourth_col_right"
                style="background:'.$background_color.';'.$add_border.'
                        -moz-border-radius:'.$radius.'px;
                        -webkit-border-radius:'.$radius.'px;
                        border-radius:'.$radius.'px;
                        -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                        -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                        box-shadow: 2px 2px 2px '.$shadow_color.';'.$add_bg.'
                        height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div><div class="clear"></div>';
    }
    return $tmp;
}
add_shortcode('cc_fourth_col_right', 'fourth_col_right');

// [three_fourth_col = three fourth column, left floated]
function three_fourth_col($atts,$content = null) {
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent',
        'radius'           => '0',
        'shadow_color'     => 'transparent',
        'height'           => 'auto',
        'background_image' => 'none',
        'hierarchical'     => 'off',
    ), $atts));

    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; }

    $add='';
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:18.5%;'; }
    $addborder='';
    if($border_color !='transparent') { $addborder ='border:1px solid '.$border_color.'; margin-right:2.7%;'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="three_fourth_col"
                style="background:'.$background_color.';'.$addborder.'
                        -moz-border-radius:'.$radius.'px;
                        -webkit-border-radius:'.$radius.'px;
                        border-radius:'.$radius.'px;
                        -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                        -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                        box-shadow: 2px 2px 2px '.$shadow_color.';'.$add_bg.'
                        height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div>';
    }
    return $tmp;
}
add_shortcode('cc_three_fourth_col', 'three_fourth_col');

// [three_fourth_col_right = three fourth column, right floated]
function three_fourth_col_right($atts,$content = null) {
    extract(shortcode_atts(array(
        'background_color' => 'none',
        'border_color'     => 'transparent',
        'radius'           => '0',
        'shadow_color'     => 'transparent',
        'height'           => 'auto',
        'background_image' => 'none',
        'hierarchical'     => 'off',
    ), $atts));
    if($height != 'auto'){ $height = $height.'px'; }
    if($background_color != 'none'){ $background_color = '#'.$background_color; }
    if($border_color != 'transparent'){ $border_color = '#'.$border_color; }
    if($shadow_color != 'transparent'){ $shadow_color = '#'.$shadow_color; }

    $add=''; $tmp = '';
    if($background_color !='none' || $border_color !='transparent' || $shadow_color !='transparent' || $background_image !='none') { $add='padding:2%; width:18.5%;'; }
    $add_border='';
    if($border_color !='transparent') { $add_border ='border:1px solid '.$border_color.';'; }
    $add_bg='';
    if($background_image !='none') { $add_bg='background-image:url('.$background_image.');'; }
    $tmp = '<div class="three_fourth_col_right"
                style="background:'.$background_color.';'.$add_border.'
                        -moz-border-radius:'.$radius.'px;
                        -webkit-border-radius:'.$radius.'px;
                        border-radius:'.$radius.'px;
                        -moz-box-shadow: 2px 2px 2px '.$shadow_color.';
                        -webkit-box-shadow: 2px 2px 2px '.$shadow_color.';
                        box-shadow: 2px 2px 2px '.$shadow_color.';'.$add_bg.'
                        height:'.$height.';'.$add.'">';
    if($hierarchical == 'off'){
        $tmp .= $content;
        $tmp .= '</div><div class="clear"></div>';
    }
    return $tmp;
}
add_shortcode('cc_three_fourth_col_right', 'three_fourth_col_right');

// slideshow

add_shortcode('cc_slideshow', 'cc_slider');

// [image effect]
function img_effect($atts,$content = null) {
    global $cap, $cc_js;

    switch ($cap->style_css){
        case __('natural','cc'):
            $img_border_color = 'F5E5B3';
            $img_shadow_color = 'F5E5B3';
            $frame_color      = 'F5E5B3';
            $f_border_color   = 'd0b971';
            $f_shadow_color   = 'ccb56d';
            break;
        case __('dark','cc') :
        case __('black','cc'):
            $img_border_color = '363636';
            $img_shadow_color = '393939';
            $frame_color      = '333333';
            $f_border_color   = '363636';
            $f_shadow_color   = 'transparent';
            break;
        case __('white','cc'):
        case __('light','cc'):
        case __('grey','cc'):
        default:
            $img_border_color = 'e6e6e6';
            $img_shadow_color = 'e3e3e3';
            $frame_color      = 'f1f1f1';
            $f_border_color   = 'd3d3d3';
            $f_shadow_color   = 'cccccc';
            break;
    }

    if($cap->bg_body_color){
        $frame_color = $cap->bg_body_color;
    }

    extract(shortcode_atts(array(
        'url'              => '',
        'alt'              => '',
        'title'            => '',
        'width'            => '',
        'height'           => '',
        'ropacity'         => '0.5',
        'rheight'          => '0.25',
        'id'               => '',
        'rspace'           => '1',
        'reflection'       => 'off',
        'img_border_color' => $img_border_color,
        'img_shadow_color' => $img_shadow_color,
        'frame'            => 'off',
        'frame_width'      => '10',
        'frame_color'      => $frame_color,
        'f_border_color'   => $f_border_color,
        'f_shadow_color'   => $f_shadow_color,
        'img_css'          => '',
        'frame_css'        => '',
        'radius'           => '0',
        'float'            => 'none'
    ), $atts));
    $tmp = '';
    $tmp .= '<style type="text/css">';
    $tmp .= 'div.post img {';
    $tmp .= 'margin: 0px;';
    $tmp .= '}';

    $tmp .= 'div.post img.rspace'.$id.'  {';
    if($frame == 'off'){
        $tmp .= 'float:'.$float.';';
    }
    $tmp .= '-moz-box-shadow: 1px 1px 4px #'.$img_shadow_color.';';
    $tmp .= '-webkit-box-shadow: 1px 1px 4px #'.$img_shadow_color.';';
    $tmp .= 'box-shadow: 1px 1px 4px #'.$img_shadow_color.';';
    $tmp .= 'border-color: #'.$img_border_color.' !important;';
    if($frame != 'off') {
        $tmp .= 'margin: 0;';
    } else {
        if($reflection != 'off') {
            $tmp .= 'margin: 0 0 20px 0;';
        } else {
            $tmp .= 'margin: 0 20px 20px 0;';
        }
    }
    $tmp .= 'border-style: solid !important;';
    $tmp .= 'border-width: 1px !important;';
    $tmp .= '}';

    $tmp .= 'div.rspace'.$id.' img { margin-bottom: '.$rspace.'px !important;';
    if($frame == 'on' && $float == 'none') {
        $tmp .= 'float:left;';
    } else {
        $tmp .= 'float:'.$float.';';
    }
    if($width != '' ){
        $tmp .= 'width: '. $width .'px;';
    }
    if($height != '' ){
        $tmp .= 'height: '. $height .'px';
    }
    $tmp .= '}';
    if($width != '' ){
        $tmp .= 'div.rspace'.$id.' canvas{ width:'.$width.'px }';
    }
    $tmp .= '#img_frame'.$id.'{';
    if($frame == 'on' && $float == 'none') {
        $tmp .= 'float:left;';
    } else {
        $tmp .= 'float:'.$float.';';
    }
    $tmp .= 'padding:'.$frame_width.'px;';
    $tmp .= '-moz-box-shadow: 2px 2px 3px #'.$f_shadow_color.';';
    $tmp .= '-webkit-box-shadow: 2px 2px 3px #'.$f_shadow_color.';';
    $tmp .= 'box-shadow: 2px 2px 3px #'.$f_shadow_color.';';
    $tmp .= '-moz-border-radius:'.$radius.'px;';
    $tmp .= '-webkit-border-radius:'.$radius.'px;';
    $tmp .= 'border-radius:'.$radius.'px;';
    $tmp .= 'background: none repeat scroll 0 0 #'.$frame_color.';';
    $tmp .= 'border-color: #'.$f_border_color.';';
    $tmp .= 'border-style: solid !important;';
    $tmp .= 'border-width: 1px !important;';
    $tmp .= 'margin: 0 20px 20px 0;';
    $tmp .= '}';
    $tmp .= '</style>';

    if ($reflection != 'off'){
        $cc_js['img_effect'][] = array(
                                    'id'       => $id,
                                    'rheight'  => $rheight,
                                    'ropacity' => $ropacity
                                );
    }
    if($frame != 'off'){
        $tmp .= '<div id="img_frame'.$id.'" style="'.$frame_css.'">';
    }
    $tmp .= '<img src="'.$url.'" alt="'.$alt.'" title="'.$title.'" width="'.$width.'" height="'.$height.'" id="img_effect'.$id.'" class="rspace'.$id.'" style="'.$img_css.'" />';
    if($frame != 'off'){
        $tmp .= '<br />'.$content;
        $tmp .= '</div>';
    }
    if($float == 'none'){
        $tmp .= '<div class="clear"></div>';
    }

    return $tmp;
}
add_shortcode('cc_img_effect', 'img_effect');

// [Accordion start]
function accordion_start($atts) {
    global $cap, $cc_js;
    $tmp = '';
    switch ($cap->style_css){
        case __('dark','cc'):
        case __('natural','cc'):
        case __('white','cc'):
        case __('light','cc'):
        case __('grey','cc'):
        case __('black','cc'):
            $title_background          = '';
            $title_background_selected = '';
            $border_color              = '';
            $content_background_color  = '';
            break;
        default:
            $title_background          = 'ffffff';
            $title_background_selected = 'f1f1f1';
            $border_color              = '';
            $content_background_color  = '';
            break;
    }

    extract(shortcode_atts(array(
        'id'                        => '',
        'icon_url'                  => '',
        'icon_url_selected'         => '',
        'title_background'          => $title_background,
        'title_background_selected' => $title_background_selected,
        'border_color'              => $border_color,
        'content_background_color'  => $content_background_color,
        'accordion_css'             => '',
        'title_css'                 => '',
    ), $atts));

    // inline js
    $cc_js['accordion'][] = array(
                                'id' => $id
                            );

    if($icon_url != ''){
        $tmp .= '<style type="text/css">';
        $tmp .='#accordion'.$id.' h3 {';
        $tmp .='background: url('.$icon_url.') no-repeat scroll 4px 50%;';
        $tmp .=' }';
        $tmp .= '</style>';
    }

    if($title_background != ''){
        $tmp .= '<style type="text/css">';
        $tmp .='#accordion'.$id.' h3 {';
        $tmp .='background-color: #'.$title_background.';';
        $tmp .=' }';
        $tmp .= '</style>';
    }

    if($border_color != ''){
        $tmp .= '<style type="text/css">';
        $tmp .='#accordion'.$id.' h3 {';
        if($border_color != 'transparent') { $border_color = '#'.$border_color; }
        $tmp .='border-color: '.$border_color.';';
        $tmp .=' }';
        $tmp .='#accordion'.$id.' {';
        $tmp .='border-color: '.$border_color.';';
        $tmp .=' }';
        $tmp .='#accordion'.$id.' div {';
        $tmp .='    border-left: 1px solid '.$border_color.'; border-right: 1px solid '.$border_color.'; }';
        $tmp .= '</style>';

    }

    if($content_background_color != ''){
        $tmp .= '<style type="text/css">';
        $tmp .='#accordion'.$id.' div {';
        $tmp .='background: none repeat scroll 0 0 #'.$content_background_color.';';
        $tmp .=' }';
        $tmp .= '</style>';

    }
    if($icon_url_selected != ''){
        $tmp .= '<style type="text/css">';
        $tmp .='#accordion'.$id.' h3.active {';
        $tmp .='background: url('.$icon_url_selected.') no-repeat scroll 4px 50% ;';
        $tmp .=' }';
        $tmp .= '</style>';
    }

    if($title_background_selected != ''){
        $tmp .= '<style type="text/css">';
        $tmp .='#accordion'.$id.' h3.active {';
        $tmp .='background-color: #'.$title_background_selected.';';
        $tmp .=' }';
        $tmp .='#accordion'.$id.' h3:hover {';
        $tmp .='background-color: #'.$title_background_selected.';';
        $tmp .=' }';
        $tmp .= '</style>';
    }

    if($title_css != ''){
        $tmp .= '<style type="text/css">';
        $tmp .='#accordion'.$id.' h3, #accordion'.$id.' h3.active  {';
        $tmp .=$title_css;
        $tmp .=' }';
        $tmp .= '</style>';
    }

    $tmp .='<div class="accordion" id="accordion'.$id.'" style="'.$accordion_css.'">';
    return $tmp;
}
add_shortcode('cc_accordion_start', 'accordion_start');

// [Accordion end]
function accordion_end() {
    return '</div><!-- /.accordion -->';
}
add_shortcode('cc_accordion_end', 'accordion_end');

// [Accordion content start]
function accordion_content_start($atts) {
    $tmp = '';
    extract(shortcode_atts(array(
        'id' => '',
    ), $atts));

    $tmp .=    '<div class="swap'.$id.'">';
    return $tmp;
}
add_shortcode('cc_a_content_start', 'accordion_content_start');

// [Accordion content end]
// [Accordion end]
function accordion_content_end() {
    return '</div>';
}
add_shortcode('cc_a_content_end', 'accordion_content_end');

?>
