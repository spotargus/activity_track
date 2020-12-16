# Activity Track
Track activity for Laravel
## Setup
Ensure you have [composer](http://getcomposer.org/) installed, then run the following command:

```php
composer require elf-r/activity_track
```

Next, you should publish package configs and migration by running command php artisan vendor:publish

After publishing, add ElfR\ActivityTrack\Traits\HasActivityTracking.php trait to your App\Models\User.php model. This trait will provide a few helper methods to your model which allow you to inspect the tracked model activity.

## Additional

By default package registers activity tracking on successfull or failed login



