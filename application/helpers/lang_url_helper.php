<?php
if ( ! function_exists('lang_url'))
{
function lang_url($uri = '')
{
if($uri != '')
$uri = "/".$uri;

$CI =& get_instance();
return $CI->config->base_url().$CI->session->userdata('site_lang').$uri;
}
}
?>