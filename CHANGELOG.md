# Changelog

All notable changes to this project will be documented in this file.

## [Unreleased]

### Added
- WHMCS gateway metadata via `mixpay_MetaData()`.
- WHMCS package metadata via `whmcs.json`.
- Clear documentation of the hosted MixPay checkout and asynchronous callback flow.

### Fixed
- Removed a query condition for a non-existent `destination` column.
- Corrected the settlement-asset helper to call the implemented request function.
- Avoided undefined `request` keys in concurrent API requests.
- Removed an unrelated private-project dependency from the public addon module.
- Enabled TLS certificate and hostname verification for MixPay API requests.
- Strengthened callback verification before crediting WHMCS invoices.
- Updated documentation so configuration options match the implementation.

## [1.0.0]

- Initial public release.
