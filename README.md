# Residence Api Client

## Installation

```
$ composer require kominfohss/residence-client

$ artisan vendor:publish --provider="KominfoHSS\Residence\ResidenceServiceProvider"
```

```dotenv
RESIDENCE_KEY=Your Registered Api Key
RESIDENCE_ENDPOINT= Private End Point
```

## Usage

### Get All Residences

```php
\KominfoHSS\Residence\Support\Residence::family()->list();
```

### Get Personal Detail

```php
\KominfoHSS\Residence\Support\Residence::family()->personal('NIK');
```

### Get Family Register Detail

```php
\KominfoHSS\Residence\Support\Residence::family()->register('NO KK');
```
