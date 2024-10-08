<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Sale::with('user', 'product')->get(); // Eager load relationships
    }

    public function map($sale): array
    {
        return [
            $sale->user->name,            // User name
            $sale->product->name,         // Product name
            $sale->quantity,              // Quantity sold
            $sale->customer_name,         // Customer's name
            $sale->customer_email,        // Customer's email
            $sale->customer_phone,        // Customer's phone
            $sale->created_at->format('Y-m-d H:i:s'), // Sale timestamp
        ];
    }

    public function headings(): array
    {
        return [
            'Sold By (User)',
            'Product Name',
            'Quantity Sold',
            'Customer Name',
            'Customer Email',
            'Customer Phone',
            'Date of Sale',
        ];
    }
}
