Legacy-PHP-Example-Client
=========================

This examples shows how to use the SnapSearch PHP Client for legacy PHP applications that do not use Composer.

The `index.php` is an example of what you would have inside your front controller. Then you just need a `lib` folder containing the SnapSearch client and the Symfony HTTP Foundation component. In this case the SnapSearch client has been modified to bootstrap both the itself and the Symfony component for autoloading.