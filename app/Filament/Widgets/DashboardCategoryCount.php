<?php

 
namespace App\Filament\Widgets;
use App\Models\User;
use App\Models\Category;
use App\Models\Tools;
use App\Models\ToolSubmission;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardCategoryCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()),
            Stat::make('Total Categories', Category::count()),
            Stat::make('Total Tools', Tools::count()),
            Stat::make('Total Featured Tools', Tools::where('is_featured',1)->count()),
            Stat::make('Total Featured Categories', Category::where('is_featured',1)->count()),
            Stat::make('Total Tools Submitted', ToolSubmission::count()),

        ];
    }
}
