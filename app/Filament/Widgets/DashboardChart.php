<?php

namespace App\Filament\Widgets;

use App\Models\User;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class DashboardChart extends ChartWidget
{
    protected static ?string $heading = 'Total Users';

    protected static string $color = 'info';


    protected function getData(): array
    {
        $data = Trend::model(User::class)
               ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perDay()
        ->count();

        return [
            
            'datasets' => [
                [
                    'label' => 'User Registered',
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
