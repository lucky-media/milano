<?php

namespace App\Livewire;

use Livewire\Component;
use Statamic\Facades\Entry;
use Statamic\Facades\Search;

class ProductSearch extends Component
{
    public $search = '';
    public $isMobile = false;

    protected $queryString = [
        'search',
    ];

    public function render()
    {
        $entries = Entry::query()
            ->where('collection', 'products')
            ->where('status', 'published')
            ->orderBy('date')
            ->limit(4)
            ->get();

        if (!$entries->isEmpty() && !empty($this->search)) {
            $entries = Search::index('products')->ensureExists()->search($this->search)->where('status', 'published');
        }

        return view('livewire.partials.search', [
            'products' => $entries,
        ]);
    }
}
