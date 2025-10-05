<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavLinkResource\Pages;
use App\Models\NavLink;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class NavLinkResource extends Resource
{
    protected static ?string $model = NavLink::class;

    protected static ?string $navigationIcon  = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'Navigation';
    protected static ?string $pluralLabel     = 'Liens navbar';
    protected static ?string $navigationGroup = 'Contenu';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('label')->label('Libellé')->required(),
            Forms\Components\TextInput::make('url')->required()->placeholder('/docs ou https://...'),
            Forms\Components\TextInput::make('position')->numeric()->default(0),
            Forms\Components\Toggle::make('is_external')->label('Lien externe')->default(false),
            Forms\Components\Toggle::make('is_active')->label('Actif')->default(true),
        ])->columns(2);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->reorderable('position')
            ->columns([
                Tables\Columns\TextColumn::make('position')->sortable()->label('#'),
                Tables\Columns\TextColumn::make('label')->searchable()->label('Libellé'),
                Tables\Columns\TextColumn::make('url')->limit(50)->searchable(),
                Tables\Columns\IconColumn::make('is_external')->boolean()->label('Ext.'),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Actif'),
            ])
            ->defaultSort('position')
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListNavLinks::route('/'),
            'create' => Pages\CreateNavLink::route('/create'),
            'edit'   => Pages\EditNavLink::route('/{record}/edit'),
        ];
    }
}
