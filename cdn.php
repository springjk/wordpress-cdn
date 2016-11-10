<?php
/*
    Plugin Name:谷歌服务与Gravatar头像加速
    Description:本插件可针对面对Google前端库、Google字体库和Gravatar头像进行替换加速，CDN为科大镜像与多说加速器。
    Version: 1.0
    Author: JaQuan
    Author URI: https://github.com/springjk
*/

/**
 * Replace Google Ajax Libs Service.
 *
 * @param string $text
 *
 * @return string
 */
function cdn_google_ajax_libs ($text)
{
    return str_replace('ajax.googleapis.com', 'ajax.lug.ustc.edu.cn', $text);
}

/**
 * Replace Google Theme Service.
 *
 * @param string $text
 *
 * @return string
 */
function cdn_google_theme ($text)
{
    return str_replace('themes.googleusercontent.com', 'google-themes.lug.ustc.edu.cn', $text);
}

/**
 * Replace Google Open Fonts Service
 *
 * @param string $text
 *
 * @return string
 */
function cdn_google_fonts ($text)
{
    $text = str_replace('fonts.googleapis.com', 'fonts.lug.ustc.edu.cn', $text);

    return str_replace('fonts.gstatic.com', 'fonts-gstatic.lug.ustc.edu.cn', $text);
}

/**
 * Replace Gravatar Service
 *
 * @param array $avatar
 *
 * @return string
 */
function cdn_avatar ($avatar)
{
    $official = [
        '0.gravatar.com',
        '1.gravatar.com',
        '2.gravatar.com',
        'www.gravatar.com',
        'secure.gravatar.com'
    ];

    return str_replace($official, 'gravatar.duoshuo.com', $avatar);
}

add_filter('style_loader_tag', 'cdn_google_ajax_libs');

add_filter('style_loader_tag', 'cdn_google_theme');

add_filter('style_loader_tag', 'cdn_google_fonts');

add_filter('get_avatar', 'cdn_avatar');