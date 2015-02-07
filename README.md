Tera Share
==========

WP plugin that inserts blog-card-like links in articles.  
Once you write a tera-share shortcode in your wordpress,
it generates a blog-card-like link like this:

![Example](https://raw.githubusercontent.com/kotarot/tera-share/master/example.png "Example")

Install
-------

Place the "tera-share" directory in your WordPress plugin directory.


Usage
-----

Shortcode:

    [terashare title="" sitename="" description="" url="" imgurl=""]

Here is guide of attributes:

* title (mandatory): Title of the page.
* sitename (optional): Sitename of the page.
* description (optional): Description or summary of the page.
* url (mandatory): URL of the page.
* imgurl (optional): Thumbnail image of the page. If this is omitted, the capture of the page will be shown.


Future works
------------

* Auto generation of title, sitename, description, and thumbnail from URL by referring to the OGP information.


Lisence
-------

MIT.
