# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Initial release of MixPay payment gateway for WHMCS
- Multi-currency cryptocurrency payment support
- Automatic settlement configuration
- Real-time payment notifications via IPN
- Multi-language support
- Order tracking and transaction history
- Secure payment processing with MixPay API integration

### Features
- Support for various cryptocurrencies
- Configurable settlement assets
- IPN (Instant Payment Notification) system
- Debug mode for troubleshooting
- Automatic module activation/deactivation
- Database table creation for order tracking
- Admin interface for configuration

### Security
- Secure API communication with MixPay
- IPN secret validation
- SQL injection protection
- XSS protection in admin interface

### Documentation
- Comprehensive README with installation instructions
- Configuration guide
- Troubleshooting section
- Security considerations
- Contributing guidelines

## [1.0.0] - Initial Release

### Added
- Core payment gateway functionality
- MixPay API integration
- WHMCS compatibility
- Basic configuration options
- Payment processing workflow
- Callback handling for payment confirmations

---

## Release Notes

### Version 1.0.0
This is the initial release of the MixPay payment gateway module for WHMCS. The module provides a complete integration with MixPay's cryptocurrency payment platform, allowing WHMCS users to accept various cryptocurrencies as payment methods.

**Key Features:**
- Easy installation and configuration
- Support for multiple cryptocurrencies
- Automatic payment processing
- Real-time payment notifications
- Secure transaction handling

**Compatibility:**
- WHMCS 7.0+
- PHP 7.2+
- Requires cURL extension

**Installation:**
Please refer to the README.md file for detailed installation instructions.

**Support:**
For support, please create an issue on the GitHub repository or refer to the troubleshooting section in the documentation.
