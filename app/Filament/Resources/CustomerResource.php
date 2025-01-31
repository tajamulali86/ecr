<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Area;
use App\Models\Customer;
use App\Models\Region;
use App\Models\Speciality;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();
        $regionID= $user->region_id;
        if($user->role!=="superadmin"){
            return parent::getEloquentQuery()->where('region_id',  $regionID);
        }
        else{
            return parent::getEloquentQuery();
        }
        }
        // return parent::getEloquentQuery()->where('scholarship_id',  $latestScholarshipId)->whereHas('region', function ($query) use ($regionID) {
        //     $query->where('region_id', $regionID);
        // });

    public static function form(Form $form): Form
    {
        // dd(!auth()->user()->role == 'employee');
        // dd(auth()->user());
        return $form
        ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')->options(['doctor'=>'Doctor','distributor'=>'Distributor','chemist'=>'Chemist'])->required() ->live(),
                Forms\Components\Select::make('specialty_id')->label('Speciality')->options(Speciality::all()->pluck('name','id'))->visible(fn (Forms\Get $get) => $get('type') === 'doctor')->nullable(),
                Forms\Components\Toggle::make('is_approved')
                // ->hidden(! auth()->user()->role=='superadmin'),
               , Forms\Components\Select::make('area_id')->label('Area')->options(Area::where('region_id',auth()->user()->region_id)->pluck('name','id'))
                                // Set the current user's ID by default
            ,
                Forms\Components\Hidden::make('user_id')
                ->default(auth()->id()) // Set the current user's ID by default

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        // ->query(function (Builder $query) {

        //     return $query;
        // })



            ->columns([
                Tables\Columns\TextColumn::make('name')
                //
                // ->numeric()
                ->searchable(),
            Tables\Columns\TextColumn::make('area.name')
                ->sortable(),
            Tables\Columns\TextColumn::make('type'),
            Tables\Columns\BooleanColumn::make('is_approved')->label('Approval status')
            // ->visible(auth()->user()->role=="employee"),
            ,
            // Tables\Columns\ToggleColumn::make('is_approved')->visible(auth()->user()->role=="superadmin"),
            ])
            ->filters([
                //
                Tables\Filters\Filter::make('is_approved')
    ->query(fn (Builder $query): Builder => $query->where('is_approved', true))
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
