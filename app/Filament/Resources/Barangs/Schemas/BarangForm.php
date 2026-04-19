<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\grid;
use Filament\Schemas\Components\Section;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Identitas Barang')
                            ->description('Bagian ini fokus ke master data dan pengelompokan barang.')
                            ->icon('heroicon-o-cube')
                            ->schema([
                                Select::make('kategori_id')
                                    ->label('Kategori')
                                    ->relationship('kategori', 'kategori_nama')
                                    ->required()
                                    ->preload()
                                    ->columnSpanFull(),

                                TextInput::make('barang_kode')
                                    ->label('Kode Barang')
                                    ->required()
                                    ->maxLength(15)
                                    ->unique(ignoreRecord: true),

                                TextInput::make('barang_nama')
                                    ->label('Nama Barang')
                                    ->required()
                                    ->maxLength(100),
                            ])
                            ->columns(2),

                        Section::make('Nilai Barang')
                            ->description('Harga dipisahkan agar lebih terasa seperti panel pengelolaan produk.')
                            ->icon('heroicon-o-banknotes')
                            ->schema([
                                TextInput::make('harga_beli')
                                    ->label('Harga Beli')
                                    ->numeric()
                                    ->required(),

                                TextInput::make('harga_jual')
                                    ->label('Harga Jual')
                                    ->numeric()
                                    ->required(),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
