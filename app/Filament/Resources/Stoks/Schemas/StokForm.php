<?php

namespace App\Filament\Resources\Stoks\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StokForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Sumber Stok')
                            ->description('Tentukan asal barang, item yang masuk, dan petugas pencatat.')
                            ->icon('heroicon-o-truck')
                            ->schema([
                                Select::make('supplier_id')
                                    ->label('Supplier')
                                    ->relationship('supplier', 'supplier_nama')
                                    ->required()
                                    ->preload(),

                                Select::make('barang_id')
                                    ->label('Barang')
                                    ->relationship('barang', 'barang_nama')
                                    ->required()
                                    ->preload(),

                                Select::make('user_id')
                                    ->label('Petugas')
                                    ->relationship('user', 'nama')
                                    ->required()
                                    ->preload(),
                            ])
                            ->columns(1),

                        Section::make('Mutasi Stok')
                            ->description('Simpan waktu transaksi dan jumlah stok yang masuk.')
                            ->icon('heroicon-o-archive-box-arrow-down')
                            ->schema([
                                DateTimePicker::make('stok_tanggal')
                                    ->label('Tanggal Stok')
                                    ->required(),

                                TextInput::make('stok_jumlah')
                                    ->label('Jumlah Stok')
                                    ->numeric()
                                    ->required(),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
