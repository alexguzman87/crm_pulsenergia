<?php

namespace App\Charts;
use App\Models\Contact;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class RegionLeadChart
{
    protected $chartRegion;

    public function __construct(LarapexChart $chart)
    {
        $this->chartRegion = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        return $this->chartRegion->horizontalBarChart()
            ->setTitle('Leads por Provincia.')
            ->setColors(['#008FFB', '#00E396'])
            ->addData('Madrid', [Contact::where('state','Madrid')->count()])
            ->addData('València', [Contact::where('state','València')->count()])
            ->setXAxis(['']);
    }

    public function build_id($id): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        return $this->chartRegion->horizontalBarChart()
            ->setTitle('Lead de Madrid o Valencia.')
            ->setColors(['#008FFB', '#00E396'])
            ->addData('Madrid', [Contact::where('id_user',$id)->where('state','Madrid')->count()])
            ->addData('València', [Contact::where('id_user',$id)->where('state','València')->count()])
            ->setXAxis(['']);
    }
}
