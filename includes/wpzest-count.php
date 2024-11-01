<?php 
   defined( 'ABSPATH' ) or die( "No script kiddies please!" );
    if ( !defined( 'WPZEST_SHARE_TRANSE' ) ) {
    define( 'WPZEST_SHARE_TRANSE', 'wpzest_social_media_share_trans' );
  }
   global $post;
    $url = get_permalink($post->ID);
    $url = esc_url($url);
    $chache = get_option('wpzest_social_media_share_clear_cache');
    $wpzest_social_media_share_trans = array();
    $chache_time = get_option('wpzest_social_media_share_clear_cache_time');
    if(!empty($chache_time))
    {
      $cache_period  = $cahche_time * 60 * 60;
    }
    else
    {
       $cache_period  = 24 * 60 * 60;
    }
    $social_share= get_option('wpzest_social_media_share');
    $Fake_count = get_option('wpzest_social_media_share_fake_count');
    $message = get_option('wpzest_social_media_share_message_icon');
   if(in_array("facebook",$social_share)){
       if($chache == '1'){
        $facebook_url        =  urlencode($url);
        $facebook_count_trans  = get_transient($facebook_url);
        if ( false === $facebook_count_trans ) {
           $app_id = get_option('wpzest_social_media_share_facebook_id');
           $app_secret = get_option('wpzest_social_media_share_facebook_key');
           $json = @file_get_contents('https://graph.facebook.com/v2.7/?id=' . urlencode($url) . '&access_token=' . $app_id."|".$app_secret );
           $body = json_decode($json, true); 
          $facebook_count = isset( $body['share']['share_count'] ) ? intval( $body['share']['share_count'] ) : 0;
          set_transient( $facebook_url, $facebook_count, $cache_period * HOUR_IN_SECONDS );
          if ( !in_array( $facebook_url, $wpzest_social_media_share_trans ) ) {
            $wpzest_social_media_share_trans[] = $facebook_url;
            update_option( WPZEST_SHARE_TRANSE, $wpzest_social_media_share_trans );
          }
        } else {
          $facebook_count = $facebook_count_trans;
        }
      }
      else{
        $app_id = get_option('wpzest_social_media_share_facebook_id');
        $app_secret = get_option('wpzest_social_media_share_facebook_key');
        $json = @file_get_contents('https://graph.facebook.com/v2.7/?id=' . urlencode($url) . '&access_token=' . $app_id."|".$app_secret );
        $body = json_decode($json); 
        $facebook_count = isset( $body['share']['share_count'] ) ? intval( $body['share']['share_count'] ) : 0;
        }
       }
      if(in_array("googleplus",$social_share)){
        if(!isset($chache) || $chache == '1') {
        $google_url        = urlencode($url);
        $google_count_trans  = get_transient($google_url);
       if ( false === $google_count_trans ) {
           $curl = curl_init();
          curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc" );
          curl_setopt( $curl, CURLOPT_POST, 1 );
          curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
          curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
          curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
          $curl_results = curl_exec( $curl );
          curl_close( $curl );
          $json = json_decode( $curl_results, true );
          $google_count = isset( $json[0]['result']['metadata']['globalCounts']['count'] ) ? intval( $json[0]['result']['metadata']['globalCounts']['count'] ) : 0;
          set_transient( $google_url, $google_count, $cache_period * HOUR_IN_SECONDS );
          if ( !in_array( $google_url, $wpzest_social_media_share_trans ) ) {
            $wpzest_social_media_share_trans[] = $google_url;
            update_option( WPZEST_SHARE_TRANSE, $wpzest_social_media_share_trans );
          }
        } else {
          $google_count = $google_count_trans;
        }
      }
       else{
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc" );
        curl_setopt( $curl, CURLOPT_POST, 1 );
        curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
        $curl_results = curl_exec( $curl );
        curl_close( $curl );
        $json = json_decode( $curl_results, true );
        $google_count = isset( $json[0]['result']['metadata']['globalCounts']['count'] ) ? intval( $json[0]['result']['metadata']['globalCounts']['count'] ) : 0;
        }
       }
     if(in_array("linkedin",$social_share)){
        if($chache == '1'){
          $linkedin_url        = urlencode($url);
          $linkedin_count_trans  = get_transient($linkedin_url);
          if ( false === $linkedin_count_trans ) {
           $json_string = @file_get_contents( 'https://www.linkedin.com/countserv/count/share?url=' . $url.'&format=json' );
            $json = json_decode($json_string,true);
               $linkedin_count = isset( $json['count'] ) ? intval( $json['count'] ) : 0;
          set_transient( $linkedin_url, $linkedin_count, $cache_period * HOUR_IN_SECONDS );
          if ( !in_array( $linkedin_url, $wpzest_social_media_share_trans ) ) {
            $wpzest_social_media_share_trans[] = $linkedin_url;
            update_option( WPZEST_SHARE_TRANSE, $wpzest_social_media_share_trans );
          }
        } else {
          $linkedin_count = $linkedin_count_trans;
        }
      }
    else{
      $json_string = @file_get_contents( 'https://www.linkedin.com/countserv/count/share?url=' . $url.'&format=json' );
      $json = json_decode($json_string,true);
        $linkedin_count = isset( $json['count'] ) ? intval( $json['count'] ) : 0;
      }
    }
    if(in_array("reddit",$social_share)){
       if($chache == '1'){
          $reddit_url        = urlencode($url);
          $reddit_count_trans  = get_transient($reddit_url);
          if ( false === $reddit_count_trans ) {
          $reddit_url = 'http://www.reddit.com/api/info.json?url='.$url;
          $score = $ups = $downs = 0; 
          $content1 = @file_get_contents($reddit_url);  
          $json = json_decode($content1,true);
          foreach($json['data']['children'] as $child) {
            $ups+= $child['data']['ups'];
            $downs+= $child['data']['downs'];
          }
         $reddit_count = $ups - $downs;
          set_transient( $reddit_url, $reddit_count, $cache_period * HOUR_IN_SECONDS );
          if ( !in_array( $reddit_url, $wpzest_social_media_share_trans ) ) {
            $wpzest_social_media_share_trans[] = $reddit_url;
            update_option( WPZEST_SHARE_TRANSE, $wpzest_social_media_share_trans );
          }
        } else {
          $reddit_count = $reddit_count_trans;
        }
      }
    else{
      $reddit_url = 'http://www.reddit.com/api/info.json?url='.$url;
      $score = $ups = $downs = 0;
      $content1 = @file_get_contents($reddit_url);  
          $json = json_decode($content1,true);
          foreach($json['data']['children'] as $child) {
            $ups+= $child['data']['ups'];
            $downs+= $child['data']['downs'];
          }
         $reddit_count = $ups - $downs;
       }
    }
    if(in_array("pinterest",$social_share)){
      if($chache == '1'){
          $pinterest_url        = urlencode($url);
          $pinterest_count_trans  = get_transient($pinterest_url);
      if ( false === $pinterest_count_trans ) {
          $api = @file_get_contents( 'http://api.pinterest.com/v1/urls/count.json?callback%20&url=' . $url );
          $json_string = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $api );
          $json = json_decode($json_string,true);
          $pintrest_count = intval($json['count']);
          set_transient( $pinterest_url, $pintrest_count, $cache_period * HOUR_IN_SECONDS );
          if ( !in_array( $pinterest_url, $wpzest_social_media_share_trans ) ) {
            $wpzest_social_media_share_trans[] = $pinterest_url;
            update_option( WPZEST_SHARE_TRANSE, $wpzest_social_media_share_trans );
          }
        } else {
          $pintrest_count = $pinterest_count_trans;
        }
      }
    else{
       $api = @file_get_contents( 'http://api.pinterest.com/v1/urls/count.json?callback%20&url=' . $url );
        $json_string = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $api );
        $json = json_decode($json_string,true);
        if(isset($json['count'])){
          $pintrest_count = intval($json['count']);
        }
      }
    }
    $total = $Fake_count+$facebook_count+$google_count+$linkedin_count+$reddit_count+$pintrest_count;
    ?>