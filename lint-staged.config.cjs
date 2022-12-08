module.exports = {
    '*.{js,html,css}': 'prettier --write',
    '*.php': 'vendor\\bin\\php-cs-fixer.bat fix',
    '*.php': 'vendor\\bin\\phpinsights.bat fix -q'
  }