@echo off
title Library System

cd /d C:\xampp\htdocs\perpustakaan

echo Menjalankan Library System...
start "" php artisan serve

timeout /t 3 /nobreak >nul

start "" http://127.0.0.1:8000/books