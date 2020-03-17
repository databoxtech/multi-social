# multi-social

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


Php library for pushing social posts to multiple social medias simultaneously with minimum coding.

## Install

Via Composer

``` bash
$ composer require databoxtech/multi-social
```

## Usage

``` php
$multiSocila = new databoxtech\multisocial([
    'facebook' => [
         'app_id' => '',
         'app_secret' => '',
         'access_token' => '',
         'page_id' => '',
     ]
]);
$attachment = new Attachment('/data/sample.jpg', 'Sample Image', Attachment::TYPE_IMAGE);
$post = new Post('Hello, Multi Social!', 'Posts to multiple social medias simultaneously', [$attachment]);
$multiSocila->post($post);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email prabath@databoxtech.com instead of using the issue tracker.

## Credits

- [Prabath Perera][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/databoxtech/multi-social.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/databoxtech/multi-social/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/databoxtech/multi-social.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/databoxtech/multi-social.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/databoxtech/multi-social.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/databoxtech/multi-social
[link-travis]: https://travis-ci.org/databoxtech/multi-social
[link-scrutinizer]: https://scrutinizer-ci.com/g/databoxtech/multi-social/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/databoxtech/multi-social
[link-downloads]: https://packagist.org/packages/databoxtech/multi-social
[link-author]: https://github.com/dryize
[link-contributors]: ../../contributors
