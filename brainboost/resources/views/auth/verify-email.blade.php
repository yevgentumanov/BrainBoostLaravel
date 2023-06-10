@extends('...plantillas.base')

@section('main')
    <main>
        <div class="container card-body pt-4">
            <div class="row justify-content-center">
                <div class="flex justify-center items-center h-screen">
                    <!-- resources/views/auth/verify-email.blade.php -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 text-center">
                                A new verification link has been sent to the email address you provided during
                                registration.
                            </div>
                        @endif

                        <div class="mb-4 text-center">
                            Thanks for signing up! Before getting started, could you verify your email address by
                            clicking on
                            the link we just emailed to you? If you didn't receive the email, we will gladly send you
                            another.
                        </div>

                        <div class="mt-4 flex justify-center">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Resend
                                        Verification Email
                                    </button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="bg-red-500 text-white px-4 py-2 ml-2 rounded-md">Log out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

