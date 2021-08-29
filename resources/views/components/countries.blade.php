<select class="form-select form-select-solid form-select-l" wire:model="country_id">
    <option value="all">{{__("Select country")}}</option>
    @foreach (countries() as $country)
    <option value="{{$country->id}}">{{$country->en_name}}</option>
    @endforeach
</select>
