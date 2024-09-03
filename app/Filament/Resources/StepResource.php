<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Step;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StepResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StepResource\RelationManagers;
use App\Helpers\FilamentNotificationMessages;
use Filament\Tables\Columns\TextColumn;

class StepResource extends Resource
{
    protected static ?string $model = Step::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = "Etapes analytiques";
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $label = "Liste des Etapes analytiques";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("")->schema([

                    TextInput::make("name")
                        ->label("Nom de l'étape analytique")
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, $state) {
                            $set("slug", Str::slug($state));
                        })
                        ->required()
                        ,

                    TextInput::make('slug')->label("Slug de l'étape analytique")->required(),

                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->label("Nom de l'étape analytique"),
                TextColumn::make("slug")->label("Slug l'étape analytique"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("")->successNotificationTitle(FilamentNotificationMessages::successEditNotification()) ,
                Tables\Actions\DeleteAction::make()->label("")->successNotificationTitle(FilamentNotificationMessages::successDeleteNotification()),
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
            'index' => Pages\ListSteps::route('/'),
            //'create' => Pages\CreateStep::route('/create'),
           // 'edit' => Pages\EditStep::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

}
