<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiPrintController extends Controller
{
    public function print(Transaksi $transaksi)
    {
        $pdf = Pdf::loadView('transaksi.print', compact('transaksi'));
        return $pdf->download('struk-' . $transaksi->kode . '.pdf');
    }
}
