<?php

namespace App\Filament\Resources\Suppliers\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SuppliersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('supplier_kode')
                    ->label('Kode Supplier')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('supplier_nama')
                    ->label('Nama Supplier')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('supplier_alamat')
                    ->label('Alamat Supplier')
                    ->limit(40)
                    ->wrap(),

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
