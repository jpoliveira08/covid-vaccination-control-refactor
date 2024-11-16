<form id="vaccineForm" onsubmit="SendForm(event)">
    @csrf
    <input type="hidden" id="form-method" value="POST">
    <input type="hidden" id="vaccine-id" value="">
    <div class="mb-3">
        <label for="vaccine-name" class="form-label">Name</label>
        <input type="text" class="form-control" id="vaccine-name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="vaccine-batch" class="form-label">Batch</label>
        <input type="text" class="form-control" id="vaccine-batch" name="batch" required>
    </div>
    <div class="mb-3">
        <label for="vaccine-expiration-date" class="form-label">Expiration date</label>
        <input type="date" class="form-control" id="vaccine-expiration-date" name="expiration_date" required>
    </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success" id="vaccineSubmitButton">Save</button>
        </div>
</form>
