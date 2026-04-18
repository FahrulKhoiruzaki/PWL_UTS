<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('supplier_kode')
                    ->label('Kode Supplier')
                    ->required()
                    ->maxLength(10)
                    ->unique(ignoreRecord: true),
                
                TextInput::make('supplier_nama')
                    ->label('Nama Supplier')
                    ->required()
                    ->maxLength(100),

                Textarea::make('supplier_alamat')
                ->label('Alamat Supplier')
                ->required()
                ->rows(4)
                ->maxLength(255)
                ->columnSpanFull(),
            ]);
    }
}
