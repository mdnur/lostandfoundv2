<?php

namespace App\Filament\Resources\Claims\RelationManagers;

use App\Filament\Resources\Claims\ClaimResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ItemRelationManager extends RelationManager
{
    protected static string $relationship = 'item';

    protected static ?string $relatedResource = ClaimResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
