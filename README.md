# MiniBlog

Blog project in laravel 8.x with PHP 7.3 Frontend and Backend

> I created this application to be my first practical application on the Laravel framework 
> at Sep 11, 2021

## Tech

MiniBlog uses a number of open source projects to work properly:
### Frontend Libraries
- Bootstrap - Powerful, extensible, and feature-packed frontend toolkit.
- Summernote - Super Simple WYSIWYG Editor on Bootstrap
- DataTables - Advanced Interaction Controls To Html Tables
- jQuery - Fast, Small, and Feature-rich Javascript Library.

### Backend Backages
- [spatie/laravel-permission] 4.4
- [laravelista/comments] 4.5
- [laravel/ui] 3.3

## Installation
```sh
git clone git@github.com:ahmedelsewailky/MiniBlog.git
cd MiniBlog
composer update
php artisan migrate:fresh --seed
```
The project database name is `laravel` on .env file

## Plugins

Dillinger is currently extended with the following plugins.
Instructions on how to use them in your own application are linked below.

| Plugin | README |
| ------ | ------ |
| Bootstrap | [https://getbootstrap.com][PlDb] |
| Summernote  | [https://summernote.org][PlGh] |
| DataTables  Drive | [https://datatables.net][PlGd] |
| jQuery  | [https://jquery.com][PlOd] |
