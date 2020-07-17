<?php

namespace App\Http\Livewire;

use Plugin\Helper;
use Livewire\Component;
use Modules\Item\Dao\Models\Size;
use Modules\Item\Dao\Models\Color;
use Modules\Item\Dao\Models\Product;
use Modules\Item\Dao\Repositories\SizeRepository;
use Modules\Item\Dao\Repositories\ColorRepository;
use Modules\Item\Dao\Repositories\ProductRepository;

class AddDetail extends Component
{
    public function render()
    {
        $product = Helper::createOption((new ProductRepository()), false, true);
        $color = Helper::createOption((new ColorRepository()));
        $size = Helper::createOption((new SizeRepository()), false);
        
        $data = [
            'product' => $product,
            'size' => $size,
            'color' => $color,
        ];
        return view('livewire.add-detail', $data);
    }
}
