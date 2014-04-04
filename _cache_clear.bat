SET PATH=%PATH%;c:\Program Files\Git\cmd;z:\usr\local\php5

php app/console cache:clear --env=dev --no-debug
pause > nul