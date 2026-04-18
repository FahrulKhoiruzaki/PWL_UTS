<?php

namespace App\Filament\Resources\Barangs\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BarangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori.kategori_nama')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('barang_kode')
                    ->label('Kode Barang')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('barang_nama')
                    ->label('Nama Barang')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('harga_beli')
                    ->label('Harga Beli')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('harga_jual')
                    ->label('Harga Jual')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                    DeleteBulkAction::make(),
            ]);
    }
}
