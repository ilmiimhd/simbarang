@extends('layouts.public')

@section('scripts')
  <x-cards.card-settings :user="$user" />
  @if (session('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '{{ session('success') }}',
      confirmButtonColor: '#0ea5e9',
      timer: 3000,
      timerProgressBar: true
    });
  </script>
@endif
@endsection
