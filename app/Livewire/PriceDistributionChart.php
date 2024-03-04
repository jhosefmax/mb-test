<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class PriceDistributionChart extends Component
{
    public $chartData;

    public function render()
    {
        $this->chartData = $this->prepareChartData();
        return view('livewire.price-distribution-chart');
    }

    private function prepareChartData()
    {
        $priceRanges = [
            '$ 0-100' => [0, 100],
            '$ 100-500' => [100, 500],
            '$ 500-1000' => [500, 1000],
            '$ 1000+' => [1000, PHP_INT_MAX]
        ];

        $chartData = [];

        foreach ($priceRanges as $range => $limits) {
            $count = Product::whereBetween('price', $limits)->count();

            $chartData[] = [
                'range' => $range,
                'count' => $count
            ];
        }

        return $chartData;
    }
}
