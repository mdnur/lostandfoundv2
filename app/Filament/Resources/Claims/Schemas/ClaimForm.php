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
                // TextInput::make('item_id')

                //     ->required()
                //     ->numeric(),

                Select::make('item_id')
                    ->relationship('item', 'id') // Specify 'name' as the display column
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('claimer_id')
                    ->relationship('claimer', 'id') // Specify 'name' as the display column
                    ->required()
                    ->searchable()
                    ->preload(),

                DatePicker::make('claim_date')->native(false)->required(),
                Select::make('status')
                    ->options(['Pending' => 'Pending', 'Approved' => 'Approved', 'Rejected' => 'Rejected'])
                    ->default('Pending')
                    ->required(),
            ]);
    }
}
