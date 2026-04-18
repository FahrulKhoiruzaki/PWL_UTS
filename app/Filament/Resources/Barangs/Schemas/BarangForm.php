<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Schemas\Schema;
use App\Models\Kategori;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(Kategori::pluck('kategori_nama', 'kategori_id'))
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('barang_kode')
                    ->label('Kode Barang')
                    ->required()
                    ->maxLength(10)
                    ->unique(ignoreRecord: true),

                TextInput::make('barang_nama')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(100),

                TextInput::make('harga_beli')
                    ->label('Harga Beli')
                    ->numeric()
                    ->required()
                    ->minValue(0),

                TextInput::make('harga_jual')
                    ->label('Harga Jual')
                    ->numeric()
                    ->required()
                    ->minValue(0),
            ]);
    }
}
