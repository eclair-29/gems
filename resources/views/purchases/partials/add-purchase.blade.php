<form class="add-purchase" action="{{ route('purchases.store') }}" id="add_purchase_fields" method="post">
    @csrf
    <x-purchase-fields :purchase="null" :categories="$categories" :types="$types" :action="'add'" />
</form>