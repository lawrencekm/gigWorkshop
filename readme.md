# gigWorkshop™

[![Release](https://img.shields.io/github/v/release/gigWorkshop/gigWorkshop?label=release)](https://github.com/gigWorkshop/gigWorkshop/releases)
![Downloads]()
[![Translations](https://badges.crowdin.net/gigWorkshop/localized.svg)](https://crowdin.com/project/gigWorkshop)
[![Tests](https://img.shields.io/github/workflow/status/gigWorkshop/gigWorkshop/Tests?label=tests)](https://github.com/gigWorkshop/gigWorkshop/actions)
[![License](https://img.shields.io/github/license/gigWorkshop/gigWorkshop?label=license)](LICENSE.txt)

gigWorkshop is a free, open source and online accounting software designed for small businesses and freelancers. It is built with modern technologies such as Laravel, VueJS, Bootstrap 4, RESTful API etc. Thanks to its modular structure, gigWorkshop provides an awesome App Store for users and developers.

* [Home](https://gigWorkshop.com) - The house of gigWorkshop
* [Forum](https://gigWorkshop.com/forum) - Ask for support
* [Documentation](https://lottery.com/docs) - Learn how to use
* [Developer Portal](https://developer.gigWorkshop.com) - Generate passive income
* [App Store](https://gigWorkshop.com/apps) - Extend your gigWorkshop
* [Translations](https://crowdin.com/project/gigWorkshop) - Help us translate gigWorkshop

## Requirements

* PHP 7.3 or higher
* Database (eg: MySQL, PostgreSQL, SQLite)
* Web Server (eg: Apache, Nginx, IIS)
* [Other libraries](https://gigWorkshop.com/docs/requirements)

## Framework

gigWorkshop uses [Laravel](http://laravel.com), the best existing PHP framework, as the foundation framework and [Module](https://github.com/gigWorkshop/module) package for Apps.

## Installation

* Install [Composer](https://getcomposer.org/download) and [Npm](https://nodejs.org/en/download)
* Clone the repository: `git clone https://github.com/gigWorkshop/gigWorkshop.git`
* Install dependencies: `composer install ; npm install ; npm run dev`
* Install gigWorkshop:

```bash
php artisan install --db-name="gigWorkshop" --db-username="root" --db-password="pass" --admin-email="admin@company.com" --admin-password="123456"
```

* Create sample data (optional): `php artisan sample-data:seed`

## Contributing

Please, be very clear on your commit messages and pull requests, empty pull request messages may be rejected without reason.

When contributing code to gigWorkshop, you must follow the PSR coding standards. The golden rule is: Imitate the existing gigWorkshop code.

Please note that this project is released with a [Contributor Code of Conduct](https://gigWorkshop.com/conduct). By participating in this project you agree to abide by its terms.

## Translation

If you'd like to contribute translations, please check out our [Crowdin](https://crowdin.com/project/gigWorkshop) project.

## Changelog

Please see [Releases](../../releases) for more information what has changed recently.

## Security

Please review [our security policy](https://github.com/gigWorkshop/gigWorkshop/security/policy) on how to report security vulnerabilities.

## Credits

* [Denis Duliçi](https://github.com/denisdulici)
* [Cüneyt Şentürk](https://github.com/cuneytsenturk)
* [All Contributors](../../contributors)

## Partners

Each of our partners can help you craft a beautiful, well-architected project. Feel free to get in [contact](https://gigWorkshop.com/contact) with us to become a partner.

* [Creative Tim](https://www.creative-tim.com) is our design partner since gigWorkshop 2.0 version. They create beautiful UI Kits, Templates, and Dashboards built on top of Bootstrap, Vue.js, React, Angular, Node.js, and Laravel.

## Sponsors

Support gigWorkshop by becoming a sponsor on [Patreon](https://www.patreon.com/gigWorkshop). Your logo will show up here with a link to your website.

## License

gigWorkshop is released under the [GPLv3 license](LICENSE.txt).
