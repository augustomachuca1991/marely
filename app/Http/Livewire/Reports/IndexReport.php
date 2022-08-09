<?php

namespace App\Http\Livewire\Reports;

use App\Models\Sale;
use Livewire\Component;
use PDF;

class IndexReport extends Component
{
    


    public $search = "";
    public $perUser = "";
    public $from = "";
    public $to = "";
    public $perPage = 10;


    protected $listeners = ['render'];

    public function render()
    {
        $sales = Sale::searchSale($this->search)
        ->searchUser($this->perUser)
        ->fromTo($this->from, $this->to)
        ->paginate($this->perPage);
        return view('livewire.reports.index-report', [
            'sales' => $sales
        ]);
    }


    public function filterDate()
    {
        $this->validate([
            'from' => 'required|required_with:to|date|lte:to',
            'to' => 'required_with:from|date|gte:from'
        ]);
        dd('ok');
        // $this->emitSelf('render');

    }


    public function download()
    {

        
        // $data = [
        //     'titulo' => 'Marely.net'
        // ];

        // $pdf = PDF::loadView('admin.reports-pdf', $data);

        // dd($pdf);

        // return $pdf->stream('archivo.pdf');

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }
}
