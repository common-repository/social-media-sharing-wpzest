<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
function wpzest_social_media_share_page()
{
?>
<div class="wrap">
<h1>Social Media Sharing | WPZest</h1>
 <br><br>
         <form method="post" action="options.php">
            <?php
               settings_fields("wpzest_social_media_share_config_section");
               do_settings_sections("wpzest-social-share"); ?>
               <div class="tabs tabs-style-topline">
                 <nav>
                    <ul>
             <li><a href="#section-topline-1">
                <h1><?php echo '<img src="' . plugins_url( 'images/switch.png', __FILE__ ) . '"> '; ?></h1>
                  <span>Social Networks</span></a></li>
              <li><a href="#section-topline-2">
                <h1><?php echo '<img src="' . plugins_url( 'images/re-captcha.png', __FILE__ ) . '"> '; ?></h1>
                    <span>Add-On Settings</span></a> </li>
              <li><a href="#section-topline-3">
                  <h1><?php echo '<img src="' . plugins_url( 'images/logo-settings.png', __FILE__ ) . '"> '; ?></h1>
                       <span>Manage Display</span></a></li>                               
                      </ul>
                  </nav>
          <div class="content-wrap">
            <section id="section-topline-1">
              <ul class="indent">
                <h2 class="title"><?php _e( 'Share Options' ); ?></h2> 
                <p><?php _e( 'You Can Drag and Reorder Social Media Icons' ); ?></p>    
          <div class="dndicon">
              <?php  $share_options = get_option('wpzest_social_media_share');
                if(!empty($share_options)){
                foreach ($share_options as $key => $value) {
                        $share_option[] = $value;
                }
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
                  foreach ($io as $i){
                    switch($i){
                      case 'f':
                   if(!empty($share_options)){
                    if(in_array("facebook",$share_option))
                    { 
                      $fb="checked='checked'";
                    }
                  }
                    else{
                      $fb = '';
                    }
                    echo '<table id="f"><tr>             
                        <th class="table-data">
                               <i class="fa fa-arrows"></i> <label for="wpzest_social_media_share"><i  class="fa fa-facebook"></i> FACEBOOK </label>
                        </th>
                      <td class="table-data">
                            <div class="onoffswitch">
                             <input type="checkbox" name="wpzest_social_media_share[]" class="onoffswitch-checkbox"  id="myonoffswitch" value="facebook"' .$fb.' />
                             <label class="onoffswitch-label" for="myonoffswitch">
                             <span class="onoffswitch-inner"></span>
                             <span class="onoffswitch-switch"></span>
                             </label>
                            </div>
                      </td>  
                   </tr></table>';       
                    break;
                  case 'g':
                   if(!empty($share_options)){
                   if(in_array("googleplus",$share_option))
                    { 
                      $google="checked='checked'";
                    }
                  }
                    else{
                      $google = '';
                    }
                    echo '<table id="g"><tr>
                    <th class="table-data">
                        <i class="fa fa-arrows"></i> <label for="wpzest_social_media_share"> <i  class="fa fa-google-plus"></i> GOOGLE<sup>+</sup> </label>
                    </th>
                    <td class="table-data">    
                    <div class="onoffswitch">
                     <input type="checkbox" name="wpzest_social_media_share[]" class="onoffswitch-checkbox"  id="myonoffswitch1" value="googleplus"'.$google.' /> 
                     <label class="onoffswitch-label" for="myonoffswitch1">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                     </label>
                    </div>
                    </td>  
                </tr></table>';
                    break;
                  case 't':
                   if(!empty($share_options)){
                    if(in_array("twitter",$share_option))
                    { 
                      $twit="checked='checked'";
                    }
                  }
                    else{
                      $twit = '';
                    }
                    echo '<table id="t"><tr>
                  <th class="table-data">
                        <i class="fa fa-arrows"></i> <label for="wpzest_social_media_share"> <i class="fa fa-twitter"></i> TWITTER </label>
                  </th>
                  <td class="table-data">
                    <div class="onoffswitch">
                     <input type="checkbox" name="wpzest_social_media_share[]" class="onoffswitch-checkbox"  id="myonoffswitch2" value="twitter"'.$twit.'/>
                     <label class="onoffswitch-label" for="myonoffswitch2">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                     </label>
                    </div>
                 </td>          
                    </tr></table>';
                    break;
                  case 'l':
                   if(!empty($share_options)){
                     if(in_array("linkedin",$share_option))
                    { 
                      $linked="checked='checked'";
                    }
                  }
                    else{
                      $linked = '';
                    }
                    echo '<table id="l"><tr>
                    <th class="table-data">
                        <i class="fa fa-arrows"></i> <label for="wpzest_social_media_share"> <i class="fa fa-linkedin"></i> LINKEDIN </label>
                    </th>
                    <td class="table-data">
                    <div class="onoffswitch">
                     <input type="checkbox" name="wpzest_social_media_share[]" class="onoffswitch-checkbox"  id="myonoffswitch3" value="linkedin"'.$linked.'/>
                     <label class="onoffswitch-label" for="myonoffswitch3">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                     </label>
                    </div>
                    </td>               
                    </tr></table>'; 
                    break;
                  case 'r':
                   if(!empty($share_options)){
                    if(in_array("reddit",$share_option))
                    { 
                      $red="checked='checked'";
                    }
                  }
                    else{
                      $red = '';
                    }
                    echo '<table id="r"><tr>
                    <th class="table-data">
                        <i class="fa fa-arrows"></i> <label for="wpzest_social_media_share"> <i class="fa fa-reddit"></i> REDDIT </label>
                    </th>
                  <td class="table-data">   
                    <div class="onoffswitch">
                     <input type="checkbox" name="wpzest_social_media_share[]" class="onoffswitch-checkbox"  id="myonoffswitch4" value="reddit"'.$red.'/>
                     <label class="onoffswitch-label" for="myonoffswitch4">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                     </label>
                    </div>
                  </td>    
                  </tr></table>';
                 break;  
                  case 'p':
                   if(!empty($share_options)){
                    if(in_array("pinterest",$share_option))
                    { 
                      $pin="checked='checked'";
                    }
                  }
                    else{
                      $pin = '';
                    }
                    echo '<table id="p"><tr>
                    <th class="table-data">
                        <i class="fa fa-arrows"></i> <label for="wpzest_social_media_share"> <i class="fa fa-pinterest"></i> PINTEREST </label>
                    </th>
                  <td class="table-data">   
                    <div class="onoffswitch">
                     <input type="checkbox" name="wpzest_social_media_share[]" class="onoffswitch-checkbox"  id="myonoffswitch6" value="pinterest"'.$pin.'/>
                     <label class="onoffswitch-label" for="myonoffswitch6">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                     </label>
                    </div>
                  </td>    
                  </tr></table>';  
                  break;
                   case 'pr':
                   if(!empty($share_options)){
                    if(in_array("print",$share_option))
                    { 
                      $pri="checked='checked'";
                    }
                  }
                    else{
                      $pri = '';
                    }
                    echo '<table id="pr"><tr>
                    <th class="table-data">
                        <i class="fa fa-arrows"></i> <label for="wpzest_social_media_share"> <i class="fa fa-print"></i> PRINT </label>
                    </th>
                  <td class="table-data">   
                    <div class="onoffswitch">
                     <input type="checkbox" name="wpzest_social_media_share[]" class="onoffswitch-checkbox"  id="myonoffswitch19" value="print"'.$pri.'/>
                     <label class="onoffswitch-label" for="myonoffswitch19">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                     </label>
                    </div>
                  </td>    
                  </tr></table>';  
                  break; 
                  case 'e':
                   if(!empty($share_options)){
                    if(in_array("email",$share_option))
                    { 
                      $email="checked='checked'";
                    }
                  }
                    else{
                      $email = '';
                    }
                    echo '<table id="e"><tr>
                    <th class="table-data">
                        <i class="fa fa-arrows"></i> <label for="wpzest_social_media_share"> <i class="fa fa-envelope-o"></i> EMAIL </label>
                    </th>
                  <td class="table-data">   
                    <div class="onoffswitch">
                     <input type="checkbox" name="wpzest_social_media_share[]" class="onoffswitch-checkbox"  id="myonoffswitch26" value="email"'.$email.'/>
                     <label class="onoffswitch-label" for="myonoffswitch26">
                     <span class="onoffswitch-inner"></span>
                     <span class="onoffswitch-switch"></span>
                     </label>
                    </div>
                  </td>    
                  </tr></table>';  
                  break; 
                  case 'to':
                    ?><table id="to"><tr>
                    </table><?php
                  break;           
                }
              }?>        
            </div>
    <p class="submit">
         <?php
            wp_nonce_field( 'wpzest_social_media_sharing', 'wpzest_social_media_sharing' );
            ?>
            <?php $wpzest_social_media_share_data_clear = wp_create_nonce( 'wpzest-social-media-share-data-clear' ); ?>
         <center>
      <input type="submit" name="wpzest_save_settings" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
       <a href="<?php echo admin_url() . 'admin-post.php?action=wpzest_social_media_share_clear_data&_wpnonce=' . $wpzest_social_media_share_data_clear; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to clear cache data'); ?>')"><input type="button" value="Clear Cache" class="button-primary"/></a>
       </center>
    </p>
  </ul>
  </section>
  <section id="section-topline-2">
         <ul class="indent">
            <h2 class="title"><?php _e( 'Page Type Settings' ); ?></h2>
            <p><?php _e( 'Please Select the type of Position' ); ?></p>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="wpzest_social_media_share_content_before_in_page">
      <?php _e( 'Content Before Page'); ?>
                        </label>
                    </th>
                    <td>
                     <select name="wpzest_social_media_share_content_before_in_page" id="wpzest_social_media_share_content_before_in_page">
                            <option value="0"<?php selected( get_option( 'wpzest_social_media_share_content_before_in_page', '0' ), '0' ); ?>>
        <?php _e( 'Disabled'); ?>
                            </option>
                            <option value="1"<?php selected( get_option( 'wpzest_social_media_share_content_before_in_page', '0' ), '1' ); ?>>
        <?php _e( 'Enabled'); ?>
                            </option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="wpzest_social_media_share_content_after_in_page">
        <?php _e( 'Content After Page'); ?>
                        </label>
                    </th>
                    <td>
                        <select name="wpzest_social_media_share_content_after_in_page" id="wpzest_social_media_share_content_after_in_page">
                            <option value="0"<?php selected( get_option( 'wpzest_social_media_share_content_after_in_page', '1' ), '0' ); ?>>
               <?php _e( 'Disabled'); ?>
                            </option>
                            <option value="1"<?php selected( get_option( 'wpzest_social_media_share_content_after_in_page', '1' ), '1' ); ?>>
        <?php _e( 'Enabled'); ?>
                            </option>
                        </select>
                    </td>
                </tr>
            </table>
          </ul>
          <ul class="indent">
               <h2 class="title"><?php _e( 'Post Type Settings'); ?></h2>
               <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="wpzest_social_media_share_content_before_in_post">
              <?php _e( 'Content Before Post'); ?>
                        </label>
                    </th>
                    <td>
                        <select name="wpzest_social_media_share_content_before_in_post" id="wpzest_social_media_share_content_before_in_post">
                            <option value="0"<?php selected( get_option( 'wpzest_social_media_share_content_before_in_post', '0' ), '0' ); ?>>
                    <?php _e( 'Disabled'); ?>
                            </option>
                            <option value="1"<?php selected( get_option( 'wpzest_social_media_share_content_before_in_post', '0' ), '1' ); ?>>
                    <?php _e( 'Enabled'); ?>
                            </option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="wpzest_social_media_share_content_after_in_post">
                  <?php _e( 'Content After Post'); ?>
                        </label>
                    </th>
                    <td>
                        <select name="wpzest_social_media_share_content_after_in_post" id="wpzest_social_media_share_content_after_in_post">
                            <option value="0"<?php selected( get_option( 'wpzest_social_media_share_content_after_in_post', '1' ), '0' ); ?>>
                    <?php _e( 'Disabled'); ?>
                            </option>
                            <option value="1"<?php selected( get_option( 'wpzest_social_media_share_content_after_in_post', '1' ), '1' ); ?>>
                    <?php _e( 'Enabled'); ?>
                            </option>
                        </select>
                    </td>
                </tr>
            </table>
      </ul>
      <ul class="indent">
               <h2 class="title"><?php _e( 'Social Share Link Options'); ?></h2>
               <table class="form-table">
                <tr valign="top">
            <td><input type="radio" id='wpzest_radio_option_3' checked name="wpzest_share_settings" value="1" />
             <label for="wpzest_radio_option_3"><?php _e( 'Open in Popup Window'); ?></label></td>
                </tr>
            </table>
      </ul>
      <ul class="indent">
               <h2 class="title"><?php _e( 'Message Above Icons'); ?></h2>
               <table class="form-table">
                <tr valign="top">
                <th>
                  <label for="wpzest_social_media_share_message_icon"><?php _e( 'Text'); ?></label>
                  </th>
                    <td><input type="text" id='wpzest_social_media_share_message_icon' name="wpzest_social_media_share_message_icon" value="<?php echo get_option('wpzest_social_media_share_message_icon');?>">
                 </td>
                </tr>
            </table>
      </ul>
      <ul class="indent">
               <h2 class="title"><?php _e( 'Fake Share Count'); ?></h2>
               <table class="form-table">
                <tr valign="top">
                <th>
                  <label for="wpzest_social_media_share_fake_count"><?php _e( 'Count'); ?></label>
                  </th>
                    <td><input type="text" id='wpzest_social_media_share_fake_count' name="wpzest_social_media_share_fake_count" value="<?php echo get_option('wpzest_social_media_share_fake_count');?>">
                 </td>
                </tr>
            </table>
      </ul>
      <?php $total_count = get_option('wpzest_social_media_share');?>
      <ul class="indent">
               <h2 class="title"><?php _e( 'Total Share Count Enable/Disable'); ?></h2>
               <table class="form-table">
                <tr valign="top">
                    <td><input type="radio" id='wpzest_social_media_total_count_disable' name="wpzest_social_media_share[]" value="0" <?php if(in_array(0,$total_count)) {
              echo "checked='checked'";
            } ?> /><label for="wpzest_social_media_total_count_disable"><?php _e( 'Disable'); ?></label>
            &nbsp;&nbsp;&nbsp;<input type="radio" id='wpzest_social_media_total_count_enable' name="wpzest_social_media_share[]" value="total" <?php if (in_array("total",$total_count)) {
              echo "checked='checked'";
            } ?> /><label for="wpzest_social_media_total_count_enable"><?php _e( 'Enable'); ?></label></td>
                </tr>
            </table>
            </ul>
          <?php  $clear_cache = get_option('wpzest_social_media_share_clear_cache'); ?>
            <ul class="indent">
                 <h2 class="title"><?php _e( 'Enable/Disable Clear Cache'); ?></h2>
                 <table class="form-table">
                    <tr valign="top">
                    <td><input type="radio" id='wpzest_social_media_share_clear_cache_disable' name="wpzest_social_media_share_clear_cache" value="0" <?php if($clear_cache == 0) {
              echo "checked='checked'";
            } ?> /><label for="wpzest_social_media_share_clear_cache_disable"><?php _e( 'Disable'); ?></label>
            &nbsp;&nbsp;&nbsp;<input type="radio" id='wpzest_social_media_share_clear_cache_enable' name="wpzest_social_media_share_clear_cache" value="1" <?php if ($clear_cache == 1) {
              echo "checked='checked'";
            } ?> /><label for="wpzest_social_media_share_clear_cache_enable"><?php _e( 'Enable'); ?></label></td>
                </tr>
            </table>
      </ul> 
            <ul class="indent">
                 <h2 class="title"><?php _e( 'Cache Period'); ?></h2>
                 <table class="form-table">
                    <tr valign="top">
                    <td><input type="text" id='wpzest_social_media_share_clear_cache_time' name="wpzest_social_media_share_clear_cache_time" value="<?php echo get_option('wpzest_social_media_share_clear_cache_time');?>"/>
                    <label for="wpzest_social_media_share_clear_cache_time"><?php _e( 'Time in hours'); ?></label></td>
                    </tr>
            </table>
      </ul>
       <ul class="indent">
      <table class="form-table" id="wpzest_social_media_counter_enable_disable_fb">
        <tr valign="top">
                <th>
                  <label for="wpzest_social_media_share_facebook_id"><?php _e( 'Facebook AppId'); ?></label>
                  </th>
                    <td><input type="text" id='wpzest_social_media_share_facebook_id' name="wpzest_social_media_share_facebook_id" value="<?php echo get_option('wpzest_social_media_share_facebook_id');?>">
                  <label style="font-size:13px !important;" for="wpzest_social_media_share_facebook_id"><?php _e( 'Please go to <a href="https://developers.facebook.com/">https://developers.facebook.com/</a> and create an app and get the App ID'); ?></label>
                 </td>
                 </tr>
                 <tr valign="top">
                 <th>
                  <label for="wpzest_social_media_share_facebook_key"><?php _e( 'Facebook Secret Key'); ?></label>
                  </th>
                    <td><input type="text" id='wpzest_social_media_share_facebook_key' name="wpzest_social_media_share_facebook_key" value="<?php echo get_option('wpzest_social_media_share_facebook_key');?>">
                    <label style="font-size:13px !important;" for="wpzest_social_media_share_facebook_key"><?php _e( 'Please go to <a href="https://developers.facebook.com/">https://developers.facebook.com/</a> and create an app and get the App Secret Key'); ?></label>
                 </td>
                 </tr>                  
          </table>
          </ul> 
      <p class="submit">
         <center>
      <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
       <a href="<?php echo admin_url() . 'admin-post.php?action=wpzest_social_media_share_clear_data&_wpnonce=' . $wpzest_social_media_share_data_clear; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to clear cache data'); ?>')"><input type="button" value="Clear Cache" class="button-primary"/></a>
       </center>
       </p>
   </section>
        <section id="section-topline-3">
          <ul class="indent themelist">
            <h2 class="title"><?php _e( 'Social Icon Buttons' ); ?></h2>
            <p><?php _e('Please choose any one out of available Social Icon Buttons : <br>'); 
              $themes = get_option('wpzest_icon_themes'); 
              $icon_order='1,2,3,4,5,6,7,8,9,10,11,12,13,14,15'; 
              $ico = explode(',', $icon_order); ?>
               <table class="form-table">
                <tr valign="top">
                <?php
                foreach ($ico as $val) 
                {
                  $checked = " ";
                  if($themes == $val)
                  {
                    $checked = "checked='checked'";
                  }
                 echo '<br><label for="wpzest_icon_themes"><input type="radio" name="wpzest_icon_themes" value="'. $val .'"' . $checked .' />Theme '. $val . ' ' . ' </label><br><br>';
                  if($val == 1){
                  echo '<img src="' . plugins_url( 'images/social-1.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 2){
                  echo '<img src="' . plugins_url( 'images/social-2.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 3){
                  echo '<img src="' . plugins_url( 'images/social-3.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 4){
                  echo '<img src="' . plugins_url( 'images/social-4.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 5){
                  echo '<img src="' . plugins_url( 'images/social-5.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 6){
                  echo '<img src="' . plugins_url( 'images/social-6.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 7){
                  echo '<img src="' . plugins_url( 'images/social-7.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 8){
                  echo '<img src="' . plugins_url( 'images/social-8.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 9){
                  echo '<img src="' . plugins_url( 'images/social-9.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 10){
                  echo '<img src="' . plugins_url( 'images/social-10.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 11){
                  echo '<img src="' . plugins_url( 'images/social-11.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 12){
                  echo '<img src="' . plugins_url( 'images/social-12.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 13){
                  echo '<img src="' . plugins_url( 'images/social-13.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 14){
                  echo '<img src="' . plugins_url( 'images/social-27.png', __FILE__ ) . '"><br> ';
                  }
                  if($val == 15){
                  echo '<img src="' . plugins_url( 'images/social-16.png', __FILE__ ) . '"><br> ';
                  }
                }
                ?>
                </tr>
                </table>
        <p class="submit">
         <center>
            <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
            <a href="<?php echo admin_url() . 'admin-post.php?action=wpzest_social_media_share_clear_data&_wpnonce=' . $wpzest_social_media_share_data_clear; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to clear cache data'); ?>')"><input type="button" value="Clear Cache" class="button-primary"/></a> 
          </center>
       </p>
        </ul>
        </section>
       </div><!-- /content -->
</div><!-- /tabs -->
<script>
 /**
 * cbpFWTabs.js v1.0.0
 */
;( function( window ) {
  'use strict';
  function extend( a, b ) {
    for( var key in b ) { 
      if( b.hasOwnProperty( key ) ) {
        a[key] = b[key];
      }
    }
    return a;
  }
  function CBPFWTabs( el, options ) {
    this.el = el;
    this.options = extend( {}, this.options );
      extend( this.options, options );
      this._init();
  }
  CBPFWTabs.prototype.options = {
    start : 0
  };
  CBPFWTabs.prototype._init = function() {
    // tabs elems
    this.tabs = [].slice.call( this.el.querySelectorAll( 'nav > ul > li' ) );
    // content items
    this.items = [].slice.call( this.el.querySelectorAll( '.content-wrap > section' ) );
    // current index
    this.current = -1;
    // show current content item
    this._show();
    // init events
    this._initEvents();
  };
  CBPFWTabs.prototype._initEvents = function() {
    var self = this;
    this.tabs.forEach( function( tab, idx ) {
      tab.addEventListener( 'click', function( ev ) {
        ev.preventDefault();
        self._show( idx );
      } );
    } );
  };
  CBPFWTabs.prototype._show = function( idx ) {
    if( this.current >= 0 ) {
      this.tabs[ this.current ].className = this.items[ this.current ].className = '';
    }
    // change current
    this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
    this.tabs[ this.current ].className = 'tab-current';
    this.items[ this.current ].className = 'content-current';
  };
  // add to global namespace
  window.CBPFWTabs = CBPFWTabs;
})( window );
        (function() {
            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });
 })(); 
</script>
</form>
</div>
</div><!--wrap-->
<?php
}