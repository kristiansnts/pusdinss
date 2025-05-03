<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $data = $collection->toArray();

        foreach ($data as $row) {
            $user = new User();
            $user->userId = $row['user'];
            $user->username = $row['nama'];
            $user->password = $row['password'];
            $user->program = $row['program'];
            $user->class = $row['kelas'];
            $user->save();

            $user->assignRole('siswa');
        }
    }
}
