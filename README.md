# Laravel Package Boilerplate
Laravel 5 Package Boilerplate

### Requirements
    Laravel >=5.1
    PHP >= 5.5.9 
    
## Installation

1. Make your vendor directory under your project's main vendor directory.
    ```
    cd vendor
    mkdir my-vendor
    ```
    
2. Clone the package's boilerplate from github repo into your vendor's package directory.
    ```
    git clone https://github.com/sohelamin/laravel-package-boilerplate.git my-package
    cd my-package
    ```

3. Add your package dir to your project's main **composer.json** file.
    ```
    "psr-4": {
        "App\\": "app/",
        "MyVendor\\MyPackage\\": "vendor/my-vendor/my-package"
    }
    ```
  Note: When you will submit your package to **packagist.org** for composer package then you don't need to follow above instruction #3.

4. Add service provider into **/config/app.php** file.
    ```php
    'providers' => [
        ...
    
        MyVendor\MyPackage\MyPackageServiceProvider::class,,
    ],
	```

5. Run.
    ```
    composer dump-autoload
    composer update
    ```


## Usage

See the bellow snippets.

	```php
    $MyPackageClass = $this->app['MyPackageClass'];
    echo $MyPackageClass::sayHi();
	```

##Author

<a href="http://www.sohelamin.com">Sohel Amin</a>
