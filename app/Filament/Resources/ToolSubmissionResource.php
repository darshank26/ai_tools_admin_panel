<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ToolSubmissionResource\Pages;
use App\Filament\Resources\ToolSubmissionResource\RelationManagers;
use App\Models\ToolSubmission;
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

class ToolSubmissionResource extends Resource
{
    protected static ?string $model = ToolSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                

                Section::make('Image Section')
                ->schema([
                Forms\Components\FileUpload::make('product_logo')
                ->label('Logo')
                ->image()
                ->imageEditor()
                ->panelAspectRatio('3:1'),
                Forms\Components\FileUpload::make('product_image')
                ->label('Banner Image')
                ->image()
                ->imageEditor()
                ->panelAspectRatio('3:1'),

        
                 ])
                 ->columns(2),


                Section::make('Main Section')
                ->schema([
                Forms\Components\TextInput::make('product_name')
                ->required()        
                ->autocapitalize('words'),

                Forms\Components\TextInput::make('url')
                ->label('URL')
                ->required(),

                
                
                Select::make('pricing')
                ->label('Pricing')
                ->required()
                ->options([
                    'free' => 'Free',
                    'paid' => 'Paid',
                    'freemium' => 'Freemium'
                ]),


                Forms\Components\TextInput::make('your_name')
                ->label('Name')
                ->required(),

                Forms\Components\TextInput::make('your_email')
                ->label('Email')
                ->required(),

                Forms\Components\TextInput::make('twitter_handle')
                ->label('Twitter')
                ->required(),
             
                Forms\Components\RichEditor::make('tags')
                ->label('Tags')
                ->required(),

                Forms\Components\RichEditor::make('short_description')
                ->label('Short Description')
                ->required(),

              
                


            ])
            ->columns(2),

            Section::make()
            ->schema([
            Forms\Components\RichEditor::make('long_description')
            ->label('Long Description')
            ->required(),
            ])
            ->columns(1),
            



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('product_logo'), 
                TextColumn::make('product_name'),         
               TextColumn::make('pricing'),
                TextColumn::make('your_name'),
                TextColumn::make('your_email'),
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

                     FileUpload::make('product_logo'),

                    FileUpload::make('product_image'),

                    ])
                    ->columns(2),

                    Section::make()
                    ->schema([
                    TextInput::make('product_name'),
                    TextInput::make('pricing'),
                    TextInput::make('url')->label('URL'),
                    ])
                    ->columns(3),

                    RichEditor::make('short_description'),
                    RichEditor::make('long_description'),
                    Section::make()
                    ->schema([
                        TextInput::make('your_name')->label('Name'),
                        TextInput::make('your_email')->label('Email'),
                        TextInput::make('twitter_handle'),
                        TextInput::make('tags'),

                    ])
                    ->columns(4)

                
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
            'index' => Pages\ListToolSubmissions::route('/'),
            'create' => Pages\CreateToolSubmission::route('/create'),
            'edit' => Pages\EditToolSubmission::route('/{record}/edit'),
        ];
    }
}
