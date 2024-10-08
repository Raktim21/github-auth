@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/vendors/datatables.css') }}">
@endsection

@section('dashboard','active')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card custom-card">
                <div class="card-header">
                    <img class="img-fluid" src="{{ asset('admin_dashboard/assets/images/user-card/github.jpg') }}"
                        alt="">
                </div>
                <div class="card-profile">
                    <img class="rounded-circle" src="{{ $profileData['profile_picture'] }}" alt="">
                </div>
                <div class="text-center profile-details">
                    <a href="{{ $profileData['url'] }}" target="_blank">
                        <h4>{{ $profileData['username'] }}</h4>
                    </a>
                    {{-- <h5>{{ $profileData['name'] }}</h5> --}}
                    <h6>{{ $profileData['bio'] }}</h6>
                </div>
                <div class="card-footer row">
                    <div class="col-12">
                        <h6>Total Public Repos</h6>
                        <h3><span class="counter">{{ $profileData['public_repos'] }}</span></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="repo">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Stars</th>
                                    <th>Forks</th>
                                    <th>Language</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($profileData['repositories'] as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ $item['url'] }}" target="_blank">{{ $item['name'] }}</a>
                                        </td>
                                        <td>{{ $item['description'] }}</td>
                                        <td><span class="badge badge-info">{{ $item['stars'] }}</span></td>
                                        <td><span class="badge badge-warning">{{ $item['forks'] }}</span></td>
                                        <td>{{ $item['language'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


@section('js')

    <script src="{{ asset('admin_dashboard/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#repo').DataTable({
                "ordering": false
            }); 
        });
    </script>

@endsection
