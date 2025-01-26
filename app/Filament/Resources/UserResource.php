<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Region;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $regionID= $user->region_id;
        if($user->role==="manager"){
            return parent::getEloquentQuery()->where('region_id',  $regionID)->where('role',operator: 'employee')->orWhere('id',$user->id);
        }
        elseif($user->role==='employee'){
            return parent::getEloquentQuery()->where('id',$user->id);
        }
        else{
            return parent::getEloquentQuery();
        }
        }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')->required()->email(),
                Forms\Components\TextInput::make('password')->required()->password(),
                Forms\Components\Select::make('role')->options(['manager'=>'Manager','employee'=>'Employee'])->required(),
                Forms\Components\Select::make('region')->options(Region::all()->pluck('name','id'))->required(),
                Forms\Components\Toggle::make('is_active'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\ToggleColumn::make('is_active')
                ->visible( auth()->user()->role=="superadmin"),


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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
