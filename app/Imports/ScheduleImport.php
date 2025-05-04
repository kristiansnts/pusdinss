<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Schedule;

class ScheduleImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $data = $collection->toArray();

        foreach ($data as $row) {
            $schedule = new Schedule();
            $schedule->date = $this->convertDate($row['haritanggal']);
            $schedule->class = $row['rombel'];
            $schedule->module = $row['materi_ajar'];
            $schedule->time = $row['jam'];
            $schedule->tentor = $row['pengajar'];
            $schedule->save();
        }
    }

    public function convertDate($date)
    {
        $dateWithoutDay = preg_replace('/^[^,]+,\s*/', '', $date);

        $indonesianMonths = [
            'Januari' => 'January',
            'Februari' => 'February',
            'Maret' => 'March',
            'April' => 'April',
            'Mei' => 'May',
            'Juni' => 'June',
            'Juli' => 'July',
            'Agustus' => 'August',
            'September' => 'September',
            'Oktober' => 'October',
            'November' => 'November',
            'Desember' => 'December'
        ];

        foreach ($indonesianMonths as $indo => $eng) {
            $dateWithoutDay = str_replace($indo, $eng, $dateWithoutDay);
        }

        return \Carbon\Carbon::parse($dateWithoutDay)
            ->format('Y-m-d H:i:s');
    }
}
