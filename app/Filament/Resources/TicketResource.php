<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Models\Bot\Ticket; // <— ICI
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationGroup = 'Support';
    protected static ?string $navigationLabel = 'Tickets (bot)';
    protected static ?int $navigationSort = 10;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([]); // read-only côté panel
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('#')->sortable()->copyable(),
                Tables\Columns\TextColumn::make('serverconfig.server_id')
                    ->label('Serveur (server_id)')
                    ->searchable()
                    ->copyable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('channel_id')
                    ->label('Channel ID')->copyable()->toggleable(),
                Tables\Columns\TextColumn::make('opener_tag')
                    ->label('Ouvert par')
                    ->default(fn($r) => $r->opener_tag ?: $r->opener_user_id)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('reason')
                    ->label('Motif')->limit(60)->wrap()->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Statut')
                    ->colors(['success' => 'closed', 'warning' => 'open'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('Y-m-d H:i')->sortable()->since(),
                Tables\Columns\TextColumn::make('closed_at')->dateTime('Y-m-d H:i')->sortable()->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status')->label('Statut')->options([
                    'open' => 'Ouverts',
                    'closed' => 'Fermés',
                ]),
                SelectFilter::make('serverconfig_id')
                    ->label('Serveur')
                    ->options(
                        fn() =>
                        \App\Models\Bot\ServerConfig::query()
                            ->orderBy('server_id')
                            ->pluck('server_id', 'id')
                            ->toArray()
                    ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Action::make('exportMd')
                    ->label('Exporter .md')
                    ->icon('heroicon-o-arrow-down-on-square')
                    ->action(function (Ticket $record) {
                        $name = 'ticket-' . $record->id . '.md';
                        $md = (string) $record->transcript_md;

                        if (trim($md) === '') {
                            $md = self::fallbackHeader($record) . "\n\n*(Transcript vide ou non encore enregistré)*\n";
                        } else {
                            $header = self::fallbackHeader($record) . "\n\n";
                            if (!Str::startsWith($md, '# Transcript')) {
                                $md = $header . $md;
                            }
                        }
                        return self::streamDownloadString($md, $name);
                    })
                    ->disabled(fn(Ticket $r) => empty($r->transcript_md)),
            ])
            ->bulkActions([
                // rien (lecture seule)
            ])
            ->defaultSort('id', 'desc');
    }

    protected static function fallbackHeader(Ticket $t): string
    {
        return "# Transcript — ticket #{$t->id}\n" .
            "Serveur: " . ($t->serverconfig->server_id ?? '—') . "\n" .
            "Salon: " . ($t->channel_id ?? '—') . "\n" .
            "Ouvert par: " . ($t->opener_tag ?: $t->opener_user_id ?: '—') . "\n" .
            "Statut: " . ($t->status ?? '—') . "\n" .
            "Période: " . ($t->created_at?->format('Y-m-d H:i:s') ?? '—') . " → " . ($t->closed_at?->format('Y-m-d H:i:s') ?? '—');
    }

    protected static function streamDownloadString(string $content, string $filename): StreamedResponse
    {
        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, $filename, ['Content-Type' => 'text/markdown; charset=UTF-8']);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'view'  => Pages\ViewTicket::route('/{record}'),
        ];
    }
}
