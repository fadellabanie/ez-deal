<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AppUserExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Country Code',
            'Mobile',
            'Whatsapp',
            'Type',
            'Status',
            'Trading Certification',
            'City',
            'Package',
            'Subscribe',
            'Suspend',
            'Created At',
        ];
    }

    public function collection()
    {
        return User::with(['city','package'])
            ->select(
                'name',
                'email',
                'country_code',
                'mobile',
                'whatsapp_mobile',
                'type',
                'status',
                'trading_certification',
                'city_id',
                'package_id',
                'subscribe_to',
                'suspend',
                'created_at'
            )->get();
    }


    public function map($user): array
    {
        return [
           
            $user->name,
            $user->email,
            $user->country_code,
            $user->mobile,
            $user->whatsapp_mobile,
            $user->type,
            $user->status,
            $user->trading_certification,
            $user->city->en_name,
            $user->package->en_name,
            $user->subscribe_to,
            (bool) $user->suspend,
            $user->created_at->toDateTimeString(),
        ];
    }
}
