<?php declare(strict_types=1);

namespace IW\Workshop;

use DateTime;
use InvalidArgumentException;


class DateFormatter
{

    public $partOfDay;
    
    public function __construct($dateTime = false)
    {
        if(!$dateTime || !is_a($dateTime, 'DateTime')) {
            date_default_timezone_set('Europe/Prague');
            $dateTime = new DateTime;
        }
        $currentHour = $dateTime->format('G');

        $this->partOfDay = $this->getPartOfDay($currentHour);

    }

    /**
     * Get current part of the day
     *
     * @return string
     */
    public function getPartOfDay($currentHour) : string
    {
        if( ! is_numeric($currentHour) ) {
            throw new InvalidArgumentException('Wrong input - number needed');
        }

        if ($currentHour >= 0 && $currentHour < 6)
        {
            return 'Night';
        }

        if ($currentHour >= 6 && $currentHour < 12)
        {
            return 'Morning';
        }

        if ($currentHour >= 12 && $currentHour < 18)
        {
            return 'Afternoon';
        }

        return 'Evening';
    }
}
