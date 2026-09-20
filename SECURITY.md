# Security Policy

## Supported Versions

| Version | Supported |
| --- | --- |
| 1.0.x | Yes |

## Reporting a Vulnerability

Please do not disclose security vulnerabilities in a public GitHub issue.

Use GitHub's private vulnerability reporting feature for this repository when available, or contact the repository maintainers privately through the project owner profile.

Please include:

- affected file and function
- WHMCS and PHP versions
- reproduction steps
- expected and actual behavior
- security impact
- proof of concept, if appropriate

## Payment Callback Security

The callback handler re-queries MixPay before crediting a WHMCS invoice and validates:

- successful payment status
- configured MixPay Payee ID
- expected quote amount
- expected quote asset
- valid WHMCS invoice ID
- duplicate WHMCS transaction ID

The module uses HTTPS certificate verification for MixPay API requests.

## Operational Recommendations

- Serve WHMCS over HTTPS.
- Keep WHMCS and PHP on supported versions.
- Restrict WHMCS administrator access.
- Monitor WHMCS gateway and activity logs.
- Test upgrades in a staging environment before production deployment.
- Do not modify callback verification logic without reviewing the security implications.

## Scope

This project does not claim to provide a cryptographic webhook signature mechanism when MixPay's integration flow instead relies on querying MixPay's payment-result API. Security claims in documentation should match the behavior implemented in the code.
