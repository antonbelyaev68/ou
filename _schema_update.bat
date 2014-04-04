SET PATH=%PATH%;c:\Program Files\Git\cmd;z:\usr\local\php5

php app/console doctrine:schema:update --force
pause > nul