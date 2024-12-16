<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Table with Laravel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <table id="recordsTable" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>NID</th>
          <th>CENTER</th>
          <th>Schedule Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Data will be populated by jQuery AJAX -->
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Update Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateForm">
            <input type="hidden" id="recordId">
            <div class="mb-3">
              <label for="scheduleDate" class="form-label">Schedule Date</label>
              <input type="date" class="form-control" id="scheduleDate" required>
            </div>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" required>
                <option value="Scheduled">Scheduled</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function () {
      // Fetch and display records
      function fetchRecords() {
        $.ajax({
          url: '/records',
          method: 'GET',
          success: function (response) {
            let rows = '';
            response.forEach((record, index) => {
              rows += `
                <tr>
                  <td>${index + 1}</td>
                  <td>${record.user.name}</td>
                  <td>${record.user.email}</td>
                  <td>${record.user.nid}</td>
                  <td>${record.center.name}</td>
                  <td>${record.scheduled_date}</td>
                  <td>${record.status}</td>
                  <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal"
                      onclick="populateModal(${record.id}, '${record.schedule_date}', '${record.status}')">
                      Update
                    </button>
                  </td>
                </tr>`;
            });
            $('#recordsTable tbody').html(rows);
          }
        });
      }

      fetchRecords();

      window.populateModal = function (id, scheduleDate, status) {
        $('#recordId').val(id);
        $('#scheduleDate').val(scheduleDate);
        $('#status').val(status);
      };

      $('#saveChanges').click(function () {
        const id = $('#recordId').val();
        const scheduleDate = $('#scheduleDate').val();
        const status = $('#status').val();

        $.ajax({
          url: `/records/${id}`,
          method: 'POST',
          data: {
            schedule_date: scheduleDate,
            status: status,
            _token: '{{ csrf_token() }}'
          },
          success: function (response) {
            if (response.success) {
              alert(response.message);
              $('#updateModal').modal('hide');
              fetchRecords(); 
            } else {
              alert(response.message);
            }
          }
        });
      });
    });
  </script>
</body>
</html>
