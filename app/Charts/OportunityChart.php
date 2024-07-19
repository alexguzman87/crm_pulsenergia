<?php

namespace App\Charts;

use App\Models\Oportunity;
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
            ->setTitle('Presupuestos vs Ventas')
            ->addData('Presupuestos', 
                [
                    Oportunity::whereMonth('created_at', 1)->sum('budget'),
                    Oportunity::whereMonth('created_at', 2)->sum('budget'),
                    Oportunity::whereMonth('created_at', 3)->sum('budget'),
                    Oportunity::whereMonth('created_at', 4)->sum('budget'),
                    Oportunity::whereMonth('created_at', 5)->sum('budget'),
                    Oportunity::whereMonth('created_at', 6)->sum('budget'),
                    Oportunity::whereMonth('created_at', 7)->sum('budget'),
                    Oportunity::whereMonth('created_at', 8)->sum('budget'),
                    Oportunity::whereMonth('created_at', 9)->sum('budget'),
                    Oportunity::whereMonth('created_at', 10)->sum('budget'),
                    Oportunity::whereMonth('created_at', 11)->sum('budget'),
                    Oportunity::whereMonth('created_at', 12)->sum('budget'),
                ])
            ->addData('Ventas Exitosas', [
                Oportunity::whereMonth('created_at', 1)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 2)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 3)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 4)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 5)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 6)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 7)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 8)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 9)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 10)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 11)->where('status','sale')->sum('budget'),
                Oportunity::whereMonth('created_at', 12)->where('status','sale')->sum('budget')
                ])
            ->setXAxis([
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre'
            ]);
    }

    public function build_id($id): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chartBar->barChart()
            ->setTitle('Presupuestos vs Ventas')
            ->addData('Presupuestos', 
                [
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 1)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 2)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 3)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 4)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 5)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 6)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 7)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 8)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 9)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 10)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 11)->sum('budget'),
                    Oportunity::where('id_user',$id)->whereMonth('created_at', 12)->sum('budget'),
                ])
            ->addData('Ventas Exitosas', [
                Oportunity::where('id_user',$id)->whereMonth('created_at', 1)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 2)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 3)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 4)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 5)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 6)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 7)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 8)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 9)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 10)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 11)->where('status','sale')->sum('budget'),
                Oportunity::where('id_user',$id)->whereMonth('created_at', 12)->where('status','sale')->sum('budget')
                ])
            ->setXAxis([
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio',
                'Julio',
                'Agosto',
                'Septiembre',
                'Octubre',
                'Noviembre',
                'Diciembre'
            ]);
    }

}
