<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ToolsResource\Pages;
use App\Filament\Resources\ToolsResource\RelationManagers;
use App\Models\Tools;
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
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Forms\Components\BelongsToSelect;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Image;
use Filament\Infolists\Components\ImageEntry;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Checkbox;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use App\Models\Category;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;

class ToolsResource extends Resource
{
    protected static ?string $model = Tools::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Section::make('Image Section')
                ->schema([
                Forms\Components\FileUpload::make('logo')
                ->label('Logo')
                ->image()
                ->avatar()
                ->imageEditor()
                ->circleCropper(),
                Forms\Components\FileUpload::make('image')
                ->label('Banner Image')
                ->image()
                ->imageEditor()
                ->panelAspectRatio('3:1'),

                 ])
                 ->columns(2),


                Section::make('Main Section')
                ->schema([
                Forms\Components\TextInput::make('title')
                ->label('Title')
                ->required()        
                ->autocapitalize('words'),
                

                Select::make('category_id')
                ->label('Category')
                ->required()
                 ->options(function () {
                    return Category::all()->pluck('title', 'id');
                }),

                Forms\Components\TextInput::make('short_description')
                ->label('Short Description')
                ->required(),

                Forms\Components\TextInput::make('url')
                ->label('URL')
                ->required(),


            ])
            ->columns(2),


            Section::make('Tags')
            ->schema([

                Toggle::make('is_free')
                ->label('Is Free')
                ->inline(false),

                Toggle::make('is_paid')
                ->label('Is Paid')
                ->inline(false),

                Toggle::make('is_freemium')
                ->label('Is Freemium')
                ->inline(false),

                Toggle::make('is_free_trial')
                ->label('Is Free Trial')
                ->inline(false)
             ])
                ->columns(4),


                Forms\Components\RichEditor::make('pros')
                ->label('Pros'),


                Forms\Components\RichEditor::make('cons')
                ->label('Cons'),

                Forms\Components\RichEditor::make('description')
                ->label('Description')
                ->columnSpan(2)
                
            
            ]);


        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo'), 
                TextColumn::make('title'),
                TextColumn::make('short_description'),
               
                ToggleColumn::make('is_featured'),

                ToggleColumn::make('status'),


                TextColumn::make('created_at')
                ->dateTime(),
               

            ])
            ->filters([
                //
            ])
            
            ->actions([
               
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                ->form([

                    Section::make('Images')
                    ->schema([

                     FileUpload::make('logo'),

                    FileUpload::make('image'),

                    ])
                    ->columns(2),

                    Section::make()
                    ->schema([
                    TextInput::make('title'),
                    TextInput::make('category_id'),



                    // where('id', 1)->pluck('title')->first()


                    TextInput::make('url'),
                    ])
                    ->columns(3),

                    TextInput::make('short_description'),
                    RichEditor::make('description'),
                    Section::make()
                    ->schema([
                    RichEditor::make('pros'),
                    RichEditor::make('cons'),
                    ])
                    ->columns(2),


                    Section::make('Tags')
                    ->schema([

                    Checkbox::make('is_free')
                     ->fixIndistinctState(),
                     Checkbox::make('is_paid')
                     ->fixIndistinctState(),
                     Checkbox::make('is_freemium')
                     ->fixIndistinctState(),
                     Checkbox::make('is_free_trial')
                     ->fixIndistinctState(),
                     
                     ])
                ->columns(4),

                ]),
                
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
            'index' => Pages\ListTools::route('/'),
            'create' => Pages\CreateTools::route('/create'),
            'edit' => Pages\EditTools::route('/{record}/edit'),
        ];
    }
}
