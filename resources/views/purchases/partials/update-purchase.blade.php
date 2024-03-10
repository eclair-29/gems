<form class="update-purchase" action="{{ route('purchases.update', $purchase->id) }}"
    id="{{ 'update_purchase_fields_' . $purchase->id }}" method="POST">
    @csrf
    @method('PUT')
    <x-purchase-fields :purchase="$purchase" :categories="$categories" :types="$types" :action="'update'" />
</form>