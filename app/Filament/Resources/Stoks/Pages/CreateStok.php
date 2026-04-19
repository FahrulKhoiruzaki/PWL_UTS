<?php

namespace App\Filament\Resources\Stoks\Pages;

use App\Filament\Resources\Stoks\StokResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStok extends CreateRecord
{
    protected static string $resource = StokResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}