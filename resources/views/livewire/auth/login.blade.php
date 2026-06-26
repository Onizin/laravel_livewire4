<div class="login-box w-100" style="max-width: 440px;">
    <div class="card card-outline card-primary shadow-lg">
        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1"><b>E-</b>Gudang</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Masuk untuk melanjutkan ke dashboard</p>

            <form wire:submit.prevent="login">
                <div class="input-group mb-3">
                    <input wire:model.live="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                </div>
                @error('email')
                    <small class="text-danger d-block mb-2">{{ $message }}</small>
                @enderror

                <div class="input-group mb-3">
                    <input wire:model.live="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>
                @error('password')
                    <small class="text-danger d-block mb-2">{{ $message }}</small>
                @enderror

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input wire:model="remember" type="checkbox" id="remember">
                            <label for="remember">Ingat saya</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
