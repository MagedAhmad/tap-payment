# Tap payment integration with Laravel

A neat [tap payment](https://www.tap.company/eg/en) integration with laravel

## Installation

You can install the package via composer:

```bash
composer require magedahmad/tap-payment
```

## Usage

```php
TapCharge::charge($data);
```

### available endpoints


- Charge `POST /charges`
```php
TapCharge::charge($data);
```

- Get charge `GET /charges/{id}`
```php
TapCharge::find($id);
```

- Subscribe `POST subscription/v1/`
```php
TapSubscribe::subscribe($data);
```

- Get subscribtion `GET subscription/v1/{id}`
```php
TapSubscribe::find($id);
```

- List subscriptions `POST subscription/v1/list`
```php
TapSubscribe::list();
```

- Cancel subscription `DELETE subscription/v1/{id}`
```php
TapSubscribe::cancel($id);
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email maged.ahmedr@gmail.com instead of using the issue tracker.

## Credits

-   [Maged Raslan](https://github.com/magedahmad)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
