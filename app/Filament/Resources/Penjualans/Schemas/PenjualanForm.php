<?php

namespace App\Filament\Resources\Penjualans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PenjualanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Header Transaksi')
                            ->description('Bagian utama transaksi kasir.')
                            ->icon('heroicon-o-shopping-cart')
                            ->schema([
                                TextInput::make('penjualan_kode')
                                    ->label('Kode Penjualan')
                                    ->required()
                                    ->maxLength(20)
                                    ->unique(ignoreRecord: true),

                                DateTimePicker::make('penjualan_tanggal')
                                    ->label('Tanggal Penjualan')
                                    ->required(),

                                Select::make('user_id')
                                    ->label('Kasir')
                                    ->relationship('user', 'nama')
                                    ->required()
                                    ->preload(),
                            ])
                            ->columns(1),

                        Section::make('Data Pembeli')
                            ->description('Identitas pembeli dibuat terpisah agar header transaksi tetap enak dibaca.')
                            ->icon('heroicon-o-user-circle')
                            ->schema([
                                TextInput::make('pembeli')
                                    ->label('Nama Pembeli')
                                    ->required()
                                    ->maxLength(100),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
