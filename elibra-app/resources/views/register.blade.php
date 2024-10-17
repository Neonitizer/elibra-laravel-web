<x-layout>
@section('title', 'Register')

    <div class="row justify-content-center pt-4">
        <div class="col-md-6">
            <h1 class="text-center mt-4 text-white">SIGN UP</h1>
            @if (session()->has('flash'))
                <p class="alert alert-danger mt-3">{{ session('flash') }}</p>
            @endif
            <form action="{{ route('register_process') }}" method="post">
                @csrf
                <div class="mb-3 mt-5 d-flex align-items-center">
                    <div class="me-2 text-white p-2 rounded custom-bg-color">Username</div>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <div class="me-2 text-white p-2 rounded custom-bg-color">ID</div>
                    <input type="text" class="form-control" name="iduser" id="iduser">
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <div class="me-2 text-white p-2 rounded custom-bg-color">Password</div>
                    <input type="password" class="form-control" name="userpassword" id="userpassword">
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <div class="me-2 text-white p-2 rounded custom-bg-color">Re-Enter Password</div>
                    <input type="password" class="form-control" name="userpassword2" id="userpassword2">
                </div>
                <div class="mb-3">
                    <label class="text-white">Sudah punya akun? </label>
                    <a href="{{ route('login_page') }}" class="btn btn-link link-warning">Login</a>
                    <button type="submit" class="btn text-white" style="background-color: #014515;">Submit</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
