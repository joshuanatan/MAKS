<script>
  var field_row_counter = $(".db_field_row").length;

  function add_db_field_row() {
    var html = `
      <tr class = 'db_field_row' id = 'db_field_row${field_row_counter}'>
        <td>
          <div class = 'checkbox-custom checkbox-primary'>
            <input checked type = 'checkbox' name = 'db_field_checks[]' value = '${field_row_counter}'><label></label>
          </div>
        </td>
        <td>
          <input type = 'text' name = 'table_name${field_row_counter}' class = 'form-control'>
        </td>
        <td>
          <input type = 'text' class = 'form-control' name = 'db_field${field_row_counter}'>
        </td>
        <td>
          <input type ='text' class = 'form-control' name = 'db_field_alias${field_row_counter}'>
        </td>
        <td>
          <button type = 'button' class = 'btn btn-danger btn-sm col-lg-12' onclick = 'remove_db_field_row(${field_row_counter})'>
            <i class = 'icon wb-close'></i>
          </button>
        </td>
      </tr>`;
    $("#tableEntity").append(html);
    field_row_counter++;
  }

  function remove_db_field_row(row) {
    $(`#db_field_row${row}`).remove();
  }

  var entity_list = "";
  <?php for ($a = 0; $a < count($entity); $a++) : ?>
    entity_list += '<option><?php echo $entity[$a]["name"];?></option>';
  <?php endfor; ?>
  $("#entity_datalist").html(entity_list);
  var entity_row_counter = $(".entity_row").length;

  function add_entity_row() {
    var html = `
      <tr class = 'entity_row' id = 'entity_row${entity_row_counter}'>
        <td>
          <div class = 'checkbox-custom checkbox-primary'>
            <input checked type = 'checkbox' name = 'entity_checks[]' value = '${entity_row_counter}'><label></label>
          </div>
        </td>
        <td>
          <input type = 'text' list = 'entity_datalist' name = 'entity_name${entity_row_counter}' class = 'form-control'>
        </td>
        <td>
          <button type = 'button' class = 'btn btn-danger btn-sm col-lg-12' onclick = 'remove_entity_row(${entity_row_counter})'>
            <i class = 'icon wb-close'></i>
          </button>
        </td>
      </tr>`;
    $("#entity_button_container").before(html);
    entity_row_counter++;
  }

  function remove_entity_row(row) {
    $(`#entity_row${row}`).remove();
  }

  function activate_mapping_container() {
    var id_db_connection = $("#id_db_connection").val();
    if (parseInt(id_db_connection) == 0) {
      $("#dbfield_mapping_container").css("display", "none");
    } else {
      $("#dbfield_mapping_container").css("display", "block");
      $("#tableEntity").html("");
    }
  }
</script>