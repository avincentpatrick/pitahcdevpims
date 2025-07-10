@echo off
REM =================================================================
REM Database Backup Script for dev_pims_db
REM =================================================================
REM
REM This script creates a backup of the dev_pims_db database.
REM It uses the credentials and settings defined below.
REM
REM Make sure mysqldump is in your system's PATH or provide the full
REM path to it. For Laragon, it's typically located at:
REM C:\laragon\bin\mysql\mysql-x.x.xx\bin
REM

REM --- Configuration ---
SET MYSQL_DUMP_PATH="C:\laragon\bin\mysql\mysql-8.4.3-winx64\bin"
SET DB_HOST=127.0.0.1
SET DB_USER=root
SET DB_PASS=
SET DB_NAME=dev_pims_db
SET BACKUP_PATH=%~dp0

REM --- Get current date and time for the filename ---
FOR /f "tokens=2 delims==" %%a in ('wmic OS Get localdatetime /value') do set "dt=%%a"
SET "YYYY=%dt:~0,4%"
SET "MM=%dt:~4,2%"
SET "DD=%dt:~6,2%"
SET "HH=%dt:~8,2%"
SET "MIN=%dt:~10,2%"
SET "SEC=%dt:~12,2%"

SET "TIMESTAMP=%YYYY%-%MM%-%DD%_%HH%-%MIN%-%SEC%"
SET "FILENAME=%DB_NAME%_backup_%TIMESTAMP%.sql"

REM --- Backup Command ---
echo Backing up %DB_NAME% to %FILENAME%...
%MYSQL_DUMP_PATH%\mysqldump --host=%DB_HOST% --user=%DB_USER% --password=%DB_PASS% %DB_NAME% > "%BACKUP_PATH%%FILENAME%"

IF %ERRORLEVEL% EQU 0 (
    echo.
    echo Backup completed successfully!
    echo File saved to: %BACKUP_PATH%%FILENAME%
) ELSE (
    echo.
    echo An error occurred during backup.
)

echo.
pause
