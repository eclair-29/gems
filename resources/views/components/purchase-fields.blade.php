@props(['purchase', 'types', 'groups', 'action', 'statuses', 'depts'])

<div class="row">
    <div class="col-lg-12 pb-3">
        <label for="purchase" class="form-label">
            Purchase Label
            <span class="text-danger fw-bold"> *</span>
        </label>
        <input type="text" class="form-control text-uppercase"
            id="{{ $purchase && $action == 'update' ? 'purchase_' . $purchase->id : 'purchase' }}" name="purchase"
            value="{{ $purchase->description ?? '' }}">
    </div>
    <div class="col-lg-6 pb-3">
        <label for="purchase_type" class="form-label">
            Account
            @if ($action == 'add')
            <span class="text-danger fw-bold"> *</span>
            @endif
        </label>
        <select class="form-select" id="{{ $action == 'add' ? 'purchase_type' : '' }}" name="purchase_type">
            <option {{ !$purchase ? 'disabled' : '' }} selected value="{{ $purchase->purchase_type_id ?? '' }}">
                {{ $purchase->purchaseType->description ?? 'Select Account' }}
            </option>

            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->description}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 pb-3">
        <label for="purchase_category" class="form-label">
            Group
            @if ($action == 'add')
            <span class="text-danger fw-bold"> *</span>
            @endif
        </label>
        <select class="form-select" id="{{ $action == 'add' ? 'purchase_category' : '' }}" name="purchase_category">
            <option {{ !$purchase ? 'disabled' : '' }} selected value="{{ $purchase->purchase_category_id ?? '' }}">
                {{ $purchase->purchaseCategory->description ?? 'Select Account' }}
            </option>

            @foreach ($groups as $group)
            <option value="{{ $group->id }}">{{ $group->description}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 pb-3">
        <label for="dept" class="form-label">
            Dept.
            @if ($action == 'add')
            <span class="text-danger fw-bold"> *</span>
            @endif
        </label>
        <select class="form-select" id="{{ $action == 'add' ? 'dept' : '' }}" name="dept">
            <option {{ !$purchase ? 'disabled' : '' }} selected value="{{ $purchase->dept_id ?? '' }}">
                {{ $purchase->dept->description ?? 'Select Account' }}
            </option>

            @foreach ($depts as $dept)
            <option value="{{ $dept->id }}">{{ $dept->description}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 pb-3">
        <label for="status" class="form-label">
            Status
            @if ($action == 'add')
            <span class="text-danger fw-bold"> *</span>
            @endif
        </label>
        <select class="form-select" id="{{ $action == 'add' ? 'status' : '' }}" name="status">
            <option {{ !$purchase ? 'disabled' : '' }} selected value="{{ $purchase->status_id ?? '' }}">
                {{ Str::title($purchase->status->description ?? 'Select Account') }}
            </option>

            @foreach ($statuses as $status)
            <option value="{{ $status->id }}">{{ Str::title($status->description) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 pb-3">
        <label for="allocated_budget_php" class="form-label">
            Allocated Budget - PHP
            <span class="text-danger fw-bold"> *</span>
        </label>
        <input type="text" class="form-control"
            id="{{ $purchase && $action == 'update' ? 'allocated_budget_php_' . $purchase->id : 'allocated_budget_php' }}"
            name="allocated_budget_php" value="{{ $purchase->allocated_budget_php ?? '' }}">
    </div>
    <div class="col-12 pb-3">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control" name="notes" rows="3">{{ $assignee->notes ?? '' }}</textarea>
    </div>
</div>