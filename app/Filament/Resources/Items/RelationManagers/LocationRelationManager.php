<?php

namespace App\Filament\Resources\Items\RelationManagers;

use App\Filament\Resources\Items\ItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class LocationRelationManager extends RelationManager
{
    protected static string $relationship = 'location';

    protected static ?string $relatedResource = ItemResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
