<?php
function defer_async_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;

		$path = parse_url($url, PHP_URL_PATH);
		$array_temp_defer = ["widget.js",
		    "bdt-uikit.min.js",
		    "webpack.runtime.min.js",
		    "waypoints.min.js",
		    "core.min.js",
		    "ep-carousel.min.js",
		    "jquery.smartmenus.min.js",
		    "ep-scroll-button.min.js",
		    "ep-contact-form.min.js",
		    "ep-contact-form.min.js",
		    "webpack-pro.runtime.min.js",
		    "frontend.min.js",
		    "elements-handlers.min.js",
		    "jquery.sticky.min.js"];


		 $array_temp_async = ["v4-shims.min.js",
		    "bootstrap.min.js"];

    if(in_array(basename($path), $array_temp_defer)) {
    		return $url."' defer='defer";
    }else if(in_array(basename($path), $array_temp_async)) {
    		return $url."' async='async";
    }else{
    	return $url;
    }

//return "$url' defer ";
}
add_filter( 'clean_url', 'defer_async_parsing_of_js', 11, 1 );
?>
