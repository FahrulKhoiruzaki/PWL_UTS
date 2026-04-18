<?php

namespace App\Filament\Resources\Stoks\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StoksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('supplier.supplier_nama')
                    ->label('Supplier')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('barang.barang_nama')
                    ->label('Barang')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.nama')
                    ->label('User')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('stok_tanggal')
                    ->label('Tanggal Stok')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),

                TextColumn::make('stok_jumlah')
                    ->label('Jumlah')
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
