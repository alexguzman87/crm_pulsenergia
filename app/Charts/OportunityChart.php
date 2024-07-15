<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class OportunityChart
{
    protected $chartBar;

    public function __construct(LarapexChart $chart)
    {
        $this->chartBar = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chartBar->barChart()
            ->setTitle('San Francisco vs Boston.')
            ->setSubtitle('Wins during season 2021.')
            ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
            ->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
