<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Profil Pengguna')
                            ->description('Data identitas akun pengguna aplikasi.')
                            ->icon('heroicon-o-user')
                            ->schema([
                                TextInput::make('nama')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->maxLength(100),

                                TextInput::make('username')
                                    ->label('Username')
                                    ->required()
                                    ->maxLength(50)
                                    ->unique(ignoreRecord: true),
                            ])
                            ->columns(1),

                        Section::make('Akses & Keamanan')
                            ->description('Atur level akses dan kredensial login pengguna.')
                            ->icon('heroicon-o-key')
                            ->schema([
                                Select::make('level_id')
                                    ->label('Level')
                                    ->relationship('level', 'level_nama')
                                    ->required()
                                    ->preload(),

                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
