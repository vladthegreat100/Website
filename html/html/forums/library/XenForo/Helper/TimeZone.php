<?php

/**
 * Helper for time zone access.
 *
 * @package XenForo_Helper
 */
abstract class XenForo_Helper_TimeZone
{
	/**
	 * Get the list of time zones mapped to user-friendly names.
	 *
	 * @return array
	 */
	public static function getTimeZones()
	{
		return array(
			'Pacific/Midway' => new XenForo_Phrase('utc_1100_american_samoa'),
			'Pacific/Honolulu' => new XenForo_Phrase('utc_1000_hawaii'),
			'Pacific/Marquesas' => new XenForo_Phrase('utc_0930_marquesas_islands'),
			'America/Anchorage' => new XenForo_Phrase('utc_0900_alaska'),
			'America/Los_Angeles' => new XenForo_Phrase('utc_0800_pacific_time'),
			'America/Santa_Isabel' => new XenForo_Phrase('utc_0800_baja_california'),
			'America/Tijuana' => new XenForo_Phrase('utc_0800_tijuana'),
			'America/Denver' => new XenForo_Phrase('utc_0700_mountain_time'),
			'America/Chihuahua' => new XenForo_Phrase('utc_0700_chihuahua'),
			'America/Phoenix' => new XenForo_Phrase('utc_0700_arizona'),
			'America/Chicago' => new XenForo_Phrase('utc_0600_central_time'),
			'America/Belize' => new XenForo_Phrase('utc_0600_saskatchewan'),
			'America/Mexico_City' => new XenForo_Phrase('utc_0600_guadalajara'),
			'Pacific/Easter' => new XenForo_Phrase('utc_0600_easter_island'),
			'America/New_York' => new XenForo_Phrase('utc_0500_eastern_time'),
			'America/Havana' => new XenForo_Phrase('utc_0500_cuba'),
			'America/Bogota' => new XenForo_Phrase('utc_0500_bogota'),
			'America/Caracas' => new XenForo_Phrase('utc_0430_caracas'),
			'America/Halifax' => new XenForo_Phrase('utc_0400_atlantic_time_canada'),
			'America/Goose_Bay' => new XenForo_Phrase('utc_0400_atlantic_time_goose_bay'),
			'America/Asuncion' => new XenForo_Phrase('utc_0400_asuncion'),
			'America/Santiago' => new XenForo_Phrase('utc_0400_santiago'),
			'America/Cuiaba' => new XenForo_Phrase('utc_0400_cuiaba'),
			'America/La_Paz' => new XenForo_Phrase('utc_0400_georgetown'),
			'America/St_Johns' => new XenForo_Phrase('utc_0330_newfoundland'),
			'America/Argentina/Buenos_Aires' => new XenForo_Phrase('utc_0300_buenos_aires'),
			'America/Argentina/San_Luis' => new XenForo_Phrase('utc_0300_san_luis'),
			'America/Argentina/Mendoza' => new XenForo_Phrase('utc_0300_argentina'),
			'Atlantic/Stanley' => new XenForo_Phrase('utc_0300_falkland_islands'),
			'America/Godthab' => new XenForo_Phrase('utc_0300_greenland'),
			'America/Montevideo' => new XenForo_Phrase('utc_0300_montevideo'),
			'America/Sao_Paulo' => new XenForo_Phrase('utc_0300_brasilia'),
			'America/Miquelon' => new XenForo_Phrase('utc_0300_miquelon'),
			'America/Noronha' => new XenForo_Phrase('utc_0200_mid_atlantic'),
			'Atlantic/Cape_Verde' => new XenForo_Phrase('utc_0100_cape_verde'),
			'Atlantic/Azores' => new XenForo_Phrase('utc_0100_azores'),
			'Europe/London' => new XenForo_Phrase('utc_dublin'),
			'Africa/Casablanca' => new XenForo_Phrase('utc_casablanca'),
			'Atlantic/Reykjavik' => new XenForo_Phrase('utc_monrovia'),
			'Europe/Amsterdam' => new XenForo_Phrase('utc_plus_0100_central_european_time'),
			'Africa/Algiers' => new XenForo_Phrase('utc_plus_0100_west_central_africa'),
			'Africa/Windhoek' => new XenForo_Phrase('utc_plus_0100_windhoek'),
			'Africa/Tunis' => new XenForo_Phrase('utc_plus_0100_tunis'),
			'Europe/Athens' => new XenForo_Phrase('utc_plus_0200_eastern_european_time'),
			'Africa/Johannesburg' => new XenForo_Phrase('utc_plus_0200_south_africa_standard_time'),
			'Europe/Kaliningrad' => new XenForo_Phrase('utc_plus_0200_kaliningrad'),
			'Asia/Amman' => new XenForo_Phrase('utc_plus_0200_amman'),
			'Asia/Beirut' => new XenForo_Phrase('utc_plus_0200_beirut'),
			'Africa/Cairo' => new XenForo_Phrase('utc_plus_0200_cairo'),
			'Asia/Jerusalem' => new XenForo_Phrase('utc_plus_0200_jerusalem'),
			'Asia/Gaza' => new XenForo_Phrase('utc_plus_0200_gaza'),
			'Asia/Damascus' => new XenForo_Phrase('utc_plus_0200_syria'),
			'Europe/Moscow' => new XenForo_Phrase('utc_plus_0300_moscow'),
			'Europe/Minsk' => new XenForo_Phrase('utc_plus_0300_minsk'),
			'Africa/Nairobi' => new XenForo_Phrase('utc_plus_0300_baghdad'),
			'Asia/Tehran' => new XenForo_Phrase('utc_plus_0330_tehran'),
			'Asia/Dubai' => new XenForo_Phrase('utc_plus_0400_abu_dhabi'),
			'Asia/Yerevan' => new XenForo_Phrase('utc_plus_0400_yerevan'),
			'Asia/Baku' => new XenForo_Phrase('utc_plus_0400_baku'),
			'Indian/Mauritius' => new XenForo_Phrase('utc_plus_0400_mauritius'),
			'Asia/Kabul' => new XenForo_Phrase('utc_plus_0430_kabul'),
			'Asia/Yekaterinburg' => new XenForo_Phrase('utc_plus_0500_ekaterinburg'),
			'Asia/Tashkent' => new XenForo_Phrase('utc_plus_0500_tashkent'),
			'Asia/Kolkata' => new XenForo_Phrase('utc_plus_0530_chennai'),
			'Asia/Kathmandu' => new XenForo_Phrase('utc_plus_0545_kathmandu'),
			'Asia/Novosibirsk' => new XenForo_Phrase('utc_plus_0600_novosibirsk'),
			'Asia/Dhaka' => new XenForo_Phrase('utc_plus_0600_astana'),
			'Asia/Almaty' => new XenForo_Phrase('utc_plus_0600_almaty'),
			'Asia/Rangoon' => new XenForo_Phrase('utc_plus_0630_yangon'),
			'Asia/Krasnoyarsk' => new XenForo_Phrase('utc_plus_0700_krasnoyarsk'),
			'Asia/Bangkok' => new XenForo_Phrase('utc_plus_0700_bangkok'),
			'Asia/Irkutsk' => new XenForo_Phrase('utc_plus_0800_irkutsk'),
			'Asia/Hong_Kong' => new XenForo_Phrase('utc_plus_0800_beijing'),
			'Asia/Singapore' => new XenForo_Phrase('utc_plus_0800_kuala_lumpur'),
			'Australia/Perth' => new XenForo_Phrase('utc_plus_0800_perth'),
			'Asia/Yakutsk' => new XenForo_Phrase('utc_plus_0900_yakutsk'),
			'Asia/Tokyo' => new XenForo_Phrase('utc_plus_0900_tokyo'),
			'Asia/Seoul' => new XenForo_Phrase('utc_plus_0900_seoul'),
			'Australia/Adelaide' => new XenForo_Phrase('utc_plus_0930_adelaide'),
			'Australia/Darwin' => new XenForo_Phrase('utc_plus_0930_darwin'),
			'Asia/Vladivostok' => new XenForo_Phrase('utc_plus_1000_vladivostok'),
			'Asia/Magadan' => new XenForo_Phrase('utc_plus_1000_magadan'),
			'Australia/Brisbane' => new XenForo_Phrase('utc_plus_1000_brisbane'),
			'Australia/Sydney' => new XenForo_Phrase('utc_plus_1000_sydney'),
			'Pacific/Noumea' => new XenForo_Phrase('utc_plus_1100_solomon_is'),
			'Pacific/Norfolk' => new XenForo_Phrase('utc_plus_1130_norfolk_island'),
			'Asia/Anadyr' => new XenForo_Phrase('utc_plus_1200_anadyr'),
			'Pacific/Auckland' => new XenForo_Phrase('utc_plus_1200_auckland'),
			'Pacific/Fiji' => new XenForo_Phrase('utc_plus_1200_fiji'),
			'Pacific/Chatham' => new XenForo_Phrase('utc_plus_1245_chatham_islands'),
			'Pacific/Tongatapu' => new XenForo_Phrase('utc_plus_1300_nukualofa'),
			'Pacific/Apia' => new XenForo_Phrase('utc_plus_1300_apia_samoa'),
			'Pacific/Kiritimati' => new XenForo_Phrase('utc_plus_1400_kiritimati'),
		);
	}
}