=== Facebook Like Social Widget ===
Contributors: MarijnRongen
Tags: Facebook, like, social, widget, shortcode
Requires at least: 3.0
Tested up to: 3.1.3
Stable tag: 1.4
License: GPLv2 or later

This plugin lets you place a Facebook Like button on your WordPress blog as a widget and/or using shortcode.

== Description ==

To use the widget just drag it to a sidebar and choose one of three button styles. You can also choose to show faces, faces will then be shown when using the standard button style. It is also possible to choose between the captions "Like" and "Recommend" and choose between a light and a dark color scheme.

From version 1.3 on you can enter your own title to be displayed above the widget. It is now also possible to use the XFBML version of the Facebook Like button.

Using shortcode:
From version 1.4 on you can add a Facebook Like button to your page or post using shortcode.
The simplest version is [like/] which will add a button using the standard colors and the permalink of the page or post.
To use the XFBML mode instead of the default frame you add the attribute method="XFBML" to the short code. It could look like [like method="XFBML"/]

To further customize the button you can use the following attributes:
* caption: valid options are "like" and "recommend" (like is default)
* color: valid options are "light" and "dark" (light is default)
* url: Any valid url will do 

Some examples of correct usage of this shortcode are:
[like/]
[like method="XFBML"/]
[like caption="recommend"/]
[like color="dark"/]
[like method="XFBML" url="http://www.wordpress.org"/]

Using the XFBML mode:
Depending on your setup, you may need to load the Javascript SDK to be able to use the XFBML mode in the widget and shortcode. Please refer to [Javascript SDK on Facebook](https://developers.facebook.com/docs/reference/javascript/) for more information.

== Installation ==

Upload the Facebook Like Social Widget plugin to your blog, activate it and drag the widget to your sidebar. See description on shortcode usage.

== Changelog ==

= 1.4 =
* Added shortcode function

= 1.3 =
* Added option to enter and display a custom widget title.
* Added choice between frame and XFBML versions.

= 1.2 =
* Added choice between "Like" and "Recommend" captions.
* Added choice between light and dark color scheme.

= 1.1 = 
* Fixed height issue when showing faces.

= 1.0 =
* First version with button style selection and option to show faces.