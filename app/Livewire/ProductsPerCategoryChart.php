<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsPerCategoryChart extends Component
{
    public $chartData;

    public function render()
    {
        $this->chartData = $this->prepareChartData();
        return view('livewire.products-per-category-chart');
    }


    private function prepareChartData()
    {
        $chartData = [];
        $chartData = Product::select('category')
        ->get()
        ->groupBy('category')
        ->map(function ($group) {
            return [
                'category' => $group->first()->category,
                'total' => count($group)
            ];
        })
        ->values()
        ->toArray();

        return $chartData;
    }
}
