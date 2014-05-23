https://developer.yahoo.com/weather/#req
https://www.pingdom.com/features/api/documentation/

CarlosIO\Geckoboard
===================

[![Build Status](https://secure.travis-ci.org/carlosbuenosvinos/php-geckoboard-api.png?branch=master)](http://travis-ci.org/carlosbuenosvinos/php-geckoboard-api)

A PHP library for dealing with Geckoboard API (http://www.geckoboard.com)

Installation
============

The best way to install the library is by using [Composer](http://getcomposer.org). Add the following to `composer.json` in the root of your project:

``` javascript
{
    "require": {
        "carlosio/geckoboard": "dev-master"
    }
}
```

Then, on the command line:

``` bash
curl -s http://getcomposer.org/installer | php
php composer.phar install
```

Use the generated `vendor/autoload.php` file to autoload the library classes.

Usage
=====

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use CarlosIO\Geckoboard\Widgets\NumberAndSecondaryStat;
use CarlosIO\Geckoboard\Client;

$myWidget = new NumberAndSecondaryStat();
$myWidget->setId('<your widget id>');
$myWidget->setMainValue(123);
$myWidget->setSecondaryValue(238);
$myWidget->setMainPrefix('EUR');

$geckoboardClient = new Client();
$geckoboardClient->setApiKey('<your token>');
$geckoboardClient->push($myWidget);
```

Widget: Number and optional secondary stat
==========================================
[![Number and optional secondary stat](http://www.geckoboard.com/wp-content/uploads/2013/03/Number2ndstat-1.png)](http://www.geckoboard.com/developers/custom-widgets/widget-types/number-and-optional-secondary-stat/)

```php
use CarlosIO\Geckoboard\Widgets\NumberAndSecondaryStat;
use CarlosIO\Geckoboard\Client;

$myWidget = new NumberAndSecondaryStat();
$myWidget->setId('<your widget id>');
$myWidget->setMainValue(123);
$myWidget->setSecondaryValue(238);
$myWidget->setMainPrefix('EUR');

$geckoboardClient = new Client();
$geckoboardClient->setApiKey('<your token>');
$geckoboardClient->push($myWidget);
```

Widget: RAG numbers only
========================
[![RAG numbers only](http://cdn2.hubspot.net/hub/326854/file-376184420-png/images/RAGNumbers-1.png?t=1383905917000)](http://www.geckoboard.com/developers/custom-widgets/widget-types/rag-numbers-only/)

```php
use CarlosIO\Geckoboard\Data\Entry;
use CarlosIO\Geckoboard\Widgets\RagNumbers;
use CarlosIO\Geckoboard\Client;

$myWidget = new RagNumbers();
$myWidget->setId('<your widget id>');

$redData = new Entry();
$redData->setValue(132)->setText('This is the red description');
$myWidget->setRedData($redData);

$amberData = new Entry();
$amberData->setValue(134)->setText('This is the amber description');
$myWidget->setAmberData($amberData);

$greenData = new Entry();
$greenData->setValue(34)->setText('This is the green description');
$myWidget->setGreenData($greenData);

$geckoboardClient->push($myWidget);
```

Widget: RAG column and numbers
==============================
[![RAG column and numbers](http://www.geckoboard.com/wp-content/uploads/2013/03/RAGColNum-1.png)](http://www.geckoboard.com/developers/custom-widgets/widget-types/rag-column-and-numbers/)

```php
use CarlosIO\Geckoboard\Data\Entry;
use CarlosIO\Geckoboard\Widgets\RagColumnAndNumbers;
use CarlosIO\Geckoboard\Client;

$myWidget = new RagColumnAndNumbers();
$myWidget->setId('<your widget id>');

$redData = new Entry();
$redData->setValue(132)->setText('This is the red description');
$myWidget->setRedData($redData);

$amberData = new Entry();
$amberData->setValue(13)->setText('This is the amber description');
$myWidget->setAmberData($amberData);

$greenData = new Entry();
$greenData->setValue(3)->setText('This is the green description');
$myWidget->setGreenData($greenData);

$geckoboardClient->push($myWidget);
```

Widget: Text
============
[![Text](http://www.geckoboard.com/wp-content/uploads/2013/03/Text-1.png)](http://www.geckoboard.com/developers/custom-widgets/widget-types/text/)

```php
use CarlosIO\Geckoboard\Widgets\Text;
use CarlosIO\Geckoboard\Data\Text\Item;
use CarlosIO\Geckoboard\Client;

$myWidget = new Text();
$myWidget->setId('<your widget id>');

$firstItem = new Item();
$secondItem = new Item();

$firstItem->setText('Test message 1');

$secondItem->setText('Test message 2');
$secondItem->setType(Item::TYPE_ALERT);

$myWidget->addItem($firstItem);
$myWidget->addItem($secondItem);

$geckoboardClient->push($myWidget);
```

Widget: Funnel
==============
[![Funnel](http://www.geckoboard.com/wp-content/uploads/2013/03/Funnel-1.png)](http://www.geckoboard.com/developers/custom-widgets/widget-types/funnel/)

```php
use CarlosIO\Geckoboard\Data\Funnel\Entry;
use CarlosIO\Geckoboard\Widgets\Funnel;

$myWidget = new Funnel();
$myWidget->setId('<your widget id>');
$myWidget->setType('reversed');
$myWidget->setShowPercentage(false);

$error = new Entry();
$error->setLabel('Step 1')->setValue(87809);
$myWidget->addEntry($error);

$error = new Entry();
$error->setLabel('Step 2')->setValue(70022);
$myWidget->addEntry($error);

$error = new Entry();
$error->setLabel('Step 3')->setValue(63232);
$myWidget->addEntry($error);

$error = new Entry();
$error->setLabel('Step 4')->setValue(53232);
$myWidget->addEntry($error);

$error = new Entry();
$error->setLabel('Step 5')->setValue(32123);
$myWidget->addEntry($error);

$error = new Entry();
$error->setLabel('Step 6')->setValue(23232);
$myWidget->addEntry($error);

$error = new Entry();
$error->setLabel('Step 7')->setValue(12232);
$myWidget->addEntry($error);

$error = new Entry();
$error->setLabel('Step 8')->setValue(2323);
$myWidget->addEntry($error);

$geckoboardClient->push($myWidget);
```

Widget: Map
===========
[![Funnel](http://www.geckoboard.com/wp-content/uploads/2013/03/Map-1.png)](http://www.geckoboard.com/developers/custom-widgets/widget-types/map/)

```php
use CarlosIO\Geckoboard\Data\Point;
use CarlosIO\Geckoboard\Widgets\Map;

$myWidget = new Map();
$myWidget->setId('<your widget id>');

$point = new Point();
$point->setSize(10)->setColor('FF0000')->setLatitude('40.416775')->setLongitude('-3.70379');
$myWidget->addPoint($point);

$geckoboardClient->push($myWidget);
```

Testing
=======

In order to run the test

    $ bin/phpunit --coverage-text
