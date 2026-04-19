<?php

namespace App\Filament\Resources\PenjualanDetails\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;


class PenjualanDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Item Transaksi')
                    ->description('Form detail dibuat padat agar cocok untuk input item penjualan.')
                    ->icon('heroicon-o-queue-list')
                    ->schema([
                        Select::make('penjualan_id')
                            ->label('Kode Penjualan')
                            ->relationship('penjualan', 'penjualan_kode')
                            ->required()
                            ->preload(),

                        Select::make('barang_id')
                            ->label('Barang')
                            ->relationship('barang', 'barang_nama')
                            ->required()
                            ->preload(),

                        TextInput::make('harga')
                            ->label('Harga')
                            ->numeric()
                            ->required(),

                        TextInput::make('jumlah')
                            ->label('Jumlah')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
