<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class TeacherPerClassChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\barChart
    {
        $collection = DB::table('teachers')
            ->select(DB::raw('teachers.name as teacher_name, count(*) as number_of_subjects'))
            ->join('subjects', 'teachers.id', '=', 'subjects.teacher_id')
            ->groupBy('teachers.name')
            ->orderBy('number_of_subjects')
            ->get();

        $number_of_subjects = [];
        $teacher_name = [];
        foreach ($collection as $entry)
        {
            $number_of_subjects[] = $entry->number_of_subjects;
            $teacher_name[] = $entry->teacher_name;
        }

        return $this->chart->barChart()
            ->setTitle('Teacher per class')
            ->setSubtitle('Teachers')
            ->addData('subjects',  $number_of_subjects)
            ->setXAxis($teacher_name)
            ->setGrid();
    }

}