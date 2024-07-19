<?php

namespace App\Charts;

use App\Models\Task;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TaskPieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setTitle('Tareas')
            ->addData([
                Task::where('status','en_proceso')->count(),
                Task::where('status','pendiente')->count(),
                Task::where('status','hecho')->count()    
                ])
            ->setLabels(['En proceso', 'Pendiente', 'Hecho'])
            ->setColors(['#FFBB68', '#EF7564','#79D0B3']);
    }

    public function build_id($id): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setTitle('Tareas')
            ->addData([
                Task::where('id_user',$id)->where('status','en_proceso')->count(),
                Task::where('id_user',$id)->where('status','pendiente')->count(),
                Task::where('id_user',$id)->where('status','hecho')->count()    
                ])
            ->setLabels(['En proceso', 'Pendiente', 'Hecho'])
            ->setColors(['#FFBB68', '#EF7564','#79D0B3']);
    }
}
