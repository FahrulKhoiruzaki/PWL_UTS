<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil Supplier')
                    ->description('Data supplier dibuat lebih informatif karena berkaitan dengan kontak dan alamat.')
                    ->icon('heroicon-o-building-storefront')
                    ->schema([
                        TextInput::make('supplier_kode')
                            ->label('Kode Supplier')
                            ->required()
                            ->maxLength(10)
                            ->unique(ignoreRecord: true),

                        TextInput::make('supplier_nama')
                            ->label('Nama Supplier')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('supplier_telp')
                            ->label('Telepon')
                            ->maxLength(20),

                        Textarea::make('supplier_alamat')
                            ->label('Alamat')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
