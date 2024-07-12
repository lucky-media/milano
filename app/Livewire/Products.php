<?php

namespace App\Livewire;

use Statamic\Facades\Entry;
use Livewire\Component;
use Jonassiewertsen\Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public array $categories = [];
    public array $colors = [];
    public string $search = '';
    public string $sort = 'price:asc';
    public array $filterNames = [];

    public $per_page = 9;

    public $orderBy = [
        'key' => 'date',
        'direction' => 'desc'
    ];

    protected $queryString = [
        'search',
        'sort',
        'categories' => [
            'except' => [],
        ],
        'colors' => [
            'except' => [],
        ],
        'page' => [
            'except' => 1,
        ],
    ];

    public function mount(): void
    {
        $this->transformFilters();
    }

    public function updatingPaginators(): void
    {
        $this->dispatch('scroll-top');
    }

    protected function transformFilters(): void
    {
        if (empty($this->categories) && empty($this->colors)) {
            $this->filterNames = [];
            return;
        }

        $this->filterNames = [
            ...$this->getNames($this->categories),
            ...$this->getNames($this->colors)
        ];
    }

    protected function getNames($items): array
    {
        return collect($items)->map(fn ($item) => explode("::", $item)[1])->toArray();
    }

    public function clearFilters(): void
    {
        $this->categories = [];
        $this->colors = [];
        $this->resetPage();
    }

    protected function entries()
    {
        $pieces = explode(":", $this->sort);

        $this->orderBy = [
            'key' => $pieces[0],
            'direction' => $pieces[1],
        ];

        $entries = Entry::query()
            ->where('collection', 'products')
            ->where('status', 'published');

        $entries->when($this->categories, fn ($query) => $query->whereTaxonomyIn($this->categories))
            ->when($this->colors, fn ($query) => $query->whereTaxonomyIn($this->colors));

        $entries->when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        });

        if ($this->orderBy['key'] == 'default') {
            $entries->orderBy('date', 'desc');
        } elseif ($this->orderBy['key'] == 'order') {
            $entries->orderBy('order');
        } else {
            $entries->orderBy($this->orderBy['key'], $this->orderBy['direction']);
        }

        $entries = $entries->paginate((int) $this->per_page);

        return $this->withPagination('entries', $entries);
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function updated()
    {
        $this->transformFilters();
    }

    public function render()
    {
        return view('livewire.products', $this->entries());
    }
}
