# Security Policy

## Supported Versions

We actively support the following versions of the MixPay WHMCS Gateway with security updates:

| Version | Supported          |
| ------- | ------------------ |
| 1.0.x   | :white_check_mark: |

## Reporting a Vulnerability

We take the security of our software seriously. If you believe you have found a security vulnerability in the MixPay WHMCS Gateway, please report it to us as described below.

### How to Report

**Please do not report security vulnerabilities through public GitHub issues.**

Instead, please send an email to [security@example.com] with the following information:

- Type of issue (e.g. buffer overflow, SQL injection, cross-site scripting, etc.)
- Full paths of source file(s) related to the manifestation of the issue
- The location of the affected source code (tag/branch/commit or direct URL)
- Any special configuration required to reproduce the issue
- Step-by-step instructions to reproduce the issue
- Proof-of-concept or exploit code (if possible)
- Impact of the issue, including how an attacker might exploit the issue

### What to Expect

- We will acknowledge receipt of your vulnerability report within 48 hours
- We will provide a more detailed response within 72 hours indicating next steps
- We will keep you informed of the progress towards a fix and full announcement
- We may ask for additional information or guidance

### Security Update Process

1. **Investigation**: We investigate and confirm the vulnerability
2. **Fix Development**: We develop and test a fix
3. **Release**: We release a security update
4. **Disclosure**: We publicly disclose the vulnerability after users have had time to update

## Security Best Practices

When using the MixPay WHMCS Gateway, please follow these security best practices:

### Installation Security

- Always download the module from official sources
- Verify file integrity before installation
- Use HTTPS for all communications
- Keep WHMCS and PHP updated to the latest versions

### Configuration Security

- Use strong, unique IPN secrets
- Regularly rotate API credentials
- Enable debug mode only during testing
- Monitor IPN notifications for suspicious activity

### Server Security

- Use SSL/TLS certificates
- Configure proper firewall rules
- Regularly update server software
- Monitor server logs for unusual activity

### Data Protection

- Protect sensitive configuration data
- Use secure database connections
- Implement proper access controls
- Regular security audits

## Known Security Considerations

### Input Validation

The module implements input validation for:
- Payment amounts
- Currency codes
- User IDs
- Order IDs

### SQL Injection Protection

- All database queries use prepared statements
- Input sanitization is implemented
- Parameterized queries are used throughout

### Cross-Site Scripting (XSS) Protection

- Output encoding is implemented
- User input is sanitized
- HTML entities are properly escaped

### Authentication

- IPN signatures are verified
- API communications are authenticated
- Session management follows WHMCS standards

## Vulnerability Disclosure Policy

We believe in responsible disclosure and will work with security researchers to:

- Acknowledge security reports within 48 hours
- Provide regular updates on our progress
- Credit researchers who report vulnerabilities (if desired)
- Coordinate disclosure timing

## Security Resources

- [WHMCS Security Best Practices](https://docs.whmcs.com/security/)
- [PHP Security Guidelines](https://www.php.net/manual/en/security.php)
- [OWASP Top 10](https://owasp.org/www-project-top-ten/)

## Contact

For security-related questions or concerns, please contact:
- Email: [security@example.com]
- PGP Key: [Link to PGP key if available]

---

**Note**: This security policy is subject to change. Please check back regularly for updates.
