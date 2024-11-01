<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 *
 * @param $option
 *
 * @return string
 */
function wpzest_social_media_share_boolean_wp_function( $option ) {
  $option = filter_var( $option, FILTER_VALIDATE_BOOLEAN );
  if ( $option == true ) {
    return '__return_true';
  }
  if ( $option == false ) {
    return '__return_false';
  }
  return '';
}

function wpzest_social_media_share_settings_filter() {
  $content_before_in_post = get_option( 'wpzest_social_media_share_content_before_in_post', '0' );
  if ( wpzest_social_media_share_boolean_wp_function( $content_before_in_post ) != '' ) {
    add_filter( 'wpzest_social_media_share_content_before_in_post', wpzest_social_media_share_boolean_wp_function( $content_before_in_post ), 1 );
  }
  $content_after_in_post = get_option( 'wpzest_social_media_share_content_after_in_post', '1' );
  if ( wpzest_social_media_share_boolean_wp_function( $content_after_in_post ) != '' ) {
    add_filter( 'wpzest_social_media_share_content_after_in_post', wpzest_social_media_share_boolean_wp_function( $content_after_in_post ), 1 );
  }
  $content_before_in_page = get_option( 'wpzest_social_media_share_content_before_in_page', '0' );
  if ( wpzest_social_media_share_boolean_wp_function( $content_before_in_page ) != '' ) {
    add_filter( 'wpzest_social_media_share_content_before_in_page', wpzest_social_media_share_boolean_wp_function( $content_before_in_page ), 1 );
  }
  $content_after_in_page = get_option( 'wpzest_social_media_share_content_after_in_page', '1' );
  if ( wpzest_social_media_share_boolean_wp_function( $content_after_in_page ) != '' ) {
    add_filter( 'wpzest_social_media_share_content_after_in_page', wpzest_social_media_share_boolean_wp_function( $content_after_in_page ), 1 );
  }
}
add_action( 'init', 'wpzest_social_media_share_settings_filter', 1 );
function add_social_share_icons($content)
{
    $icon_themes = get_option('wpzest_icon_themes');
    $message = get_option('wpzest_social_media_share_message_icon');
    if(!empty($icon_themes)){
    $html = "<div class='wpzest-social-share wpzest-theme-".$icon_themes." clearfix'><div class='message'>".$message."</div>";
    }
    if(empty($icon_themes)){
      $html = "<div class='wpzest-social-share wpzest-theme-1 clearfix'><div class='message'>".$message."</div>";
    }
    global $post;
    $url = get_permalink($post->ID);
    $url = esc_url($url);
    $social_share= get_option('wpzest_social_media_share');
    $s_order=get_option("wss_wp_social_sharing");
    if(in_array("total",$social_share)){
      require('wpzest-count.php');
    }
    $new_order =get_option("wss_wp_social_sharing");
    $a = explode(',',$new_order);                     
    if(empty($s_order)) 
      { 
        $s_order='f,t,g,l,r,p,pr,e,to';
      }
      $b = explode(',',$s_order);
                            sort($a);
                            sort($b);
                            if ($a==$b){
                              $s_order = get_option("wss_wp_social_sharing");
                            }
                            else{
                              $s_order;
                               }
      $io=explode(',',rtrim($s_order,','));     
      if(!empty($social_share)){
      foreach ($io as $i) {
        switch($i){
        case 'f':
    if(in_array("facebook",$social_share))
    {   
        $onclick = 'onclick=wpzest_open_in_popup_window("http://www.facebook.com/sharer.php?url='. $url.'");';
        $html = $html ."<div class='wpzest-facebook wpz-single-icon'>
          <a rel='nofollow' class='link' title='Share on Facebook'" .$onclick.">
            <div class='wpzest-icon-block clearfix'>
              <i class='fa fa-facebook'></i>
              <span class='wpzest-icon-text'>Share on Facebook</span>
              <span class='wpz-share'>Share</span>
              <span class='wpz-name'>Facebook</span>
            </div>
              </a>
        </div>";
       }
      break;
    case 'g':
    if(in_array("googleplus",$social_share))
    {   
        $onclick = 'onclick=wpzest_open_in_popup_window("https://plusone.google.com/_/+1/confirm?hl=jp&url='. $url.'");';
        $html = $html . "<div class='wpzest-google-plus wpz-single-icon'>
          <a rel='nofollow' class='link' title='Share on Google Plus'" .$onclick.">
            <div class='wpzest-icon-block clearfix'>
              <i class='fa fa-google-plus'></i>
              <span class='wpzest-icon-text'>Share on Google Plus</span>
              <span class='wpz-share'>Share</span>
              <span class='wpz-name'>Google+</span>
            </div>
            </a>
        </div>";
    }
    break;
    case 't':
    if(in_array("twitter",$social_share))
    {    
         $onclick = 'onclick=wpzest_open_in_popup_window("https://twitter.com/share?url='. $url.'");';
         $html = $html . "<div class='wpzest-twitter wpz-single-icon'>
          <a rel='nofollow' class='link' title='Share on Twitter'" .$onclick.">
            <div class='wpzest-icon-block clearfix'>
              <i class='fa fa-twitter'></i>
              <span class='wpzest-icon-text'>Share on Twitter</span>
              <span class='wpz-share'>Share</span>
              <span class='wpz-name'>Twitter</span>
            </div>
             </a>
        </div>";
    }
    break;
    case 'l':
    if(in_array("linkedin",$social_share))
    {   
        $onclick = 'onclick=wpzest_open_in_popup_window("http://www.linkedin.com/shareArticle?url='. $url.'");';
        $html = $html . "<div class='wpzest-linkedin wpz-single-icon'>
          <a rel='nofollow' class='link' title='Share on LinkedIn'" .$onclick.">
            <div class='wpzest-icon-block clearfix'><i class='fa fa-linkedin'></i>
              <span class='wpzest-icon-text'>Share on LinkedIn</span>
              <span class='wpz-share'>Share</span>
              <span class='wpz-name'>LinkedIn</span>
            </div>
           </a>
        </div>";
    }
    break;
    case 'r':
    if(in_array("reddit",$social_share))
    {   
        $onclick = 'onclick=wpzest_open_in_popup_window("http://reddit.com/submit?url='. $url.'");';
        $html = $html . "<div class='wpzest-reddit wpz-single-icon'>
          <a rel='nofollow' class='link' title='Share on Reddit'" .$onclick.">
            <div class='wpzest-icon-block clearfix'><i class='fa fa-reddit'></i>
              <span class='wpzest-icon-text'>Share on Reddit</span>
              <span class='wpz-share'>Share</span>
              <span class='wpz-name'>Reddit</span>
            </div>
           </a>
        </div>";
    }
    break;
    case 'p':
    if(in_array("pinterest",$social_share))
    {   
        $onclick = 'onclick=wpzest_open_in_popup_window("http://pinterest.com/pin/create/button/?url='. $url.'");';
        $html = $html . "<div class='wpzest-pinterest wpz-single-icon'>
          <a rel='nofollow' class='link' title='Share on Pinterest'" .$onclick.">
            <div class='wpzest-icon-block clearfix'><i class='fa fa-pinterest'></i>
              <span class='wpzest-icon-text'>Share on Pinterest</span>
              <span class='wpz-share'>Share</span>
              <span class='wpz-name'>Pinterest</span>
            </div>
           </a>
        </div>";
    }
    break;
    case 'pr':
    if(in_array("print",$social_share))
    {  
        $html = $html . "<div class='wpzest-print wpz-single-icon'>
          <a rel='nofollow' class='link' title='Share on Print' target='$wpzest_link_open_option' href='javascript:void(0);' onclick='window.print(); return false;'>
            <div class='wpzest-icon-block clearfix'><i class='fa fa-print'></i>
              <span class='wpzest-icon-text'>Share on Print</span>
              <span class='wpz-share'>Share</span>
              <span class='wpz-name'>Print</span>
            </div>
           </a>
        </div>";
    }
    break;
     case 'e':
    if(in_array("email",$social_share))
    {  
        $onclick = 'onclick=wpzest_open_in_popup_window("https://www.addthis.com/tellfriend_v2.php?v=300&winname=addthis&pub=atblog&source=tbx-300&lng=en&s=email&url='.urlencode($url).'&title=&ate=&uid=&uud=&ct=&ui_email_to=&ui_email_from=&ui_email_note=&pre=https%3A%2F%2Fwww.google.co.in%2F&tt=0&captcha_provider=recaptcha2&pro=0&ats=imp_url%3D0%26smd%3Drsi%253D%2526gen%253D0%2526rsc%253D%2526dr%253Dhttps%25253A%25252F%25252Fwww.google.co.in%25252F%2526sta%253DAT-atblog%25252F-%25252F-%25252F58dca0a42dd4a105%25252F1%26hideEmailSharingConfirmation%3Dundefined%26service%3Demail%26media%3Dundefined%26description%3D%26passthrough%3Dundefined%26email_template%3Dundefined%26email_vars%3D&atc=data_track_addressbar%3Dtrue%26data_ga_tracker%3DgaPageTracker%26data_ga_property%3DUA-1170033-1%26data_ga_social%3Dtrue%26services_exclude%3Dskype%26services_exclude_natural%3Dskype%26services_compact%3Dflipboard%252Cfacebook%252Ctwitter%252Cprint%252Cemail%252Cpinterest_share%252Cgmail%252Cgoogle_plusone_share%252Clinkedin%252Cmailto%252Ctumblr%252Cmore%26product%3Dtbx-300%26widgetId%3Dundefined%26pubid%3Datblog%26ui_pane%3Demail&rb=false");';

        $html = $html . "<div class='wpzest-email wpz-single-icon'>
          <a rel='nofollow' class='link' title='Share on Email'" .$onclick.">
            <div class='wpzest-icon-block clearfix'><i class='fa fa-envelope-o'></i>
              <span class='wpzest-icon-text'>Share on Email</span>
              <span class='wpz-share'>Share</span>
              <span class='wpz-name'>Email</span>
            </div>
           </a>
        </div>";
    }
    break;
    case 'to':
        if(in_array("total",$social_share))
        {    
            $html = $html ."<div class='wpzest-total'><div class='wpzest-total-count'>".$total."</div><div class='wpzest-total-shares'>
            <div class='wpzest-total-text'>Total</div>
            <div clas='wpzest-shares-text'>Shares</div></div>
            </div>";
        }
        break; 
    }
   }
  }
$html = $html . "</div>";
?>
<script>
function wpzest_open_in_popup_window(url){
      window.open(url, 'WPZest', 'toolbars=0,width=740,height=420,left=200,top=200,scrollbars=1,resizable=1');
  }
</script>
<?php 
 if ( 'post' == $post->post_type ) {
add_filter( 'wpzest_social_media_share_content_before', wpzest_social_media_share_boolean_wp_function( apply_filters( 'wpzest_social_media_share_content_before_in_post', false ) ) );
    add_filter( 'wpzest_social_media_share_content_after', wpzest_social_media_share_boolean_wp_function( apply_filters( 'wpzest_social_media_share_content_after_in_post', true ) ) );

    if ( apply_filters( 'wpzest_social_media_share_content_hide_in_post', false ) ) {
      add_filter( 'wpzest_social_media_share_content_before', '__return_false' );
      add_filter( 'wpzest_social_media_share_content_after', '__return_false' );
    }
  }
if ( 'page' == $post->post_type ) {
add_filter( 'wpzest_social_media_share_content_before', wpzest_social_media_share_boolean_wp_function( apply_filters( 'wpzest_social_media_share_content_before_in_page', false ) ) );
    add_filter( 'wpzest_social_media_share_content_after', wpzest_social_media_share_boolean_wp_function( apply_filters( 'wpzest_social_media_share_content_after_in_page', true ) ) );
    if ( apply_filters( 'wpzest_social_media_share_content_hide_in_page', false ) ) {
      add_filter( 'wpzest_social_media_share_content_before', '__return_false' );
      add_filter( 'wpzest_social_media_share_content_after', '__return_false' );
    }
    if ( get_page_template_slug() ) {
      $content_before_in_page_template_slug = apply_filters( 'wpzest_social_media_share_content_before_in_' . get_page_template_slug(), '' );
      if ( $content_before_in_page_template_slug != '' && wpzest_social_media_share_boolean_wp_function( $content_before_in_page_template_slug ) != '' ) {
        add_filter( 'wpzest_social_media_share_content_before', wpzest_social_media_share_boolean_wp_function( $content_before_in_page_template_slug ), 1 );
      }
      $content_after_in_page_template_slug = apply_filters( 'wpzest_social_media_share_content_after_in_' . get_page_template_slug(), '' );
      if ( $content_after_in_page_template_slug != '' && wpzest_social_media_share_boolean_wp_function( $content_after_in_page_template_slug ) != '' ) {
        add_filter( 'wpzest_social_media_share_content_after', wpzest_social_media_share_boolean_wp_function( $content_after_in_page_template_slug ), 1 );
      }
      if ( apply_filters( 'wpzest_social_media_share_content_hide_in_' . get_page_template_slug(), false ) ) {
        add_filter( 'wpzest_social_media_share_content_before', '__return_false' );
        add_filter( 'wpzest_social_media_share_content_after', '__return_false' );
      }
    }
  }
  if ( apply_filters( 'wpzest_social_media_share_content_before', false ) ) {
    $content =  $html. $content;
  }

  if ( apply_filters( 'wpzest_social_media_share_content_after', true ) ) {
    $content = $content . $html ;
  }
     return $content;
}
add_filter("the_content", "add_social_share_icons");
add_action('admin_footer','wpzest_social_icon_order_script');
function wpzest_social_icon_order_script(){
  wp_enqueue_script( 'jquery-ui-sortable' );  
}
add_action('wp_ajax_wss_update_icon_order','wpzest_social_icon_order_action');
function wpzest_social_icon_order_action(){
  update_option('wss_wp_social_sharing', rtrim($_POST['new_order'],','));
  die;
}
?>