<?php

namespace App\Filament\Resources\ScheduleResource\Pages;

use App\Filament\Resources\ScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Imports\ScheduleImport;

class ListSchedules extends ListRecords
{
    protected static string $resource = ScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->label('Import Jadwal')
                ->use(ScheduleImport::class)
                ->sampleExcel(
                    sampleData: [
                        ['date' => '2025-05-04', 'class' => 'SE1', 'module' => 'Matematika', 'time' => '10:00', 'tentor' => 'John Doe'],
                        ['date' => '2025-05-04', 'class' => 'SE2', 'module' => 'Matematika', 'time' => '10:00', 'tentor' => 'Jane Doe'],
                    ],
                    fileName: 'contoh_import_jadwal.xlsx',
                    sampleButtonLabel: 'Download Contoh',
                )
                ->hidden(fn () => !auth()->user()->hasRole('super_admin'))
                ->color("success"),
            Actions\CreateAction::make(),
        ];
    }
}
