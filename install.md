# Installation Guide

## Requirements

- WHMCS 7.0 or later
- PHP 7.2 or later
- cURL and JSON extensions
- HTTPS recommended for production
- MixPay Payee ID

## Install

Copy the module files into the matching paths under your WHMCS root directory:

```text
modules/
├── gateways/
│   ├── mixpay.php
│   └── callback/
│       └── mixpay.php
└── addons/
    └── mixpay/
        ├── mixpay.php
        ├── mixpay.js
        └── lang/
            ├── chinese.php
            └── english.php
```

## Activate the Gateway

1. Sign in to the WHMCS administrator area.
2. Open **Setup > Payments > Payment Gateways**.
3. Activate **MixPay**.
4. Enter the MixPay **Payee ID**.
5. Choose the settlement asset.
6. Configure the optional invoice prefix and exchange-rate fine tuning.
7. Save changes.

The gateway configuration can automatically activate the companion MixPay addon used for transaction administration. If needed, review addon permissions in the WHMCS administrator area.

## Payment Flow

The module uses a hosted checkout flow:

1. WHMCS creates a MixPay one-time payment.
2. The customer is redirected to `https://mixpay.me/code/{code}`.
3. MixPay notifies `/modules/gateways/callback/mixpay.php` asynchronously.
4. The callback queries MixPay for the authoritative payment result.
5. After validation, WHMCS credits the invoice.

A browser return is useful for customer experience, but successful invoice crediting does not depend on the customer returning to WHMCS.

## Testing

Before production use:

1. Create a low-value test invoice.
2. Pay it through MixPay Checkout.
3. Confirm the WHMCS invoice changes to Paid.
4. Confirm the payment appears in the MixPay transaction addon.
5. Confirm the WHMCS gateway log contains no callback verification errors.

## Troubleshooting

### Gateway does not appear

- Confirm `modules/gateways/mixpay.php` exists.
- Run PHP syntax checks on the module files.
- Review WHMCS and PHP error logs.

### Checkout does not open

- Confirm the Payee ID and settlement asset are configured.
- Confirm the server can connect to `api.mixpay.me` over HTTPS.
- Check PHP cURL support.

### Payment completed but invoice remains unpaid

- Confirm the callback URL is publicly reachable over HTTPS.
- Review the WHMCS gateway log.
- Confirm the payment amount, quote asset and Payee ID match the created MixPay order.

## Documentation

- MixPay Developers: https://mixpay.me/developers
- MixPay Brand Guidelines: https://mixpay.me/brand-guidelines
- WHMCS Payment Gateways: https://developers.whmcs.com/payment-gateways/
