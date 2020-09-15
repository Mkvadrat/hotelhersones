=== HTTP/2 Push, Async JavaScript, Defer Render Blocking CSS, HTTP2 server push ===
Contributors: rajeshsingh520
Donate link: piwebsolution.com
Tags: HTTP2, Async CSS, Defer CSS, Defer JS, Async JS, Optimize
Requires at least: 4.0
Tested up to: 5.5
License: GPLv2 or later
Requires PHP: 5.4
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: trunk

Push pre-load any resource, Async JavaScript, Defer Render Blocking CSS, with fine rule set to control js and css on different page types, HTTP2 Server push

== Description ==

* Push / Pre-load all JS files in site with one simple option
* Push / Pre-load all the CSS files in your website
* Push / Pre-load other resources throughout the site or based on the page types
* Load CSS Asynchronous or Remove any CSS file throughout the site, or there is a conditional selector that you can apply
* Async / Defer / Remove any JS file throughout the site or based on the WordPress page type

* You can create mobile device specific rule to push, pre-load, remove, async js or css, this works based on the device user agent detection

* You can create desktop device specific rule to push, pre-load, remove, async js or css, this works based on the device user agent detection

<blockquote>
Mobile and Desktop detection works based on the wp_is_mobile() function of the WordPress that detect device based on the user agent date send in the request
</blockquote>

Apart from this it also offer ability to remove Css and JS file from specific pages based in the selected page tag conditions 

Eg: if css path is https://s.w.org/style/wp4.css

then you can match it with wp4.css or style/wp4.css or s.w.org/style/wp4.css

you use 2nd method (style/wp4.css) for more precise selection (this avoid error when there are 2 style with same file name)

== Frequently Asked Questions ==

= I want to push some resources when mobile device is used =
Yes you can do that in the pro version

= I want to remove some css / js when mobile device is used =
Yes you can do that in the pro version using out mobile detect rule, that works based on the browser user agent detection 

= I want to push some resource when the request is coming from desktop =
Yes you can do that in the pro version using Desktop specific rule

= I want to use it for the WooCommerce related js and css file =
Pro version gives you the rules to control resources based on WooCommerce page types like product category, shop, single product, cart, checkout pages