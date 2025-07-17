{{-- resources/views/loans/create.blade.php --}}

<div class="container">
    <h1>Create New Loan</h1>

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User</label>
            <select class="form-control" name="user_id" id="user_id" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" name="amount" id="amount" value="{{ old('amount') }}" required>
        </div>

        <div class="form-group">
            <label for="interest_rate">Interest Rate (%)</label>
            <input type="number" class="form-control" name="interest_rate" id="interest_rate" value="{{ old('interest_rate') }}" required>
        </div>

        <div class="form-group">
            <label for="term">Term (Months)</label>
            <input type="number" class="form-control" name="term" id="term" value="{{ old('term') }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Loan</button>
    </form>
</div>

