<?php

namespace App\Filament\Resources\ToolSubmissionResource\Pages;

use App\Filament\Resources\ToolSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListToolSubmissions extends ListRecords
{
    protected static string $resource = ToolSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
