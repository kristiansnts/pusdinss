<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Imports\UserImport;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->label('Import Users')
                ->use(UserImport::class)
                ->sampleExcel(
                    sampleData: [
                        ['user' => '123456789', 'nama' => 'John Doe', 'password' => '123456789', 'program' => 'Me In STAN SE', 'kelas' => 'SE1'],
                        ['user' => '123456789', 'nama' => 'Jane Doe', 'password' => '123456789', 'program' => 'Me In STAN SE', 'kelas' => 'SE2'],
                    ],
                    fileName: 'contoh_import_user.xlsx',
                    sampleButtonLabel: 'Download Contoh',
                )
                ->color("success"),
            Actions\CreateAction::make(),
        ];
    }
}
