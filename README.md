# WEB PROGRAMMING ASSIGNMENT - HK232

Vietnamese version / Phiên bản tiếng Việt: [README.VI_VN.md](./README.VI-VN.md)

## How to deploy and run the project

- Install [XAMPP](https://www.apachefriends.org/download.html)
- Create new folder named `as232` in `htdocs` folder of XAMPP (where you installed XAMPP). Clone the project in this
  folder.
- Run XAMPP Control Panel. Start Apache and MySQL modules.
- Open [phpMyAdmin](http://localhost/phpmyadmin) in browser and create a new database called `as232` with encoding
  `utf8mb4_unicode_ci`.
- Go to your cloned project directory. Import file `as232.sql` to the database.
- User view: visit [http://localhost/as232/](http://localhost/as232/) to open the project.
- Admin view: visit [http://localhost/as232/category/](http://localhost/as232/category/index) and sign in with the
  following credentials:
  - Username: <admin@example.com>
  - Password: 123qwerty

## Note

- Default password for all users is `123qwerty`.

## Environment

- PHP 8.2.12
- Windows 10 / 11
