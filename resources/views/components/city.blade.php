<select class="form-select form-select-solid form-select-l" wire:model="city_id">
    <option value="all">{{__("Select city")}}</option>
    @foreach (cities() as $city)
    <option value="{{$city->id}}">{{$city->en_name}}</option>
    @endforeach
</select>
