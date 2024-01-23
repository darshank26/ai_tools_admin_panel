<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

   

    public static function form(Form $form): Form
    {
        $options = [];
        for ($i = 1; $i <= 5; $i++) {
           $options["{$i}"] = "Position {$i}";
         }

        return $form
            ->schema([
                
                Forms\Components\FileUpload::make('image')
                ->label('Image')
                ->image()
                ->imageEditor()
                ->panelAspectRatio('5:1')
                ->columnSpan(3),

                Section::make()
                ->schema([

                Forms\Components\TextInput::make('title')
                ->required()
                ->autocapitalize('words'),

                Forms\Components\TextInput::make('url')
                ->label('URL')
                ->required(),

                Select::make('position')
                ->label('Slider Position')
                ->required()
                ->options($options),


                ])
                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('image'), 
                TextColumn::make('title'),
                TextColumn::make('url'),
                TextColumn::make('position'),
                ToggleColumn::make('status'),
                TextColumn::make('created_at')
                ->dateTime()

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
