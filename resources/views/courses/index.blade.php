@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.coursesList") }}</div>
                    <div class="card-body">
                        <img src="{{ asset("/storage/image-analysis.png") }}" style="width:100px;">
                        @can('create', \App\Models\Course::class)
                        <a href="{{ route('courses.create') }}" class="btn btn-success float-end">Pridėti</a>
                        @endcan
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pavadinimas</th>
                                    <th>Studentai</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>
                                    @foreach($course->students as $student)
                                            {{ $student->name }} {{ $student->surname }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @can('update', $course)
                                        <a class="btn btn-info" href="{{ route('courses.edit', $course->id) }}">Redaguoti</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('delete', $course)
                                    <form method="post" action="{{ route("courses.destroy", $course->id) }}">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-danger">Ištrinti</button>
                                    </form>
                                    @endcan
                                </td>

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
