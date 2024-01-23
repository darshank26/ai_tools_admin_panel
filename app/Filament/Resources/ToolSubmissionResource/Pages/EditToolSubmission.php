<?php

namespace App\Filament\Resources\ToolSubmissionResource\Pages;

use App\Filament\Resources\ToolSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditToolSubmission extends EditRecord
{
    protected static string $resource = ToolSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
