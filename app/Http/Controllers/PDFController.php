<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Buku;

class PDFController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        // retreive all records from db
      $data = Buku::all();

      // share data to view
      view()->share('buku',$data);
      $pdf = PDF::loadView('dataBukuTokoBuku', $data);
      return $pdf->stream('whateveryourviewname.pdf');
        //  $pdf->download('databukutokobuku18090004.pdf');
    }
}
