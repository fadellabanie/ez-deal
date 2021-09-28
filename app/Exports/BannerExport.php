<?php

namespace App\Exports;

use App\Models\AppBanner;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BannerExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    public function headings(): array
    {
        return [
            'Type',
            'User',
            'Make By',
            'Arabic Name',
            'English Name',
            'Arabic Description',
            'English Description',
            'City',
            'Start Date',
            'End Date',
            'Active',
            'Created At',
        ];
    }

    public function collection()
    {
        return AppBanner::with(['user', 'city'])
            ->select(
                'type',
                'user_id',
                'make_by',
                'en_name',
                'ar_name',
                'ar_description',
                'en_description',
                'city_id',
                'start_date',
                'end_date',
                'status',
                'created_at'
            )->get();
    }


    public function map($appBanner): array
    {
        return [
            $appBanner->type,
            $appBanner->user->name,
            $appBanner->make_by,
            $appBanner->en_name,
            $appBanner->ar_name,
            $appBanner->ar_description,
            $appBanner->en_description,
            $appBanner->city->en_name,
            $appBanner->start_date,
            $appBanner->end_date,
            (bool) $appBanner->status,
            $appBanner->created_at->toDateTimeString(),
        ];
    }
}
