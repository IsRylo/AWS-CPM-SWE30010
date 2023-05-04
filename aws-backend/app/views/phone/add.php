<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="POST" action="<?= base_url ?>/phone/addPhone">
        <div class="mb-3">
          <label class="form-label">Phone Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
          <label class="form-label">Phone Brand</label>
          <input type="text" class="form-control" name="brand">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>