<x-layout>
@section('title', 'Login')

    <div class="row justify-content-center pt-4">
        <div class="col-md-6">
                <h1 class="text-center mt-4 text-white">LOG IN</h1>
                @if (session()->has('flash'))
                    <p class="alert alert-success mt-3">{{ session('flash') }}</p>
                @endif
                <form action="{{ route('login_process') }}" method="post">
                @csrf
                <div class="mb-3 mt-5 d-flex align-items-center">
                    <div class="me-2 text-white p-2 rounded custom-bg-color">ID</div>
                    <input type="text" class="form-control" name="iduser" id="iduser">
                </div>
                <div class="mb-3 mt-4 d-flex align-items-center">
                    <div class="me-2 text-white p-2 rounded custom-bg-color">Password</div>
                    <input type="password" class="form-control" name="userpassword" id="userpassword">
                </div>
                <div class="mb-3 mt-4">
                    <label class="text-white">Belum punya akun?</label>
                    <a href="{{ route('register_page') }}" class="btn btn-link link-warning">Sign-Up</a>
                    <button type="submit" class="btn text-white custom-bg-color">Submit</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
