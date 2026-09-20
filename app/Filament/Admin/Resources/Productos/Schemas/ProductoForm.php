<?php

namespace App\Filament\Admin\Resources\Productos\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('titulo')
                    ->label('Título del Video')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\Select::make('plataforma')
                    ->options([
                        'youtube' => 'YouTube',
                        'tiktok' => 'TikTok',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('url')
                    ->label('Enlace del Video')
                    ->url()
                    ->required(),
            ]);
    }
}