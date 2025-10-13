<?php

namespace Koans;

use KoansLib\KoansTestCase;

class AboutDateTime extends KoansTestCase
{
    /**
     * @testdox Creating a DateTime from a string
     */
    public function testCreatingDateTimeFromString()
    {
        $date = new \DateTime("2025-01-01");
        $this->assertEquals('2025-01-01', $date->format('Y-m-d'));
    }

    /**
     * @testdox Modifying a DateTime by adding days
     */
    public function testModifyDateTimeAddDays()
    {
        $date = new \DateTime("2025-01-01");
        $date->modify('+10 days');
        $this->assertEquals('2025-01-11', $date->format('Y-m-d'));
    }

    /**
     * @testdox Getting the day of the week
     */
    public function testGettingDayOfWeek()
    {
        $date = new \DateTime("2025-01-01");
        $this->assertEquals('Wednesday', $date->format('l'));
    }

    /**
     * @testdox Comparing two DateTime objects
     */
    public function testDateTimeComparison()
    {
        $date1 = new \DateTime("2025-01-01");
        $date2 = new \DateTime("2025-02-01");
        $this->assertTrue($date1 < $date2);
    }

    /**
     * @testdox Calculating the difference between two dates
     */
    public function testDateDifference()
    {
        $start = new \DateTime("2025-01-01");
        $end = new \DateTime("2025-01-31");
        $diff = $start->diff($end);
        $this->assertEquals(30, $diff->days);
        $this->assertEquals(0, $diff->invert);
    }

    /**
     * @testdox Formatting a DateTime with custom pattern
     */
    public function testCustomDateTimeFormatting()
    {
        $date = new \DateTime("2025-12-25 15:30:00");
        $this->assertEquals('25/12/2025 15:30', $date->format('d/m/Y H:i'));
    }

    /**
     * @testdox Creating a DateTime in a specific timezone
     */
    public function testDateTimeWithTimeZone()
    {
        $tz = new \DateTimeZone("Asia/Bangkok");
        $date = new \DateTime("now", $tz);
        $this->assertEquals("Asia/Bangkok", $date->getTimezone()->getName());
    }

    /**
     * @testdox Using DateTimeImmutable
     */
    public function testDateTimeImmutable()
    {
        $original = new \DateTimeImmutable("2025-01-01");
        $modified = $original->modify('+1 day');

        $this->assertEquals('2025-01-01', $original->format('Y-m-d'));
        $this->assertEquals('2025-01-02', $modified->format('Y-m-d'));
    }

    /**
     * @testdox Creating and using a DateInterval
     */
    public function testDateIntervalBasicUsage()
    {
        $interval = new \DateInterval('P2Y4DT6H8M'); // 2 years, 4 days, 6 hours, 8 minutes
        $this->assertEquals(2, $interval->y);
        $this->assertEquals(4, $interval->d);
        $this->assertEquals(6, $interval->h);
        $this->assertEquals(8, $interval->i);
    }

    /**
     * @testdox Adding a DateInterval to a DateTime
     */
    public function testAddingDateIntervalToDateTime()
    {
        $date = new \DateTime('2025-01-01');
        $interval = new \DateInterval('P10D'); // 10 days
        $date->add($interval);

        $this->assertEquals('2025-01-11', $date->format('Y-m-d'));
    }

    /**
     * @testdox Subtracting a DateInterval from a DateTime
     */
    public function testSubtractingDateIntervalFromDateTime()
    {
        $date = new \DateTime('2025-01-15');
        $interval = new \DateInterval('P5D'); // 5 days
        $date->sub($interval);

        $this->assertEquals('2025-01-10', $date->format('Y-m-d'));
    }

    /**
     * @testdox Using days property in DateInterval with DateTime::diff
     */
    public function testDateIntervalFromDateDiff()
    {
        $start = new \DateTime('2025-01-01');
        $end = new \DateTime('2025-01-20');
        $interval = $start->diff($end);

        $this->assertInstanceOf(\DateInterval::class, $interval);
        $this->assertEquals(19, $interval->days);
        $this->assertEquals(0, $interval->invert);
    }

    /**
     * @testdox Using DateInterval with negative inversion
     */
    public function testDateIntervalInversion()
    {
        $start = new \DateTime('2025-01-20');
        $end = new \DateTime('2025-01-10');
        $interval = $start->diff($end);

        $this->assertEquals(10, $interval->days);
        $this->assertEquals(1, $interval->invert); // $start > $end
    }

}
