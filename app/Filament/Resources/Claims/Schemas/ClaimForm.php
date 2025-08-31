<?php

namespace App\Filament\Resources\Claims\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClaimForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('item_id')
                    ->required()
                    ->numeric(),
                TextInput::make('claimer_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('claim_date'),
                Select::make('status')
                    ->options(['Pending' => 'Pending', 'Approved' => 'Approved', 'Rejected' => 'Rejected'])
                    ->default('Pending')
                    ->required(),
            ]);
    }
}
