<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallResource\Pages;
use App\Filament\Resources\CallResource\RelationManagers;
use App\Models\Call;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CallResource extends Resource
{
    protected static ?string $model = Call::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('employee_id')
                    ->required()
                    ->default(state: auth()->user()->id)
                    ,
                    // ->visible(auth()->user()->role=='superadmin'),

                Forms\Components\TimePicker::make('time')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\Select::make('customer_id')->label('Customer')
                ->options(function () {
                    return \App\Models\Customer::all()->pluck('name', 'id');
                })
                    ->required()
                    ,
                Forms\Components\Toggle::make('is_joint')
                    ->required()
                    ->live(),
                    Forms\Components\Select::make('joint_id')
                    ->options(function () {
                        return \App\Models\User::all()->pluck('name', 'id');
                    })
                    ->hidden(fn (Forms\Get $get): bool => ! $get('is_joint'))
                    ->nullable(),
                Forms\Components\Textarea::make('remarks')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                    Forms\Components\Select::make('products')
                    ->multiple()
                    ->relationship('products','name')
                    ->options(Product::all()->pluck('name', 'id'))
                    // ->searchable(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.name')->label('Employee')
                    ,
                // Tables\Columns\TextColumn::make('jointwith.name')->label('joint with')
                //                     ,
                Tables\Columns\TextColumn::make('time'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer.name')
                    // ->numeric()
                    // ->sortable()
                    ,
                Tables\Columns\IconColumn::make('is_joint')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCalls::route('/'),
            'create' => Pages\CreateCall::route('/create'),
            'edit' => Pages\EditCall::route('/{record}/edit'),
        ];
    }
}
