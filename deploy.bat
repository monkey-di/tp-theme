@echo off
REM Deployment script for Tebe Poveryat WordPress theme (Windows)
REM Usage: deploy.bat [host] [user] [path]

setlocal enabledelayedexpansion

REM Configuration
set THEME_DIR=wp-content\themes\tebe-poveryat
set DEPLOY_HOST=%1
if "!DEPLOY_HOST!"=="" set DEPLOY_HOST=tebe-poveryat.realeasystudio.site

set DEPLOY_USER=%2
if "!DEPLOY_USER!"=="" set DEPLOY_USER=abrobe14_monkey

set DEPLOY_PATH=%3
if "!DEPLOY_PATH!"=="" set DEPLOY_PATH=/home/a/abrobe14/tebe-poveryat.realeasystudio.site/public_html/wp-content/themes/tebe-poveryat

echo ========================================
echo Tebe Poveryat Theme Deployment (Windows)
echo ========================================
echo Host: %DEPLOY_USER%@%DEPLOY_HOST%
echo Path: %DEPLOY_PATH%
echo.

REM Check if theme directory exists
if not exist "%THEME_DIR%" (
    echo Error: Theme directory not found at %THEME_DIR%
    exit /b 1
)

REM Step 1: Build theme
echo Step 1: Building theme...
cd /d %THEME_DIR%
call npm install
call npm run build
cd /d ..\..\..\
echo [OK] Theme built successfully
echo.

REM Step 2: Test SSH connection
echo Step 2: Testing SSH connection...
ssh -o ConnectTimeout=5 %DEPLOY_USER%@%DEPLOY_HOST% "echo SSH connection OK"
if !errorlevel! neq 0 (
    echo Error: Cannot connect to server
    exit /b 1
)
echo [OK] SSH connection OK
echo.

REM Step 3: Sync files with rsync
echo Step 3: Uploading files via rsync...
rsync -avz --delete ^
    --exclude=node_modules ^
    --exclude=.git ^
    --exclude=src ^
    --exclude=package.json ^
    --exclude=package-lock.json ^
    %THEME_DIR%/ ^
    %DEPLOY_USER%@%DEPLOY_HOST%:%DEPLOY_PATH%/

if !errorlevel! neq 0 (
    echo Error: rsync failed
    exit /b 1
)
echo [OK] Files uploaded successfully
echo.

REM Step 4: Clear WordPress cache
echo Step 4: Clearing WordPress cache...
ssh %DEPLOY_USER%@%DEPLOY_HOST% "cd $(dirname %DEPLOY_PATH%) && rm -rf wp-content/cache && rm -rf wp-content/upgrade && echo Cache cleared"
echo [OK] Cache cleared
echo.

REM Done
echo ========================================
echo [SUCCESS] Deployment completed!
echo ========================================

endlocal
