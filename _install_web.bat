SET PATH=%PATH%;c:\Program Files\Git\cmd;z:\usr\local\php5

php app/console assets:install web
php app/console cache:clear
pause > nul