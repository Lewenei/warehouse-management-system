<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Sale;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\ProductsExport;
use App\Exports\SuppliersExport;
use App\Exports\SalesExport;

class ReportsController extends Controller
{
    // Export Users
    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users_report.xlsx');
    }

    // Export Products
    public function exportProducts()
    {
        return Excel::download(new ProductsExport, 'products_report.xlsx');
    }

    // Export Suppliers
    public function exportSuppliers()
    {
        return Excel::download(new SuppliersExport, 'suppliers_report.xlsx');
    }

    // Export Sales
    public function exportSales()
    {
        return Excel::download(new SalesExport, 'sales_report.xlsx');
    }
}
