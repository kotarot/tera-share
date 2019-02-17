<?php
/*
Plugin Name: Tera Share
Plugin URI: https://github.com/kotarot/tera-share
Description: WP plugin that inserts blog-card-like links in articles.
Version: 0.2.2
Author: Kotaro Terada
Author URI: https://www.terabo.net/
License: Apache License 2.0
*/

function fontawesome_css() {
    $cdn_url = '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css';
    echo '<link rel="stylesheet" href="' . $cdn_url . '" type="text/css" media="all">' . "\n";
}
add_action('wp_head', 'fontawesome_css');

function terashare_css() {
$css = <<<EOT
a.terashare-title{text-decoration:none;}
span.terashare-title,div.terashare-sitename{color:#222;}
div.terashare{width:550px;max-width:100%;border:solid 1px #ccc;padding:5px;margin:5px 0 25px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius: 4px;}
img.terashare-thumbnail{height:100px;float:left;margin:0 10px 5px 0;}
span.terashare-title{font-size:110%;font-weight:bold;}
div.terashare-sitename{font-size:100%;text-align:right;}
div.terashare-description{color:#555;margin-top:8px;font-size:90%;line-height:140%;}
div.terashare-url{text-align:right;font-size:80%;}
div.terashare-clearfix:after{clear:both;content:' ';display:block;font-size:0;line-height:0;visibility:hidden;width:0;height:0}
EOT;
    echo '<style type="text/css">' . "\n";
    echo $css . "\n";
    echo '</style>' . "\n";
}
add_action('wp_head', 'terashare_css');

// Shortcode: [terashare]
function terashare_func($atts) {
    extract(shortcode_atts(array(
        'title'       => 'No title',
        'sitename'    => '',
        'description' => '',
        'url'         => '',
        'imgurl'      => ''
    ), $atts));

    if (!$url) {
        $url = 'https://github.com/kotarot/tera-share';
        $imgurl = plugins_url('default-thumbnail.png', __FILE__);
    }

    $html = '';
    $html .= '<div class="terashare terashare-clearfix">';
    $html .= '<a href="' . $url . '" target="_blank">';
    if ($imgurl) {
        $html .= '<img class="terashare-thumbnail" align="left" border="0" src="' . $imgurl . '" alt="Thumbnail of ' . $title . '" /></a>';
    } else {
        $html .= '<img class="terashare-thumbnail" align="left" border="0" src="http://capture.heartrails.com/?' . $url . '" alt="Thumbnail of  ' . $title . '" /></a>';
    }
    $html .= '<a href="' . $url . '" target="_blank" class="terashare-title"><span class="terashare-title">' . $title . '</span></a>';
    if ($sitename) {
        $html .= '<div class="terashare-sitename"><i class="fa fa-globe"></i> ' . $sitename . '</div>';
    }
    $html .= '<div class="terashare-description">' . $description . '</div>';
    $html .= '<div class="terashare-url">';
    $html .= '<a href="' . $url . '" target="_blank"><i class="fa fa-external-link"></i> ' . $url . '</a>';
    $html .= '</div>';
    $html .= '</div><!-- /.terashare -->';
    return $html . "\n";
}
add_shortcode('terashare', 'terashare_func');
