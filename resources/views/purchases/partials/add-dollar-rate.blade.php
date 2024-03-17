<form class="add-dollar-rate" action="{{ route('rates.store') }}" id="dollar_rate_fields" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-12 pb-3">
            <label for="rate" id="rate_label" class="form-label"></label>
            <div class="input-group">
                <span class="input-group-text">$1.00</span>
                <input id="rate" name="rate" type="text" class="form-control" placeholder="Rate in PHP" value="">
            </div>
        </div>
    </div>
</form>