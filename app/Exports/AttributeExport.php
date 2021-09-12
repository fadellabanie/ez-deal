<?php

namespace App\Exports;

use App\Models\Attribute;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttributeExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    public function headings(): array
    {
        return [
            'Arabic Name',
            'English Name',
            'Arabic Description',
            'English Description',
            'Color',
            'Price',
            'Status',
            'Created At',
        ];
    }

    public function collection()
    {
        return Attribute::select(
                'ar_name',
                'en_name',
                'ar_description',
                'en_description',
                'color',
                'price',
                'is_active',
                'created_at'
            )->get();
    }


    public function map($attribute): array
    {
        return [

            $attribute->ar_name,
            $attribute->en_name,
            $attribute->ar_description,
            $attribute->en_description,
            $attribute->color,
            $attribute->price,
            (bool) $attribute->is_active,
            $attribute->created_at->toDateTimeString(),
        ];
    }
}
