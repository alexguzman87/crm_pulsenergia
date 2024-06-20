<?php

namespace App\Exports;

use App\Models\Contact;
use App\Models\Lead;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
 
class LeadsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return View('excelExport.leads',['contact'=>Contact::all()]);
    }
}
