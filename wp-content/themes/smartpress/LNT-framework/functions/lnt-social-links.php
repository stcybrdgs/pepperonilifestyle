<?php

/**
 * Minimal Social Links
 *
 * @author Level9themes
 **/

function smartpress_social_links(){
	
	$link_style = get_theme_mod( 'minimal_footer_links_style');
	
	
	$return = '';
	$return .='<!-- Begin Social Links -->';
	
	if ( get_theme_mod( 'smartpress_social_twitter' ) ){
		$return .=  '<li><a href="'. esc_url( get_theme_mod( 'smartpress_social_twitter' ) ).'" class="twitter-1">';
		$return .=  $link_style == 'text' ? __('Twitter','smartpress') : '<i class="fa fa-twitter"></i>';
		$return .=  '</a></li>'."\n";
	}

	if ( get_theme_mod( 'smartpress_social_facebook') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_facebook') ).'" class="facebook-1">';
	$return .=  $link_style == 'text' ? __('Facebook','smartpress') : '<i class="fa fa-facebook"></i>';
	$return .=  '</a></li>'."\n";
	}

	if ( get_theme_mod( 'smartpress_social_youtube' ) ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_youtube' ) ).'" class="youtube">';
	$return .=  $link_style == 'text' ? __('Youtube','smartpress') : '<i class="fa fa-youtube"></i>';
	$return .=  '</a></li>'."\n";
	 }

	if ( get_theme_mod( 'smartpress_social_pinterest' ) ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_pinterest' ) ).'" class="pinterest">';
	$return .=  $link_style == 'text' ? __('Pinterest','smartpress') : '<i class="fa fa-pinterest"></i>';
	$return .=  '</a></li>'."\n";
	 }

	if ( get_theme_mod( 'smartpress_social_Smartpress') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_Smartpress') ).'" class="Smartpress">';
	$return .=  $link_style == 'text' ? __('Instagram','smartpress') : '<i class="fa fa-Smartpress"></i>';
	$return .=  '</a></li>'."\n";
	}
	if ( get_theme_mod( 'smartpress_social_gplus') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_gplus' ) ).'" class="google_plus">';
	$return .=  $link_style == 'text' ? __('Google+','smartpress') : '<i class="fa fa-google-plus-square"></i>';
	$return .=  '</a></li>'."\n";
	}

	if ( get_theme_mod( 'smartpress_social_dribble') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_dribble' ) ).'" class="dribbble">';
	$return .=  $link_style == 'text' ? __('Dribbble','smartpress') : '<i class="fa fa-dribbble"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_github') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_github' ) ).'" class="github">';
	$return .=  $link_style == 'text' ? __('Github','smartpress') : '<i class="fa fa-github"></i>';
	$return .=  '</a></li>'."\n";
	}

	if ( get_theme_mod( 'smartpress_social_reddit') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_reddit' ) ).'" class="reddit">';
	$return .=  $link_style == 'text' ? __('Reddit','smartpress') : '<i class="fa fa-reddit"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_skype') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_skype' ) ).'" class="skype">';
	$return .=  $link_style == 'text' ? __('Skype','smartpress') : '<i class="fa fa-skype"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_stumbleupon') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_stumbleupon' ) ).'" class="stumbleupon">';
	$return .=  $link_style == 'text' ? __('Stumbeupon','smartpress') : '<i class="fa fa-stumbleupon"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_tumblr') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_tumblr' ) ).'" class="tumblr">';
	$return .=  $link_style == 'text' ? __('Tumblr','smartpress') : '<i class="fa fa-tumblr"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_vimeo') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_vimeo' ) ).'" class="vimeo">';
	$return .=  $link_style == 'text' ? __('Vimeo','smartpress') : '<i class="fa fa-vimeo"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_paypal') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_paypal' ) ).'" class="paypal">';
	$return .=  $link_style == 'text' ? __('Paypal','smartpress') : '<i class="fa fa-paypal"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_lastfm') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_lastfm' ) ).'" class="lastfm">';
	$return .=  $link_style == 'text' ? __('Lastfm','smartpress') : '<i class="fa fa-lastfm"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_linkedin') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_linkedin' ) ).'" class="linkedin">';
	$return .=  $link_style == 'text' ? __('Linkedin','smartpress') : '<i class="fa fa-linkedin"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_flikr') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_flikr' ) ).'" class="flikr">';
	$return .=  $link_style == 'text' ? __('Flikr','smartpress') : '<i class="fa fa-flickr"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_behance') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_behance' ) ).'" class="behance">';
	$return .=  $link_style == 'text' ? __('Behance','smartpress') : '<i class="fa fa-behance"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_delicious') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_delicious' ) ).'" class="delicious">';
	$return .=  $link_style == 'text' ? __('Delicious','smartpress') : '<i class="fa fa-delicious"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_digg') ){
	$return .=  '<li><a href="'.esc_url( get_theme_mod( 'smartpress_social_digg' ) ).'" class="digg">';
	$return .=  $link_style == 'text' ? __('Digg','smartpress') : '<i class="fa fa-digg"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	if ( get_theme_mod( 'smartpress_social_email') ){
	$return .=  '<li><a href="mailto:'.esc_url( get_theme_mod( 'smartpress_social_email' ) ).'" class="email">';
	$return .=  $link_style == 'text' ? __('Email','smartpress') : '<i class="fa fa-envelope"></i>';
	$return .=  '</a></li>'."\n";
	}
	
	$return .= '<!-- End Social Links -->';
	
	$return = apply_filters( 'smartpress_filter_smartpress_minimal_footer_social_links', $return );
	
	echo $return;
}


add_action('top_utilities','smartpress_social_links');
