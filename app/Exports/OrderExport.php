<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    public function headings(): array
    {
        return [
            'User',
            'Realestate Type',
            'Contract Type',
            'View',
            'City',
            'Country',
            'Neighborhood',
            'Price',
            'Space',
            'Number Building',
            'Age Building',
            'Street Width',
            'Street Number',
            'Elevator',
            'Parking',
            'Ac',
            'Furniture',
            'Name',
            'Note',
            'Is Active',
            'Number Of Views',
            'Address',
            'Review By',
            'Review At',
            'Created At',
        ];
    }

    public function collection()
    {
        return Order::with(['owner', 'city', 'country', 'contractType', 'realestateType', 'view'])
            ->select(
                'user_id',
                'realestate_type_id',
                'contract_type_id',
                'view_id',
                'city_id',
                'country_id',
                'neighborhood',
                'price',
                'space',
                'number_building',
                'age_building',
                'street_width',
                'street_number',
                'elevator',
                'parking',
                'ac',
                'furniture',
                'name',
                'note',
                'is_active',
                'number_of_views',
                'address',
                'review_by',
                'review_at',
                'created_at'
            )->get();
    }


    public function map($order): array
    {
        return [
            $order->owner->name,
            $order->make_by,
            $order->realestateType->en_name,
            $order->contractTypes->en_name,
            $order->view->en_name,
            $order->city->en_name,
            $order->country->en_name,
            $order->neighborhood,
            $order->price,
            $order->space,
            $order->number_building,
            $order->age_building,
            $order->street_width,
            $order->street_number,
            (bool)$order->elevator,
            (bool)$order->parking,
            (bool)$order->ac,
            (bool)$order->furniture,
            $order->note,
            $order->number_of_views,
            $order->address,
            $order->review_by,
            $order->review_at,
            (bool) $order->status,
            (bool) $order->is_active,
            $order->created_at->toDateTimeString(),
        ];
    }
}
