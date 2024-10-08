<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all(['id', 'name', 'email', 'role']); // Customize fields as necessary
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Role',
        ];
    }
}
