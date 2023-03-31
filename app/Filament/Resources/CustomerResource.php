<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->ColumnSpan('full')->required(),
                Forms\Components\Textarea::make('alamat')->ColumnSpan('full')->required(),
                Forms\Components\DatePicker::make('tanggal_lahir')->required(),
                Forms\Components\Radio::make('jenis_kelamin')->required()->options(['L'=>'Laki-Laki','P'=>'Perempuan']),
                Forms\Components\TextInput::make('telpon')->numeric()->required(),
                Forms\Components\Toggle::make('status')->required()->onColor('success')->offColor('danger'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->ColumnSpan('full'),
                Tables\Columns\TextColumn::make('alamat')->ColumnSpan('full'),
                Tables\Columns\TextColumn::make('tanggal_lahir'),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('telpon'),
                Tables\Columns\BadgeColumn::make('status')->enum([0=>"tidak aktif", 1=>"aktif"])
                ->colors([
                'danger' => static fn ($stat):bool => $stat == 0, 
                'success' => static fn ($stat):bool=> $stat == 1]),
   
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCustomers::route('/'),
        ];
    }    
}