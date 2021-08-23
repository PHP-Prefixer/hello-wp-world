<?php
/* This file has been prefixed by <PHP-Prefixer> for "Hello Prefixed World for WordPress" */

/**
 * @package Hello_Prefixed_World_For_Wp
 * @version 1.0.0
 */

/*
Plugin Name: Hello WP Prefixed World
Plugin URI: http://wordpress.org/plugins/hello-prefixed-world-for-wp/
Description: Hello Prefixed World plugin for WordPress. A plugin to showcase the PHP-Prefixer service. Install any library freely. PHP-Prefixer will manage your namespaces.
Author: Anibal Sanchez
Version: 1.0.0
Author URI: https://php-prefixer.com/
*/

function hello_prefixed_world_get_lyric() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
I feel the room swayin'
While the band's playin'
One of our old favorite songs from way back when
So, take her wrap, fellas
Dolly, never go away again
Hello, Dolly
Well, hello, Dolly
It's so nice to have you back where you belong
You're lookin' swell, Dolly
I can tell, Dolly
You're still glowin', you're still crowin'
You're still goin' strong
I feel the room swayin'
While the band's playin'
One of our old favorite songs from way back when
So, golly, gee, fellas
Have a little faith in me, fellas
Dolly, never go away
Promise, you'll never go away
Dolly'll never go away again";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_dolly() {
	require_once __DIR__.'/vendor/autoload.php';

	$chosen = hello_prefixed_world_get_lyric();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	// The modified version of the Hello Dolly plugin shows a formatted date before the lyrics
	$now = \PPP\Carbon\Carbon::now();
	$formattedDate = $now->toDateTimeString();

	printf(
		'<p id="dolly"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s // %s</span></p>',
		__( 'Quote from Hello Dolly song, by Jerry Herman:', 'hello-dolly' ),
		$lang,
		$formattedDate,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph.
function dolly_css() {
	echo "
	<style type='text/css'>
	#dolly {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );
