<div>
    <x-alert class="alert-success"></x-alert>

    <div class="container">

        <div class="row">
            <div class="col-2">
                <div class="list-group" id="list-tab" role="tablist">

                    <x-list-group name="categories" count={{$categories}}>{{__("Categories")}}</x-list-group>

                    <x-list-group name="products" count={{$products}}>{{__("Products")}}</x-list-group>
                   {{--  <x-list-group name="modifiers" count={{$modifiers}}>{{__("Modifiers")}}</x-list-group>  --}}
                    <x-list-group name="sizes" count={{$sizes}}>{{__("Sizes")}}</x-list-group>

                    <x-list-group name="combos" count={{$combos}}>{{__("Combos")}}</x-list-group>
                    <x-list-group name="coupons" count={{$coupons}}>{{__("Coupons")}}</x-list-group>
                    <x-list-group name="loyal-points" count={{$loyalPoints}}>{{__("Loyal Points")}}</x-list-group>
                    <x-list-group name="discounts" count={{$discounts}}>{{__("Discounts")}}</x-list-group>
                    <x-list-group name="timed-events" count={{$timedEvents}}>{{__("Timed Events")}}</x-list-group>

                    <x-list-group name="work-shifts" count={{$workShifts}}>{{__("Work Shifts")}}</x-list-group>
                    <x-list-group name="delay-policies" count={{$delayPolicies}}>{{__("Delay Policies")}}</x-list-group>
                    <x-list-group name="payment-methods" count={{$paymentMethods}}>{{__("Payment Methods")}}</x-list-group>
                    <x-list-group name="tags" count={{$tags}}>{{__("Tags")}}</x-list-group>

                    <x-list-group name="suppliers" count={{$suppliers}}>{{__("Suppliers")}}</x-list-group>
                    <x-list-group name="inventory-items" count={{$inventoryItems}}>{{__("Inventory Items")}}</x-list-group>
                    {{--<x-list-group name="inventory-transactions" count={{$inventoryTransactions}}>{{__("Inventory Transactions")}}</x-list-group>--}}

                </div>
            </div>
            <div class="col-10">
                <div class="tab-content" id="nav-tabContent">

                    <x-list-tab name="categories">
                        <livewire:dashboard.categories.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="products">
                        <livewire:dashboard.products.datatable :onlyTrashed="true" />
                    </x-list-tab>
                   {{--  <x-list-tab name="modifiers">
                        <livewire:dashboard.modifiers.datatable :onlyTrashed="true" />
                    </x-list-tab>   --}}
                    <x-list-tab name="sizes">
                        <livewire:dashboard.sizes.datatable :onlyTrashed="true" />
                    </x-list-tab>


                    <x-list-tab name="combos">
                        <livewire:dashboard.combos.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="coupons">
                        <livewire:dashboard.coupons.datatable :onlyTrashed="true" />
                    </x-list-tab>

                    <x-list-tab name="loyal-points">
                        <livewire:dashboard.loyal-points.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="discounts">
                        <livewire:dashboard.discounts.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="timed-events">
                        <livewire:dashboard.timed-events.datatable :onlyTrashed="true" />
                    </x-list-tab>

                    <x-list-tab name="work-shifts">
                        <livewire:dashboard.work-shifts.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="delay-policies">
                        <livewire:dashboard.delay-policies.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="payment-methods">
                        <livewire:dashboard.payment-methods.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="tags">
                        <livewire:dashboard.tags.datatable :onlyTrashed="true" />
                    </x-list-tab>


                    <x-list-tab name="suppliers">
                        <livewire:dashboard.suppliers.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="inventory-items">
                        <livewire:dashboard.inventory-items.datatable :onlyTrashed="true" />
                    </x-list-tab>
                    <x-list-tab name="inventory-transactions">
                        <livewire:dashboard.inventory-transactions.datatable :onlyTrashed="true" />
                    </x-list-tab>

                </div>
            </div>
        </div>
    </div>

</div>