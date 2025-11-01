<?php

// app/Filament/Resources/FaqCategoryResource.php
namespace App\Filament\Resources;


use App\Models\FaqCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Str;


class FaqCategoryResource extends Resource
{
    protected static ?string $model = FaqCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 30;
    protected static ?string $label = 'Catégorie FAQ';
    protected static ?string $pluralLabel = 'Catégories FAQ';


    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label('Nom')->required()->reactive()
                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
            TextInput::make('slug')->required()->unique(ignoreRecord: true),
            TextInput::make('position')->numeric()->minValue(0)->default(0),
            Toggle::make('is_published')->label('Publié')->default(true),
        ])->columns(2);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('position')
            ->columns([
                TextColumn::make('name')->label('Nom')->searchable()->sortable(),
                BadgeColumn::make('slug')->color('gray'),
                TextColumn::make('position')->sortable(),
                IconColumn::make('is_published')->label('En ligne')->boolean(),
                TextColumn::make('created_at')->dateTime()->since()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')->label('Publié'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => FaqCategoryResource\Pages\ListFaqCategories::route('/'),
            'create' => FaqCategoryResource\Pages\CreateFaqCategory::route('/create'),
            'edit' => FaqCategoryResource\Pages\EditFaqCategory::route('/{record}/edit'),
        ];
    }
}
