<div class="container">
  <div class="d-flex">
    <a class="btn btn-primary" href="<?= base_url ?>/phone/add">Add</a>
  </div>
  <table id="phone_table" class="table">
    <thead>
      <th>id_phone</th>
      <th>name_phone</th>
      <th>brand_phone</th>
    </thead>
    <tbody>
      <?php foreach ($data['list_phone'] as $phone) { ?>
        <tr>
          <td><?= $phone['id_phone'] ?></td>
          <td><?= $phone['name_phone'] ?></td>
          <td><?= $phone['brand_phone'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function() {
    $('#phone_table').DataTable({
      "order": [
        [1, 'asc']
      ]
    });
  });
</script>