module.exports = {
    '*.{js,html,css}': 'prettier --write',
    '*.php': './vendor/bin/php-cs-fixer --config .php-cs-fixer.php fix',
    '*.php': './vendor/bin/phpinsights fix -q'
  }