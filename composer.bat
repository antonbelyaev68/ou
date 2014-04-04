SET PATH=%PATH%;c:\Program Files\Git\cmd;z:\usr\local\php5
SET composerScript=composer.phar

php "%~dp0%composerScript%" %* update
rem php "%~dp0%composerScript%" %* self-update
pause > nul