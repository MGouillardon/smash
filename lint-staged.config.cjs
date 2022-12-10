module.exports = {
    '*.{js,html,css}': 'prettier --write',
    '*.php': [
        'php ./vendor/bin/php-cs-fixer fix --config .php-cs-fixer.php --allow-risky=yes',
        'php ./vendor/bin/phpinsights fix',
    ],
};
