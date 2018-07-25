# RichFormSymfony
  
The purpose of this library is, for my projects, to enrich the form fields with **bootstrap** and **fontawesome**.

For now, the only feature is adding an icon before the form field.

## Requirements

- PHP 7.1.3 or higher
- Bootstrap 4
- FontAwesome 4.7

## Installation

To install `RichFormSymfony` run this command : 
`composer require 2latlantik/rich-form-symfony`

Register this bundle, in array, return by `config/bundles.php`

```
[
...
Delatlantik\RichFormSymfonyBundle\RichFormSymfonyBundle::class => ['all' => true],
...
]
```

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details