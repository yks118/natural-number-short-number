<?php

if (!function_exists('natural_number_to_short_number'))
{
	/**
	 * natural_number_to_short_number
	 *
	 * @param   string  $original
	 * @param   string  $point      round / ceil / floor
	 * @param   array   $shorts
	 *
	 * @return  string
	 */
	function natural_number_to_short_number(string $original, string $point = 'floor', array $shorts = []): string
	{
		$shortNumber = '';
		$original = (int) preg_replace('/[^0-9]/', '', $original);

		if ($original > 0)
		{
			$number = 0;
			$unit = '';
			foreach ($shorts as $key => $value)
			{
				$tmp = intval($original / $key);
				if ($tmp > 0)
				{
					$number = $tmp;
					$unit = $value;
				}
				else
					break;
			}

			switch ($point)
			{
				case 'round' :
					$number = round($number);
					break;
				case 'ceil' :
					$number = ceil($number);
					break;
				default :
					$number = floor($number);
					break;
			}
			$shortNumber = number_format($number) . ' ' . $unit;
		}

		return trim($shortNumber);
	}
}

if (!function_exists('short_number_to_natural_number'))
{
	/**
	 * short_number_to_natural_number
	 *
	 * @param   string  $original
	 * @param   array   $shorts
	 *
	 * @return  int
	 */
	function short_number_to_natural_number(string $original, array $shorts = []): int
	{
		$number = (float) preg_replace('/[^0-9.]/', '', $original);
		$unit = mb_substr(trim($original), -1, 1);

		foreach ($shorts as $key => $value)
		{
			if ($value === $unit)
			{
				$number *= $key;
				break;
			}
		}

		return $number;
	}
}

if (!function_exists('natural_number_to_short_number_hangul'))
{
	/**
	 * natural_number_to_short_number_hangul
	 *
	 * 1000 -> 1 천
	 * 10000 -> 1 만
	 * 100000 -> 10 만
	 *
	 * @param   string  $original
	 * @param   string  $point      round / ceil / floor
	 *
	 * @return  string
	 */
	function natural_number_to_short_number_hangul(string $original, string $point = 'floor'): string
	{
		return natural_number_to_short_number($original, $point, [
			1000            => '천',
			10000           => '만',
			100000000       => '억',
			1000000000000   => '조'
		]);
	}
}

if (!function_exists('short_number_hangul_to_natural_number'))
{
	/**
	 * short_number_hangul_to_natural_number
	 *
	 * 1천 -> 1000
	 * 1만 -> 10000
	 * 10만 -> 100000
	 *
	 * @param   string  $original
	 *
	 * @return  int
	 */
	function short_number_hangul_to_natural_number(string $original): int
	{
		return short_number_to_natural_number($original, [
			1000            => '천',
			10000           => '만',
			100000000       => '억',
			1000000000000   => '조'
		]);
	}
}

if (!function_exists('natural_number_to_short_number_hanja'))
{
	/**
	 * natural_number_to_short_number_hanja
	 *
	 * 1000 -> 1 千
	 * 10000 -> 1 万
	 * 100000 -> 10 万
	 *
	 * @param   string  $original
	 * @param   string  $point      round / ceil / floor
	 *
	 * @return  string
	 */
	function natural_number_to_short_number_hanja(string $original, string $point = 'floor'): string
	{
		return natural_number_to_short_number($original, $point, [
			1000            => '千',
			10000           => '万',
			100000000       => '億',
			1000000000000   => '兆'
		]);
	}
}

if (!function_exists('short_number_hanja_to_natural_number'))
{
	/**
	 * short_number_hanja_to_natural_number
	 *
	 * 1千 -> 1000
	 * 1万 -> 10000
	 * 10万 -> 100000
	 *
	 * @param   string  $original
	 *
	 * @return  int
	 */
	function short_number_hanja_to_natural_number(string $original): int
	{
		return short_number_to_natural_number($original, [
			1000            => '千',
			10000           => '万',
			100000000       => '億',
			1000000000000   => '兆'
		]);
	}
}

if (!function_exists('natural_number_to_short_number_english'))
{
	/**
	 * natural_number_to_short_number_english
	 *
	 * 1000 -> 1 Thousand
	 * 10000 -> 10 Thousand
	 * 100000 -> 100 Thousand
	 *
	 * @param   string  $original
	 * @param   string  $point      round / ceil / floor
	 *
	 * @return  string
	 */
	function natural_number_to_short_number_english(string $original, string $point = 'floor'): string
	{
		return natural_number_to_short_number($original, $point, [
			1000            => 'Thousand',
			1000000         => 'Million',
			1000000000      => 'Billion',
			1000000000000   => 'Trillion'
		]);
	}
}

if (!function_exists('short_number_english_to_natural_number'))
{
	/**
	 * short_number_english_to_natural_number
	 *
	 * 1Thousand -> 1000
	 * 10Thousand -> 10000
	 * 100Thousand -> 100000
	 *
	 * @param   string  $original
	 *
	 * @return  int
	 */
	function short_number_english_to_natural_number(string $original): int
	{
		return short_number_to_natural_number($original, [
			1000            => 'Thousand',
			1000000         => 'Million',
			1000000000      => 'Billion',
			1000000000000   => 'Trillion'
		]);
	}
}

if (!function_exists('natural_number_to_short_number_sns'))
{
	/**
	 * natural_number_to_short_number_sns
	 *
	 * 1000 -> 1 K
	 * 10000 -> 10 K
	 * 100000 -> 100 K
	 *
	 * @param   string  $original
	 * @param   string  $point      round / ceil / floor
	 *
	 * @return  string
	 */
	function natural_number_to_short_number_sns(string $original, string $point = 'floor'): string
	{
		return natural_number_to_short_number($original, $point, [
			1000        => 'K',
			1000000     => 'M'
		]);
	}
}

if (!function_exists('short_number_sns_to_natural_number'))
{
	/**
	 * short_number_sns_to_natural_number
	 *
	 * 1K -> 1000
	 * 10K -> 10000
	 * 100K -> 100000
	 *
	 * @param   string  $original
	 *
	 * @return  int
	 */
	function short_number_sns_to_natural_number(string $original): int
	{
		return short_number_to_natural_number($original, [
			1000        => 'K',
			1000000     => 'M'
		]);
	}
}

if (!function_exists('natural_number_to_short_number_kanji'))
{
	/**
	 * natural_number_to_short_number_kanji
	 *
	 * 1000 -> 1 千
	 * 10000 -> 1 万
	 * 100000 -> 10 万
	 *
	 * @param   string  $original
	 * @param   string  $point      round / ceil / floor
	 *
	 * @return  string
	 */
	function natural_number_to_short_number_kanji(string $original, string $point = 'floor'): string
	{
		return natural_number_to_short_number($original, $point, [
			1000            => '千',
			10000           => '万',
			100000000       => '億',
			1000000000000   => '兆'
		]);
	}
}

if (!function_exists('short_number_kanji_to_natural_number'))
{
	/**
	 * short_number_kanji_to_natural_number
	 *
	 * 1千 -> 1000
	 * 1万 -> 10000
	 * 10万 -> 100000
	 *
	 * @param   string  $original
	 *
	 * @return  string
	 */
	function short_number_kanji_to_natural_number(string $original): string
	{
		return short_number_to_natural_number($original, [
			1000            => '千',
			10000           => '万',
			100000000       => '億',
			1000000000000   => '兆'
		]);
	}
}
