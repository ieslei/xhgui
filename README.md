ies_xhgui
=====

A graphical interface for Tideway profiler

This tool requires that [tideways_xhprof](https://github.com/tideways/php-profiler-extension) are installed.
tideways_xhprof is a PHP Extension that records and provides profiling data.
XHGui (this tool) takes that information, saves it in MongoDB, and provides a convenient GUI.

System Requirements
-------------------

 * PHP version 7.0 or later.
 * [MongoDB Extension](http://pecl.php.net/package/mongodb) MongoDB PHP driver.
 * [MongoDB](http://www.mongodb.org/) MongoDB Itself. XHGui requires version 2.2.0 or later.
 * [Tideways](https://github.com/tideways/php-profiler-extension) to actually profile the data.

Installation
------------

make sure mongodb and tideway extension installed and in php.ini activated

```bash
# make sure mongodb are running (mongod)
$ git clone https://github.com/ieslei/xhgui.git
$ cd xhgui
$ php install.php
$ cp config/config.default.php config/config.php
$ cd webroot
$ php -S localhost:8000
```

add `./external/header.php` to the target project, for shopware in shopware.php 

Mongodb Configuration (optional)
--------------------------------

Add indexes to MongoDB to improve performance.

XHGui stores profiling information in a `results` collection in the
`xhprof` database in MongoDB. Adding indexes improves performance,
letting you navigate pages more quickly.

To add an index, open a `mongo` shell from your command prompt.
Then, use MongoDB's `db.collection.ensureIndex()` method to add
the indexes, as in the following:

```
$ mongo
> use xhprof
> db.results.ensureIndex( { 'meta.SERVER.REQUEST_TIME' : -1 } )
> db.results.ensureIndex( { 'profile.main().wt' : -1 } )
> db.results.ensureIndex( { 'profile.main().mu' : -1 } )
> db.results.ensureIndex( { 'profile.main().cpu' : -1 } )
> db.results.ensureIndex( { 'meta.url' : 1 } )
> db.results.ensureIndex( { 'meta.simple_url' : 1 } )
```

