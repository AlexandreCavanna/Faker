<?php

namespace Faker\Provider\fr_FR;

class DateTime extends \Faker\Provider\DateTime
{
    protected static $days = [
        'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi',
    ];
    protected static $months = [
        'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet',
        'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre',
    ];
    protected static $formattedDateFormat = [
        '{{dayOfMonth}} {{monthName}} {{year}}',
    ];

    public static function monthName($max = 'now')
    {
        return static::$months[(int) parent::month($max) - 1];
    }

    public static function dayOfWeek($max = 'now')
    {
        return static::$days[static::dateTime($max)->format('w')];
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     *
     * @return string
     *
     * @example '2'
     */
    public static function dayOfMonth($max = 'now')
    {
        return static::dateTime($max)->format('j');
    }

    /**
     * Full date with inflected month
     *
     * @return string
     *
     * @example '11 novembre 2022'
     */
    public function formattedDate()
    {
        $format = static::randomElement(static::$formattedDateFormat);

        return $this->generator->parse($format);
    }
}
