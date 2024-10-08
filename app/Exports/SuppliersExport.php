<?php


namespace App\Exports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SuppliersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Fetch suppliers with their related products
        return Supplier::with('products')->get();
    }

    /**
     * Map each row for export.
     */
    public function map($supplier): array
    {
        $mappedData = [];
        
        // Map each product with its supplier details
        foreach ($supplier->products as $product) {
            // Return one array per product, flattening the structure
            $mappedData[] = [
                'supplier_id'   => $supplier->id,
                'product_name'  => $product->name,
                'quantity'      => $product->quantity,
                'supplier_name' => $supplier->name,
            ];
        }

        // Since you're using `WithMapping`, you should return a flat array.
        return count($mappedData) > 0 ? $mappedData[0] : [];
    }

    /**
     * Set the headers for the columns.
     */
    public function headings(): array
    {
        return [
            'Supplier ID',
            'Product Name',
            'Quantity',
            'Supplier Name',
        ];
    }
}
