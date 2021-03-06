
<p>
	<img src="transfiguration-logo.png" width="325">
	<h5 >A light-weight template engine</h5>
</p>

[![Travis](https://img.shields.io/travis/svichas/Transfiguration.svg)](https://github.com/svichas/Transfiguration) [![GitHub license](https://img.shields.io/github/license/svichas/Transfiguration.svg)](https://github.com/svichas/Transfiguration) [![Packagist](https://img.shields.io/packagist/v/Transfiguration/Transfiguration.svg)](https://packagist.org/packages/transfiguration/transfiguration)

<h3>Installation</h3>

<p>PHP versions supported: 7.0, 7.1 and 7.2</p>

***

<p>Install with composer: <b>(recommended)</b></p>

```
composer require transfiguration/transfiguration 1.*
```

```php
require 'vendor/autoload.php';
use Transfiguration\Transfiguration;
```

---

<p>Download latest realease: <a href="https://github.com/svichas/Transfiguration/releases">here</a></p>

***

<h3>Usage</h3>

```php
$transfiguration = new Transfiguration;
// Setting template html
$transfiguration->html($templateHtml);
// Setting template variables
$transfiguration->data($templateData);
// Setting template base path for require and include.
$transfiguration->requirePath($templatePath);
```

<h3>Rendering template</h3>
<p>This function is printing template html into the page.</p>

```php
$transfiguration->render();
```

<h3>Exporting template</h3>
<p>This function returns executed template html.</p>

```php
$transfiguration->export();
```

<h3>Transfiguration hooks</h3>
<p>This method extends Transfiguration templating engine functionality.</p>

```
$transfiguration->hook("header", function($content="") {
	return "<h1>{$content}</h1>";
});
```

<p>usage in Transfiguration code</p>

```html
{{ header 'This is a header.'}}
```

*** 

<h2>Transfiguration code</h2>

<h3>For loop</h3>

```html
<ul>
{{ for $key : $value in var }}
	<li>{{ echo $key . " " . $value}}</li>
{{endfor}}
</ul>
```

<h3>If statement</h3>

```html
{{ if $loggedin == true}}
	<b>User logged in!</b>
{{ elseif $guest == true }}
	<b>User is guest!</b>
{{ else }}
 	<b>User not logged in!</b>
{{ endif }}
```

<h3>Print & Echo</h3>

```html
{{echo "string"}}
```
<p>or</p>

```html
{{print "string"}}
```

<h3>Including files</h3>

```html
{{ include 'base/footer.html' }}
```
<p>or</p>

```html
{{ require 'base/footer.html' }}
```


<h3>Setting variables</h3>

```html
{{ var $varname = "varvalue" }}
```


<h3>Comments</h3>

```html
{# This is a comment #}
```

