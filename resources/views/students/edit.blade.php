@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Studentu sąrašas</div>
                    <div class="card-body">
                       <form method="post" action="{{ route("students.update", $student->id) }}">
                           @csrf
                           <div class="mb-3">
                               <label class="form-label">Vardas:</label>
                               <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" value="{{ old('name')?: $student->name  }}" >
                               <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">Pavardė:</label>
                               <input class="form-control @error('surname') is-invalid @enderror" name="surname" type="text"  value="{{ old('surname')?:$student->surname  }}" >
                               <div class="invalid-feedback">@error('surname') {{ $message }} @enderror</div>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">Amžius:</label>
                               <input class="form-control @error('year') is-invalid @enderror" name="year" type="text" value="{{ old('year')?:$student->year }}" >
                               <div class="invalid-feedback">@error('year') {{ $message }} @enderror</div>
                           </div>


                           <button class="btn btn-success"> Išsaugoti</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
