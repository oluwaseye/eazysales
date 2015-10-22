<?php
class LanguageLoader
{
function initialize() {
$haveLangInUrl = false;
$ci =& get_instance();
$ci->load->helper('language');
$firstSegmentVal = $ci->uri->segment(1);
if($firstSegmentVal) {
foreach ($ci->config->item('lang_uri_abbr') as $abbr => $language) {
if($firstSegmentVal==$abbr) {
$ci->lang->load('custom',$language);
$ci->session->set_userdata('site_lang', $abbr);
$haveLangInUrl = true;
}
}
}
if(!$haveLangInUrl) {//use the default language
$ci->lang->load('custom',$ci->config->item('language'));
$ci->session->set_userdata('site_lang', $ci->config->item('language_abbr'));
}
}
}
?>