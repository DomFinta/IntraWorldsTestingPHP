<?php

use IW\Workshop\DateFormatter;

use PHPUnit\Framework\TestCase;


class DateFormatterTest extends TestCase {
    public function setUp() :void
    {
        $this->dateFormatter = new DateFormatter;

    }

    public function testConstructor() 
    {
        $testClass = new DateFormatter;
        $this->assertEquals("Afternoon", $testClass->partOfDay);

        $format = 'Y-m-d H:i:s';
        $date = DateTime::createFromFormat($format, '2020-02-15 00:00:00');
        $testClass = new DateFormatter($date);
        $this->assertEquals("Night", $testClass->partOfDay);

        $testClass = new DateFormatter("asdasd");
        $this->assertEquals("Afternoon", $testClass->partOfDay);
    }

    public function testCurrenTimeNight() 
    {
        for($i = 0; $i < 6; $i ++)
        {
            $this->assertEquals('Night', $this->dateFormatter->getPartOfDay($i));
        }
    }

    public function testCurrenTimeMorning() 
    {
        for($i = 6; $i < 12; $i ++)
        {
            $this->assertEquals('Morning', $this->dateFormatter->getPartOfDay($i));
        }
    }

    public function testCurrenTimeAfternoon() 
    {
        for($i = 12; $i < 18; $i ++)
        {
            $this->assertEquals('Afternoon', $this->dateFormatter->getPartOfDay($i));
        }
    }

    public function testCurrenTimeEvening() 
    {
        for($i = 18; $i < 24; $i ++)
        {
            $this->assertEquals('Evening', $this->dateFormatter->getPartOfDay($i));
        }
    }

}