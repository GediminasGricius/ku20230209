@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Studentu sąrašas</div>
                    <div class="card-body">
                        <a href="{{ route('students.create') }}" class="btn btn-success float-end">Pridėti</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Vardas</th>
                                    <th>Pavardė</th>
                                    <th>Metai</th>
                                    <th>Veiksmai</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->surname }}</td>
                                <td>{{ $student->year }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('students.edit', $student->id) }}">Redaguoti</a>
                                    <a class="btn btn-danger" href="{{route('students.delete',$student->id)}}">Ištrinti</a>
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
