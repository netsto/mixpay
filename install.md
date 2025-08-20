# Installation Guide

This guide provides detailed instructions for installing the MixPay payment gateway module for WHMCS.

## Prerequisites

Before installing the MixPay gateway, ensure your system meets the following requirements:

### System Requirements
- **WHMCS**: Version 7.0 or higher
- **PHP**: Version 7.2 or higher
- **Extensions**: cURL, JSON
- **SSL Certificate**: Recommended for production environments
- **MixPay Account**: Active account with API access

### WHMCS Configuration
- Admin access to WHMCS
- Ability to upload files to the WHMCS directory
- Database access (automatic table creation)

## Step-by-Step Installation

### 1. Download the Module

Download the latest release from one of these sources:
- [GitHub Releases](https://github.com/your-username/mixpay-whmcs/releases)
- [Official Website](https://your-website.com/downloads)

### 2. Extract Files

Extract the downloaded archive to a temporary location on your computer.

### 3. Upload Files

Upload the files to your WHMCS installation directory:

```
WHMCS_ROOT/
├── modules/
│   └── gateways/
│       ├── mixpay.php
│       └── callback/
│           └── mixpay.php
```

**Important**: Ensure the file permissions are set correctly:
- Files: 644 (rw-r--r--)
- Directories: 755 (rwxr-xr-x)

### 4. Activate the Gateway

1. Log in to your WHMCS admin panel
2. Navigate to **Setup** → **Payments** → **Payment Gateways**
3. Find "MixPay" in the "Activate Module" dropdown
4. Click **Activate**

### 5. Configure the Gateway

After activation, configure the following settings:

#### Required Settings
- **Display Name**: Name shown to customers (e.g., "Cryptocurrency Payment")
- **Payee ID**: Your MixPay payee identifier
- **IPN Secret**: Secret key from your MixPay account

#### Optional Settings
- **Settlement Asset**: Preferred settlement currency
- **IPN Debug Email**: Email for debugging notifications
- **Sort Order**: Display order in payment options

### 6. Test the Installation

1. Enable **IPN Debug Email** during testing
2. Create a test invoice
3. Process a small test payment
4. Verify the payment is recorded correctly
5. Check for any error messages in debug emails

## Configuration Details

### Getting MixPay Credentials

1. Log in to your [MixPay account](https://mixpay.me)
2. Navigate to **My Account** → **Edit Settings**
3. Copy your **Payee ID**
4. Generate or copy your **IPN Secret**

### Setting Up Webhooks

The callback URL for IPN notifications will be:
```
https://yourdomain.com/modules/gateways/callback/mixpay.php
```

Ensure this URL is accessible from the internet and not blocked by firewalls.

### Database Tables

The module automatically creates the following database table:
- `mixpay_orders`: Stores payment transaction data

## Troubleshooting

### Common Issues

**Module not appearing in gateway list:**
- Check file permissions
- Verify files are in correct directories
- Check WHMCS error logs

**Payments not completing:**
- Verify Payee ID and IPN Secret
- Check callback URL accessibility
- Review IPN debug emails

**Database errors:**
- Ensure database user has CREATE TABLE permissions
- Check for existing table conflicts

### Debug Mode

Enable debug mode for troubleshooting:
1. Set **IPN Debug Email** in gateway settings
2. Process a test transaction
3. Check debug emails for detailed information

### Log Files

Check these log files for errors:
- WHMCS Activity Log
- PHP Error Log
- Web Server Error Log

## Security Considerations

### Production Setup
- Use HTTPS for all communications
- Keep IPN Secret confidential
- Regularly update the module
- Monitor transaction logs

### Firewall Configuration
- Allow incoming connections to callback URL
- Restrict admin panel access
- Use strong passwords

## Support

If you encounter issues during installation:

1. Check the [troubleshooting section](README.md#troubleshooting)
2. Review [common issues](https://github.com/your-username/mixpay-whmcs/issues)
3. Create a [new issue](https://github.com/your-username/mixpay-whmcs/issues/new) with:
   - WHMCS version
   - PHP version
   - Error messages
   - Steps to reproduce

## Next Steps

After successful installation:

1. Configure additional payment currencies
2. Set up automated settlement
3. Customize payment page appearance
4. Monitor transaction reports
5. Set up backup procedures

---

**Note**: Always test the installation in a development environment before deploying to production.
