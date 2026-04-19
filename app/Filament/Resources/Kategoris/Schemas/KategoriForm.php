<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Kategori')
                    ->description('Kategori sengaja dibuat compact agar input master data terasa cepat.')
                    ->icon('heroicon-o-tag')
                    ->schema([
                        TextInput::make('kategori_kode')
                            ->label('Kode Kategori')
                            ->required()
                            ->maxLength(10)
                            ->unique(ignoreRecord: true),

                        TextInput::make('kategori_nama')
                            ->label('Nama Kategori')
                            ->required()
                            ->maxLength(100),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
