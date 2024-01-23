<?php

namespace App\Filament\Widgets;

use App\Models\Tools;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;


class DashboardToolsChart extends ChartWidget
{
    protected static ?string $heading = 'Total Tools';

    protected static string $color = 'success';


    protected function getData(): array
    {
        $data = Trend::model(Tools::class)
               ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perDay()
        ->count();

        return [
            
            'datasets' => [
                [
                    'label' => 'Total Tools',
                    'data' => $data->map(fn ( TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn ( TrendValue $value) => $value->date)
      

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
