<form class="add-purchase" action="{{ route('purchases.store') }}" id="add_purchase_fields" method="post">
    @csrf
    <x-purchase-fields 
        :purchase="null" 
        :types="$types"  
        :groups="$groups" 
        :statuses="$statuses"
        :depts="$depts"
        :action="'add'" 
    />
</form>