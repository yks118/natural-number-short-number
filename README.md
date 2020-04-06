# natural-number-short-number
Natural Number To Short Number OR Short Number To Natural Number Functions

## Spec
PHP 7.0+

## How To Use
```php
require_once '{Your Path}/natural_number_short_number.php';

// 1000 -> 1 천 (South Korea)
echo natural_number_to_short_number_hangul(1000);

// 1천 -> 1000 (South Korea)
echo short_number_hangul_to_natural_number('1천');

// 1000 -> 1 千
echo natural_number_to_short_number_hanja(1000);

// 1千 -> 1000
echo short_number_hanja_to_natural_number('1千');

// 1000 -> 1 Thousand
echo natural_number_to_short_number_english(1000);

// 1Thousand -> 1000
echo short_number_english_to_natural_number('1Thousand');

// 1000 -> 1 K
echo natural_number_to_short_number_sns(1000);

// 1K -> 1000
echo short_number_sns_to_natural_number('1K');

// 1000 -> 1 千 (Japan)
echo natural_number_to_short_number_kanji(1000);

// 1千 -> 1000 (Japan)
echo short_number_kanji_to_natural_number('1千');
```