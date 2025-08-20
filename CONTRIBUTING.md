# Contributing to MixPay WHMCS Gateway

Thank you for your interest in contributing to the MixPay WHMCS Gateway! We welcome contributions from the community and are grateful for any help you can provide.

## 🤝 How to Contribute

### Reporting Bugs

Before creating bug reports, please check the existing issues to avoid duplicates. When you create a bug report, please include as many details as possible:

- **Use a clear and descriptive title**
- **Describe the exact steps to reproduce the problem**
- **Provide specific examples to demonstrate the steps**
- **Describe the behavior you observed and what behavior you expected**
- **Include screenshots if applicable**
- **Provide your environment details:**
  - WHMCS version
  - PHP version
  - Server environment (Apache/Nginx)
  - Browser (if frontend issue)

### Suggesting Enhancements

Enhancement suggestions are welcome! Please provide:

- **A clear and descriptive title**
- **A detailed description of the suggested enhancement**
- **Explain why this enhancement would be useful**
- **List any alternatives you've considered**

### Pull Requests

1. **Fork the repository** and create your branch from `main`
2. **Make your changes** following our coding standards
3. **Test your changes** thoroughly
4. **Update documentation** if necessary
5. **Commit your changes** with clear, descriptive messages
6. **Submit a pull request**

## 🛠️ Development Setup

### Prerequisites

- PHP 7.2 or higher
- WHMCS development environment
- Git
- Text editor or IDE

### Setting Up Development Environment

1. Fork the repository on GitHub
2. Clone your fork locally:
   ```bash
   git clone https://github.com/YOUR_USERNAME/mixpay-whmcs.git
   cd mixpay-whmcs
   ```
3. Create a new branch for your feature:
   ```bash
   git checkout -b feature/your-feature-name
   ```

### Testing

Before submitting a pull request:

1. Test the module in a WHMCS development environment
2. Verify all existing functionality still works
3. Test your new features thoroughly
4. Check for PHP errors and warnings

## 📝 Coding Standards

### PHP Standards

- Follow PSR-12 coding standards
- Use meaningful variable and function names
- Add comments for complex logic
- Maintain backward compatibility when possible

### File Structure

- Keep the existing file structure
- Place new functions in appropriate files
- Follow WHMCS module conventions

### Security

- Validate all user inputs
- Use prepared statements for database queries
- Sanitize output data
- Follow WHMCS security best practices

## 📋 Commit Guidelines

### Commit Message Format

```
type(scope): subject

body

footer
```

### Types

- **feat**: A new feature
- **fix**: A bug fix
- **docs**: Documentation changes
- **style**: Code style changes (formatting, etc.)
- **refactor**: Code refactoring
- **test**: Adding or updating tests
- **chore**: Maintenance tasks

### Examples

```
feat(payment): add support for new cryptocurrency

Add support for processing payments in XYZ cryptocurrency
through the MixPay API integration.

Closes #123
```

```
fix(callback): resolve IPN validation issue

Fix issue where IPN callbacks were failing validation
due to incorrect signature verification.

Fixes #456
```

## 🔍 Code Review Process

1. All submissions require review before merging
2. Maintainers will review your pull request
3. Address any feedback or requested changes
4. Once approved, your contribution will be merged

## 📚 Resources

- [WHMCS Developer Documentation](https://developers.whmcs.com/)
- [MixPay API Documentation](https://mixpay.me/developers)
- [PHP PSR-12 Coding Standard](https://www.php-fig.org/psr/psr-12/)

## 🆘 Getting Help

If you need help with contributing:

- Check existing issues and discussions
- Create a new issue with the "question" label
- Join our community discussions

## 📄 License

By contributing to this project, you agree that your contributions will be licensed under the GNU General Public License v3.0.

## 🙏 Recognition

Contributors will be recognized in the project documentation and release notes. Thank you for helping make this project better!

---

**Note**: This project maintains a Code of Conduct. By participating, you are expected to uphold this code. Please report unacceptable behavior to the project maintainers.
