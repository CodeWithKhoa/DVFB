# DVFB

DVFB is a PHP-based platform for managing social-media services and tools.

## Features

- **Bán Tool Free** – free tool marketplace where users can earn and spend coins
- **Gạch thẻ / Chuyển tiền / API** – card charging, money transfer and API integration for payments
- **Bán Hosting - cPanel** – provisioning of hosting packages with cPanel access
- **Mua bán clone TikTok, Facebook, Instagram, ...** – trade social media account clones directly from the admin panel
- **Quản lý Tool** – dashboard for publishing and maintaining tools
- **Kiểm tra tên miền** – domain availability checker *(currently experimental)*
- **Trình dịch tích hợp** – built-in translator for convenient site usage (not an external translation service)
- Coin-based account system with upgrade options and optional two-factor authentication

## Setup

1. Copy `.env.example` to `.env` and provide the required values.
2. Configure your web server to serve this directory.
3. Ensure your PHP environment has the necessary extensions for MySQL and SMTP.

## Environment Variables

- `DB_HOST` – Database host
- `DB_NAME` – Database name
- `DB_USERNAME` – Database username
- `DB_PASSWORD` – Database password
- `SMTP_USER` – SMTP username
- `SMTP_PASS` – SMTP password
- `KEY_DLSR` – Application key used for encryption

## Directory Structure

- `ajax/` – AJAX endpoints for interactive features
- `assets/`, `assets1/` – Static assets such as CSS, JavaScript and images
- `config/` – Application configuration files
- `tool/` – Individual tool modules
- `home.php` – Main dashboard entry point

## Purpose

DVFB (short for "Dịch Vụ Facebook") aims to provide a unified platform where users can trade tools, manage services and handle payments in one place. A built-in translator helps visitors navigate the interface in their preferred language for easier accessibility.

## Author

Created by **ManhDev**. © 2024 ManhDev.

## License

This project is licensed under the [MIT License](LICENSE).
