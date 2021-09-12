<?php

namespace App\Exports;

use App\Models\Package;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class PackageExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
        return Package::select(
                'ar_name',
                'en_name',
                'ar_description',
                'en_description',
                'color',
                'price',
                'status',
                'created_at'
            )->get();
    }


    public function map($package): array
    {
        return [

            $package->ar_name,
            $package->en_name,
            $package->ar_description,
            $package->en_description,
            $package->color,
            $package->price,
            (bool) $package->status,
            $package->created_at->toDateTimeString(),
        ];
    }
}
