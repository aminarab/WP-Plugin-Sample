<?php
function HelloWorldShortcode() {
    return '<p>Hello Amin! </p>';
}
add_shortcode('helloworld', 'HelloWorldShortcode');

function GenerateSitemap($params = array()) {
    
    // default parameters
    extract(shortcode_atts(array(
        'title' => 'Site map',
        'id' => 'sitemap',
        'depth' => 2
    ), $params));
    
    // create sitemap
    $sitemap = wp_list_pages("title_li=&depth=$depth&sort_column=menu_order&echo=0");
    if ($sitemap != '') {
        $sitemap =
        ($title == '' ? '' : "<h2>$title</h2>") .
        '<ul' . ($id == '' ? '' : ' id=".$id."') . ">$sitemap</ul>";
    }
    
    return $sitemap;
}
add_shortcode('sitemap', 'GenerateSitemap');

function StyleText($params, $content = null) {
    // default parameters
    extract(shortcode_atts(array(
        'style' => ''
    ), $params));
    return '<span' . ($style == '' ? '' : ' style='.$style) .'>'.$content.'</span>';
}
add_shortcode('format','StyleText');
?>