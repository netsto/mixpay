# MixPay Payment Gateway for WHMCS

[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
[![WHMCS Compatible](https://img.shields.io/badge/WHMCS-Compatible-green.svg)](https://www.whmcs.com/)

MixPay is the official channel partner of Binance Pay, KuCoin Pay, and Gate Pay, providing businesses and developers with a unified solution to accept crypto payments from top exchanges. With a single integration, you can seamlessly enable multi-platform payments, reduce operational complexity, and offer a smooth checkout experience to users worldwide.

Features:
1. 0 fee, No installation fees, order fees, exchange fees for merchant access.
2. Privacy protection, Users can pay with their favorite wallet anytime and anywhere without registering and KYC on Mixpay.
3. Auto-swap，Supports 60+ cryptocurrencies from 15+ chains, with real-time conversion.
4. Non-custodial assets，Every payment is settled in real time and merchants maintain full control over their assets. 
5. Better payment experience，Support calling up wallet payment, multiple payments, Binance pay, Gate pay, etc.
6. Security protection, All important orders will be verified by KYT.

A secure and reliable cryptocurrency payment gateway module for WHMCS that integrates with [MixPay](https://mixpay.me), enabling your business to accept cryptocurrency payments seamlessly.

## 🚀 Features

- **Multi-Currency Support**: Accept payments in various cryptocurrencies
- **Automatic Settlement**: Configure automatic settlement in your preferred currency
- **Real-time Notifications**: Instant payment confirmations via IPN (Instant Payment Notification)
- **Secure Transactions**: Built with security best practices
- **Easy Integration**: Simple installation and configuration process
- **Multi-language Support**: Supports multiple languages for international users
- **Order Tracking**: Complete transaction history and status tracking

## 📋 Requirements

- WHMCS 7.0 or higher
- PHP 7.2 or higher
- cURL extension enabled
- SSL certificate (recommended for production)
- MixPay account with API access

## 🔧 Installation

### Step 1: Download and Upload Files

1. Download the latest release from the [releases page](../../releases)
2. Extract the files to your local computer
3. Upload the contents to your WHMCS root directory

You should have the following files in these locations:
```
WHMCS_ROOT/
├── modules/
│   └── gateways/
│       ├── mixpay.php
│       └── callback/
│           └── mixpay.php
|── modules/
│   └── addons/
│       └── mixpay/
│           ├── mixpay.php
│           ├── lang/
│           │   ├── chinese.php
│           │   └── english.php
│           └── mixpay.js
```

### Step 2: Activate the Payment Gateway

1. Log in to your WHMCS admin panel
2. Navigate to **Setup** → **Payments** → **Payment Gateways**
3. In the "Activate Module" dropdown, select **MixPay**
4. Click the **Activate** button

### Step 3: Configure the Gateway

1. After activation, you'll see the MixPay configuration form
2. Enter your **Payee ID** (obtained from your MixPay account)
3. Enter your **IPN Secret** (from My Account → Edit Settings in MixPay)
4. Optionally, enter an **IPN Debug Email** address for testing notifications
5. Configure other settings as needed
6. Click **Save Changes**

## ⚙️ Configuration Options

| Setting | Description | Required |
|---------|-------------|----------|
| Payee ID | Your unique MixPay payee identifier | Yes |
| IPN Secret | Secret key for validating payment notifications | Yes |
| IPN Debug Email | Email address to receive IPN debugging information | No |
| Settlement Asset | Preferred currency for settlement | No |
| Display Name | Name shown to customers during checkout | No |

## 🔐 Security Considerations

- Always use HTTPS in production environments
- Keep your IPN Secret confidential
- Regularly update the module to the latest version
- Monitor IPN notifications for any suspicious activity
- Set up proper firewall rules for your server

## 📚 Documentation Links

- [WHMCS Payment Gateway Documentation](https://docs.whmcs.com/payments/payment-gateways/)
- [WHMCS Invoice Settings](https://docs.whmcs.com/system/general-settings/general-settings-invoices/#invoice-starting-)
- [MixPay API Documentation](https://mixpay.me/developers)

## 🐛 Troubleshooting

### Common Issues

**Payment not completing:**
- Verify your Payee ID and IPN Secret are correct
- Check that the callback URL is accessible
- Review IPN debug emails for error messages

**Module not appearing:**
- Ensure files are uploaded to the correct directories
- Check file permissions (644 for files, 755 for directories)
- Verify WHMCS version compatibility

**IPN notifications not working:**
- Confirm your server can receive external HTTP requests
- Check firewall settings
- Verify the callback URL is not blocked

### Debug Mode

Enable IPN Debug Email during initial setup to receive detailed information about payment notifications and troubleshoot any issues.

## 🤝 Contributing

We welcome contributions! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

### Development Setup

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the GNU General Public License v3.0 - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

- **Issues**: Report bugs or request features via [GitHub Issues](../../issues)
- **Documentation**: Check the [Wiki](../../wiki) for detailed guides
- **Community**: Join discussions in [GitHub Discussions](../../discussions)

## 🌟 Show Your Support

If you find this plugin useful, please consider:
- ⭐ Starring this repository
- 🐛 Reporting bugs
- 💡 Suggesting new features
- 🤝 Contributing code

## 📊 Changelog

See [CHANGELOG.md](CHANGELOG.md) for a detailed list of changes and version history.

---

**Note**: This module is not officially affiliated with WHMCS or MixPay. It is a community-developed integration.
