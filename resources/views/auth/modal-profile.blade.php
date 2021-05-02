<div id="profile-photo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"> 
    <div class="modal-dialog modal-dialog-centered d-flex align-items-center justify-content-center" role="document">
        <div class="modal-content border-0 shadow" style="width: 400px;">
            <div class="modal-body text-center px-0">
                <p class="m-3 pb-2">{{__('Alterar foto do perfil')}}</p>
                <hr>

                <button type="button" class="btn text-primary" id="btn-upload-photo">{{__('Carregar foto')}}</button>
                <input type="file" name="avatar" id="input-upload-photo" class="d-none" onchange="event.preventDefault();document.getElementById('profile-update').submit();">
                <hr>

                <button type="button" class="btn text-danger" onclick="event.preventDefault();document.getElementById('profile-remove-photo').submit();">{{__('Remover foto atual')}}</button>
                <hr>

                <button class="btn text-dark" data-bs-dismiss="modal" aria-label="Close">{{__('Cancelar')}}</button>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    $('#btn-upload-photo').bind("click" , function () {
        $('#input-upload-photo').click();
    });
</script>
@endsection