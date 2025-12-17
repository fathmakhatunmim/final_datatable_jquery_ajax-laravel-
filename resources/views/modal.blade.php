<!-- Add Book Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<form method="POST" id="addForm">
    @csrf

    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <input type="hidden"name="book_id" id="book_id">

                {{-- Error Message --}}
                <div class="ErrorMassage mb-3"></div>

                <!-- Book Title -->
                <div class="mb-3">
                    <label class="form-label">Book Title</label>
                    <input type="text" class="form-control" name="title" id="title"placeholder="Enter book title">
                </div>

                <!-- Author -->
                <div class="mb-3">
                    <label class="form-label">Author Name</label>
                    <input type="text" class="form-control" name="author" id="author"placeholder="Enter author name">
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" id="category"placeholder="Enter category">
                </div>

                <!-- Available -->
                <div class="mb-3">
                    <label class="form-label">Available</label>
                    <select class="form-select" name="available" id="available">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="AddBook" >
                    Submit
                </button>
            </div>

        </div>
    </div>

</form>
</div>
