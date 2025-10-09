<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Components as C;

class ViewTicket extends ViewRecord
{
    protected static string $resource = TicketResource::class;
    protected static ?string $title = 'Détails du ticket';

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getInfolists(): array
    {
        return [
            'default' => Infolists\Infolist::make()
                ->schema([
                    C\Section::make('Métadonnées')->schema([
                        C\TextEntry::make('id')->label('#'),
                        C\TextEntry::make('serverconfig.server_id')->label('Serveur'),
                        C\TextEntry::make('channel_id')->label('Channel ID'),
                        C\TextEntry::make('opener_tag')->label('Ouvert par')
                            ->default(fn($r) => $r->opener_tag ?: $r->opener_user_id),
                        C\TextEntry::make('status')->badge()
                            ->color(fn($state) => $state === 'closed' ? 'success' : 'warning'),
                        C\TextEntry::make('created_at')->dateTime('Y-m-d H:i:s')->label('Créé le'),
                        C\TextEntry::make('closed_at')->dateTime('Y-m-d H:i:s')->label('Fermé le'),
                    ])->columns(2),

                    C\Section::make('Motif')->schema([
                        C\TextEntry::make('reason')->markdown()->prose()->hiddenLabel(),
                    ]),

                    C\Section::make('Transcript Markdown')->schema([
                        C\TextEntry::make('transcript_md')
                            ->hiddenLabel()
                            ->markdown()
                            ->prose()
                            ->placeholder('Transcript vide ou non encore enregistré.')
                            ->columnSpanFull(),
                    ]),
                ])->columns(2),
        ];
    }
}
