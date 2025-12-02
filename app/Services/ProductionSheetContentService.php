<?php

namespace App\Services;

use App\Models\ProductionSheet;

class ProductionSheetContentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public ProductionSheet $sheet,
        public array $data
    ) {
    }

    public static function update(ProductionSheet $sheet, array $data)
    {
        return (new self($sheet, $data))->__update();
    }

    private function __update()
    {
        $this->updateBuildings();
        $this->updateItems();
        return $this->sheet;
    }

    private function updateBuildings()
    {
        $this->sheet->buildings()->delete();
        $this->sheet->buildings()->createMany($this->data['buildings']);
    }

    private function updateItems()
    {
        $this->sheet->items()->delete();
        $this->sheet->items()->createMany($this->data['items']);
    }
}
