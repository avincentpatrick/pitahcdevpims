<div>
    <div class="modal fade" id="noAdminAccessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Access Denied!</h5>
                </div>
                <div class="modal-body">
                    <span>You do not have permission to access this page.</span>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form3').submit();">Return to Login Page</button>
                    </div>
                    <form id="logout-form3" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>