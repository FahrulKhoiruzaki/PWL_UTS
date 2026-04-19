<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas Level')
                    ->description('Form level dibuat ringkas karena hanya menyimpan kode dan nama hak akses.')
                    ->icon('heroicon-o-shield-check')
                    ->schema([
                        TextInput::make('level_kode')
                            ->label('Kode Level')
                            ->required()
                            ->maxLength(10)
                            ->unique(ignoreRecord: true),

                        TextInput::make('level_nama')
                            ->label('Nama Level')
                            ->required()
                            ->maxLength(100),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
