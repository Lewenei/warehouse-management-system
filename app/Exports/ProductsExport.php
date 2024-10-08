<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::all(['id', 'name', 'quantity', 'price', 'description']); // Customize fields as needed
    }

    public function headings(): array
    {
        return [
            'Stock ID',
            'Product Name',
            'Quantity',
            'Unit Price',
            'Description',
        ];
    }
}
