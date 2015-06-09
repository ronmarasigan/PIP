#PIP

PIP is a tiny application framework built for people who use a LAMP stack. PIP aims to be as simple as possible to set up and use. 

This is Dushan's fork which features.

* Security fix for a Local File Inclusion (credit LB)
* Removal of redundant/legacy code
* Cleanup of directory structure
* Upgraded database handling (using PDO)
* Various minor upgrades

Visit [http://gilbitron.github.com/PIP](http://gilbitron.github.com/PIP/) for more information and documentation.

## Requirements

* A recent version of PHP (with PDO support)
* A recent version of MySQL or MariaDB
* A recent version of Apache with mod_rewrite and htaccess enabled (or another compatible web server such as Nginx)

## Installation

* Download PIP and extract to your web root
* Navigate to `system/` and edit `db.php`, `config.php` and `controllers.php` as needed
* Point your browser to your `base_url`

## License

PIP is released under the MIT license.

Credit to original author [http://gilbitron.github.com/PIP](http://gilbitron.github.com/PIP/).
