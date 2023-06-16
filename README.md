# CloudPRO Laravel Driver
Filesystem Driver for using CloudPRO Object Storage on Laravel

## Installation
Install the package via composer
```bash
composer require akbaraditamasp/cloudpro-laravel-driver
```

Next, add a new disk to your filesystems.php config:
```php
'cloudpro' => [
    'driver' => 'cloudpro',
    'pro_box_token' => env('CLOUDPRO_BOX_TOKEN')
],
```

Last, add this variable to your **.env**
```
CLOUDPRO_BOX_TOKEN="YOUR BOX TOKEN"
```

## USAGE
```php
Strorage::disk('cloudpro')->put('avatars/1', $fileContents);
$request->file('file')->store();

$url = Storage::disk('cloudpro')->url('clixl14vw000zwjpgezi24c0r');
Storage::disk('cloudpro')->delete('clixl14vw000zwjpgezi24c0r');
```
For now this driver only provides basic usage
