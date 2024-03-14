<form class="update-purchase" action="{{ route('purchases.update', $purchase->id) }}"
    id="{{ 'update_purchase_fields_' . $purchase->id }}" method="POST">
    @csrf
    @method('PUT')
    <x-purchase-fields 
        :purchase="$purchase" 
        :types="$types" 
        :groups="$groups" 
        :statuses="$statuses"
        :depts="$depts"
        :action="'update'" 
    />
</form>