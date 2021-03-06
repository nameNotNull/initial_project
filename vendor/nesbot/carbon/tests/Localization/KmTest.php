<?php

/*
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Localization;

use Carbon\Carbon;
use Tests\AbstractTestCase;

class KmTest extends AbstractTestCase
{
    public function testDiffForHumansLocalizedInKhmer()
    {
        Carbon::setLocale('km');

        $scope = $this;
        $this->wrapWithNonDstDate(function () use ($scope) {
            $d = Carbon::now()->subSeconds(1);
            $scope->assertSame('1 វិនាទីមុន', $d->diffForHumans());

            $d = Carbon::now()->subSeconds(2);
            $scope->assertSame('2 វិនាទីមុន', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(1);
            $scope->assertSame('1 នាទីមុន', $d->diffForHumans());

            $d = Carbon::now()->subMinutes(2);
            $scope->assertSame('2 នាទីមុន', $d->diffForHumans());

            $d = Carbon::now()->subHours(1);
            $scope->assertSame('1 ម៉ោងមុន', $d->diffForHumans());

            $d = Carbon::now()->subHours(2);
            $scope->assertSame('2 ម៉ោងមុន', $d->diffForHumans());

            $d = Carbon::now()->subDays(1);
            $scope->assertSame('1 ថ្ងៃមុន', $d->diffForHumans());

            $d = Carbon::now()->subDays(2);
            $scope->assertSame('2 ថ្ងៃមុន', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(1);
            $scope->assertSame('1 សប្ដាហ៍មុន', $d->diffForHumans());

            $d = Carbon::now()->subWeeks(2);
            $scope->assertSame('2 សប្ដាហ៍មុន', $d->diffForHumans());

            $d = Carbon::now()->subMonths(1);
            $scope->assertSame('1 ខែមុន', $d->diffForHumans());

            $d = Carbon::now()->subMonths(2);
            $scope->assertSame('2 ខែមុន', $d->diffForHumans());

            $d = Carbon::now()->subYears(1);
            $scope->assertSame('1 ឆ្នាំមុន', $d->diffForHumans());

            $d = Carbon::now()->subYears(2);
            $scope->assertSame('2 ឆ្នាំមុន', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $scope->assertSame('1 វិនាទីពី​ឥឡូវ', $d->diffForHumans());

            $d = Carbon::now()->addSecond();
            $d2 = Carbon::now();
            $scope->assertSame('នៅ​ក្រោយ 1 វិនាទី', $d->diffForHumans($d2));
            $scope->assertSame('នៅ​មុន 1 វិនាទី', $d2->diffForHumans($d));

            $scope->assertSame('1 វិនាទី', $d->diffForHumans($d2, true));
            $scope->assertSame('2 វិនាទី', $d2->diffForHumans($d->addSecond(), true));
        });
    }
}
