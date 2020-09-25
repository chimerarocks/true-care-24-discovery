// stylelint.config.js

const sortOrderSmacss = require('stylelint-config-property-sort-order-smacss/generate');

module.exports = {
    extends: ["stylelint-config-sass-guidelines", "stylelint-config-property-sort-order-smacss"],
    rules: {
        "order/properties-order": [
            sortOrderSmacss({
                "emptyLineBefore": "always"
            })
        ],
        "order/properties-alphabetical-order": false
    },
};