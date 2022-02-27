@extends('layouts.master')
@section('title','Candidates')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Import Candidates</h5>
                </div>
                <div class="card-body">
                    @include('flash::message')
                    @if(isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {!! $error !!} <br>
                            @endforeach
                        </div>
                    @endif
                    {{ Form::open(['route'=>'candidates.import', 'method' => 'post', 'files' => true]) }}
                    <div class="row mb-3">
                        <div class="form-group col-4">
                            <label for="file">File</label>
                            {!! Form::file('file',['class'=>'form-control']); !!}
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h5>List of Candidates</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">S.N.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Jobs</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($candidates as $i => $candidate)
                                        <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>{!! $candidate->first_name !!} {!! $candidate->last_name !!}</td>
                                            <td>{!! $candidate->email !!}</td>
                                            <td>
                                                @foreach($candidate->jobs as $job)
                                                        <li>{!! $job->job_title !!} | {!! $job->company_name !!} | {!! $job->start_date !!} | {!! $job->end_date !!}</li>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No data available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
