<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Schemas\Schema;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User')
                    ->options(User::pluck('nama', 'user_id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('pembeli')
                    ->label('Nama Pembeli')
                    ->required()
                    ->maxLength(50),

                TextInput::make('penjualan_kode')
                    ->label('Kode Penjualan')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true),

                DateTimePicker::make('penjualan_tanggal')
                    ->label('Tanggal Penjualan')
                    ->required(),
            ]);
    }
}
