<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $row->id }}">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: #fe7c96;">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span style=" color: black;">Are you sure Delete {{ $row->name }}</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('admin.destroy',$row->id) }}" method="post" style="display: contents !important;">
        @csrf
        @method('DELETE')
        <button type="submit" class='btn btn-danger'>Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
