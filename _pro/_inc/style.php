<?php

/*
 * Print styles for pro version
 */
function cc_pro_add_styles(){
?>


.two_third_col {
    float:left;
    margin:0 2.6% 20px 0;
    padding:0;
    width:64.6%;
    overflow: hidden;
}

.two_third_col_right {
    float:right;
    margin:0 0.4% 20px 0;
    padding:0;
    width:64.6%;
}

.fourth_col {
    float:left;
    margin:0 3.2% 20px 0;
    padding:0;
    width:22.5%;
    overflow: hidden;
}

.fourth_col_right {
    float:right;
    margin:0 0.4% 20px 0;
    padding:0;
    width:22.5%;
}

.three_fourth_col {
    float:left;
    margin:0 3.2% 20px 0;
    padding:0;
    width:69.8% !important;
}

.three_fourth_col_right {
    float:right;
    margin:0 0.4% 20px 0;
    padding:0;
    width:69.8% !important;
}

div.post img.attachment-slider-full {
    margin:0;
}
.boxgrid .read-more-link br{
    display: block;
}
<?php }
 add_action('cc_pro_add_styles', 'cc_pro_add_styles');
?>