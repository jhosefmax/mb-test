<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Carbon\Carbon;

class PriceValidityRelationChart extends Component
{
    public $chartData;

    public function mount()
    {
        $this->chartData = $this->prepareChartData();
    }

    public function render()
    {
        return view('livewire.price-validity-relation-chart');
    }

    private function prepareChartData()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $chartData = [];

        for ($i = 0; $i < 12; $i++) {
            $month = $startOfMonth->format('M Y');
            $count = Product::whereBetween('validTo', [$startOfMonth, $endOfMonth])->count();

            $chartData[] = [
                'month' => $month,
                'count' => $count
            ];

            
            $startOfMonth->addMonth();
            $endOfMonth->addMonth();
        }

        return $chartData;
    }
}
