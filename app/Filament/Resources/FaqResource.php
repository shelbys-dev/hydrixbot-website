<?php

// app/Filament/Resources/FaqResource.php
namespace App\Filament\Resources;


use App\Models\Faq;
use App\Models\FaqCategory;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;


class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 31;
    protected static ?string $label = 'Question/Réponse';
    protected static ?string $pluralLabel = 'FAQ';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(12)->schema([
                Select::make('faq_category_id')->label('Catégorie')
                    ->options(FaqCategory::query()->orderBy('name')->pluck('name', 'id'))
                    ->searchable()->preload()->columnSpan(4),
                TextInput::make('question')->required()->maxLength(255)->columnSpan(8),
                MarkdownEditor::make('answer_md')->label('Réponse (Markdown)')->required()->columnSpan(12)
                    ->fileAttachmentsDirectory('faq')
                    ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'blockquote', 'codeBlock', 'orderedList', 'bulletList']),
                Toggle::make('is_published')->label('Publié')->default(true)->inline(false)->columnSpan(3),
                Toggle::make('is_featured')->label('À la une')->default(false)->inline(false)->columnSpan(3),
                TextInput::make('position')->numeric()->minValue(0)->default(0)->columnSpan(3),
            ])
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('position')
            ->defaultSort('position')
            ->columns([
                TextColumn::make('question')->limit(60)->searchable()->sortable(),
                TextColumn::make('category.name')->label('Catégorie')->sortable()->searchable(),
                IconColumn::make('is_featured')->label('★')->boolean(),
                IconColumn::make('is_published')->label('En ligne')->boolean(),
                TextColumn::make('updated_at')->since(),
            ])
            ->filters([
                SelectFilter::make('faq_category_id')->label('Catégorie')
                    ->options(fn() => FaqCategory::orderBy('name')->pluck('name', 'id')->all()),
                Tables\Filters\TernaryFilter::make('is_published')->label('Publié'),
                Tables\Filters\TernaryFilter::make('is_featured')->label('À la une'),
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
            'index' => FaqResource\Pages\ListFaqs::route('/'),
            'create' => FaqResource\Pages\CreateFaq::route('/create'),
            'edit' => FaqResource\Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
