<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class ProductCreateUpdate extends Component
{
    use WithPagination;

    public function mount()
    {
        $routeId = Route::current()->parameter('id');
        if($routeId != 'new')
        {   
            $this->selectedId = $routeId;
            $this->edit($this->selectedId);
        }
    }
    
    public function render()
    {
        return view('livewire.product-create-update');
    }

    public $id;
    public $name;
    public $description;
    public $price;
    public $location;
    public $validTo;
    public $category;

    public $selectedId;

    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'validTo' => 'required',
        'category' => 'required',
    ];

    public function storeProduct()
    {
        $this->validate();

        if($this->selectedId)
        {
            $this->update();
        }
        else
        {
            $product = Product::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'location' => $this->location,
                'validTo' => $this->validTo,
                'category' => $this->category
            ]);
            $this->reset();
            Redirect::route('products.view');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->id = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->location = $product->location;
        $this->validTo = $product->validTo;
        $this->category = $product->category;
    }

    public function update()
    {
        $product = Product::updateOrCreate(
            [
                'id'   => $this->id,
            ],
            [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'location' => $this->location,
                'validTo' => $this->validTo,
                'category' => $this->category
            ],

        );

        $this->reset();
    }
}
