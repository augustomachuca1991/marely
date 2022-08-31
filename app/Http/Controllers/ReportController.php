<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{


    public function download($id)
    {
        $sale = Sale::findOrFail($id);
        $nameFile = 'Venta_' . $sale->created_at->format('d-m-Y') . '.pdf';
        $data = [
            'sale' => $sale,
        ];
        $pdf = \PDF::loadView('admin.reports-pdf', $data);
        return $pdf->stream($nameFile);
    }
}
