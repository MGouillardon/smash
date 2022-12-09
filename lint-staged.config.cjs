module.exports = {
    '*.{js,html,css}': 'prettier --write',
    '*.php': [
        './vendor/bin/php-cs-fixer fix --config .php-cs-fixer.php',
        './vendor/bin/phpinsights fix -q'
    ],
  }
