<!-- Modal -->
<div class="modal fade" id="edit-{{$user->id}}" tabindex="-1" aria-labelledby="edit-{{$user->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <form action="{{route('admin.user.update', ['user' => $user->id])}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-{{$user->id}}Label">{{__('Editar')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb">
                        @csrf
                        @method('put')
                    </div>
        
                    <div class="mb-3">
                        <label>{{__('Nome')}}</label>
                        <input type="text" class="form-control form-control" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label>{{__('E-mail')}}</label>
                        <input type="email" class="form-control form-control" name="email" value="{{ $user->email }}" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label>{{__('Senha')}}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" id="password" autocomplete="new-password" value="{{old('password')}}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm">{{ __('Confirme a senha') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" value="{{old('passowrd_confirmation')}}">
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-exit" data-bs-dismiss="modal">{{__('Fechar')}}</button>
                    <button type="submit" class="btn btn-save">{{__('Salvar alterações')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>