<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocResource\Pages;
use App\Models\Doc;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Str;

class DocResource extends Resource
{
    protected static ?string $model = Doc::class;

    protected static ?string $navigationIcon  = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Docs';
    protected static ?string $pluralLabel     = 'Docs';
    protected static ?string $navigationGroup = 'Contenu';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Titre')
                ->required()
                ->maxLength(255)
                ->live(debounce: 300)
                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('position')
                ->numeric()
                ->default(0),
            Forms\Components\RichEditor::make('content')
                ->label('Contenu')
                ->columnSpanFull()
                ->required()
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'strike',
                    'bulletList',
                    'orderedList',
                    'link',
                    'blockquote',
                    'codeBlock',
                    'h2',
                    'h3',
                    'hr',
                    'undo',
                    'redo',
                ]),
        ])->columns(2);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('position')->sortable()->label('#'),
                Tables\Columns\TextColumn::make('title')->searchable()->limit(40)->label('Titre'),
                Tables\Columns\TextColumn::make('slug')->searchable()->limit(40),
                Tables\Columns\TextColumn::make('updated_at')->dateTime('d/m/Y H:i')->label('Modifié'),
            ])
            ->defaultSort('position')
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDocs::route('/'),
            'create' => Pages\CreateDoc::route('/create'),
            'edit'   => Pages\EditDoc::route('/{record}/edit'),
        ];
    }
}
