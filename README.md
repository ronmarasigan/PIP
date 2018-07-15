### This repo is no longer maintained. If you would like to take over ownership please [get in touch](mailto:&#103;&#105;&#108;&#098;&#101;&#114;&#116;&#064;&#112;&#101;&#108;&#108;&#101;&#103;&#114;&#111;&#109;&#046;&#109;&#101;).

# PIP

PIP is a tiny application framework built for people who use a LAMP stack. PIP aims to be as simple as possible to set up and use.

Visit [http://gilbitron.github.com/PIP](http://gilbitron.github.com/PIP/) for more information and documentation.

## Requirements

* PHP 5.1 or greater
* MySQL 4.1.2 or greater
* The mod_rewrite Apache module

## Installation

* Download PIP and extract
* Navigate to `application/config/config.php` and fill in your `base_url`
* You are ready to rock! Point your browser to your `base_url` and hopefully see a welcome message.

## Documentation

Visit [http://gilbitron.github.com/PIP](http://gilbitron.github.com/PIP/) to see the documentation.

## Additional Features

### Interpolation
All interpolated strings are protected against XSS through `htmlspecialchars`.
To use it, in your view files surround your statements with `{{ }}`

Example:
```HTML
<link rel="stylesheet" href="{{ BASE_URL }}/css/app.css">
```

You can also write any kind of PHP logic inside.
```HTML
<h1>{{ $name === 'Bob' ? 'You are bob' : 'You are not bob' }}</h1>
```

### Environment Detection
You can set your environment in `application/config/config.php`.
You can check your environment globally with
```PHP
if (env('DEV')) {
    // We're in DEV
}
```

#### Environment standardization
Although not enforced, we recommend using the following environment strings.
* Developement - `DEV`
* Staging - `STAGING`
* Production - `PRODUCTION`

### Die & Dump
A Laravel borrowed helper function, the `dd` function will dump any data and
prevent the rest of the script from executing.

```PHP
$myVariable = "Hello world";
dd($myVariable);
// unreachable code
```

The function uses the spread operator so any number of arguments can be passed
```PHP
dd($var1, $var2, $var3);
```

## License

PIP is released under the MIT license.
