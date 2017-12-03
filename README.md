#PIP

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

You can also write any kind of PHP login inside.
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

## License

PIP is released under the MIT license.

Want to say thanks? [Consider tipping me](https://www.gittip.com/gilbitron).
