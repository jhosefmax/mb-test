<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;

class ProductsView extends Component
{
    use WithPagination;

    
    

    public function redirectToEdit($id)
    {
        return Redirect::route('products.createUpdate', ['id' => $id]);
    }

    public function newProduct()
    {
        return Redirect::route('products.createUpdate', ['id' => 'new']);
    }

    

    

    public function destroy($id)
    {
        Product::destroy($id);
    }

    public $search;
    public $searchField = 'name';
    
    
    public function render()
    {
        $query = Product::query();

        if (!empty($this->search)) {

            if (preg_match('/^\d{4}-\d{2}-\d{2} to \d{4}-\d{2}-\d{2}$/', $this->search)) {
                
                list($startDate, $endDate) = explode(' to ', $this->search);
    
                // Verifique se a data final é maior que a inicial
                if ($endDate < $startDate) {
                    // Se a data final for menor que a inicial, retorne uma coleção vazia
                    $products = collect();
                } else {
                    
                    // Execute a consulta entre as duas datas
                    $query->whereBetween('validTo', [$startDate, $endDate]);
                }
                
            } else {
                // Se o formato não corresponder, pesquise no campo fornecido
                $query->where($this->searchField, 'like', '%' . $this->search . '%');
            }


            //$query->where($this->searchField, 'like', '%' . $this->search . '%');
        }

        
        $products = $query->latest()->paginate(10);
        
        return view('livewire.products-view', compact('products'));
    }
    
    public function updatedSearch()
    {
        $this->render();
    }

    
}
