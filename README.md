# MixPay Payment Gateway for WHMCS

A third-party payment gateway module for WHMCS that redirects customers to MixPay Checkout and credits invoices asynchronously after MixPay confirms payment.

## Features

- Hosted MixPay checkout flow
- Automatic invoice crediting through callback notifications
- Configurable settlement asset
- Transaction history in the WHMCS admin area
- English and Chinese language files
- WHMCS gateway metadata support

## Requirements

- WHMCS 7.0 or later
- PHP 7.2 or later
- PHP cURL and JSON extensions
- HTTPS recommended for production
- A MixPay account and Payee ID

## Installation

Copy the repository contents into your WHMCS installation so these files exist:

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

Then:

1. Go to **Setup > Payments > Payment Gateways**.
2. Activate **MixPay**.
3. Enter your MixPay **Payee ID**.
4. Choose a settlement asset.
5. Save the gateway configuration.

The companion MixPay addon module is used for transaction history and administration features.

## Payment Flow

1. A customer chooses MixPay for an unpaid WHMCS invoice.
2. The gateway creates a MixPay one-time payment.
3. The customer is redirected to `mixpay.me` to complete payment.
4. MixPay sends an asynchronous callback to WHMCS.
5. The callback re-queries MixPay and validates the payment before calling WHMCS `addInvoicePayment()`.
6. The customer may also return to WHMCS after checkout; invoice crediting does not depend on the browser return.

## Gateway Configuration

Current gateway settings include:

- **Payee ID** — MixPay account ID that receives the payment.
- **Settlement Asset ID** — preferred settlement cryptocurrency.
- **Invoice Prefix** — prefix used when the WHMCS invoice number is shorter than MixPay's order ID requirement.
- **Fine Tuning** — optional exchange-rate adjustment.
- **Access Control** — administrator role access for the companion addon.

## Security Notes

The callback does not trust the incoming notification alone. Before crediting an invoice, the module queries MixPay and validates the reported payment status, configured Payee ID, quote amount, and quote asset.

Use HTTPS and keep WHMCS, PHP, and this module updated.

## MixPay Branding

When adding MixPay branding to your WHMCS theme or checkout, use official MixPay assets and follow the MixPay Brand Guidelines:

https://mixpay.me/brand-guidelines

Do not redraw or modify the MixPay logo.

## Support

- Issues: https://github.com/netsto/mixpay/issues
- MixPay Developers: https://mixpay.me/developers
- WHMCS Gateway Documentation: https://developers.whmcs.com/payment-gateways/

## License

GPL-3.0. See [LICENSE](LICENSE).

> This is an open-source WHMCS integration project. MixPay trademarks and brand assets belong to their respective owner.
