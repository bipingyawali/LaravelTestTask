@extends('layouts.master')
@section('title','Jobs')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Import Jobs</h5>
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
                    {{ Form::open(['route'=>'jobs.import', 'method' => 'post', 'class' => 'row', 'files' => true]) }}
                    <div class="col-md-4">
                        <label for="file">File</label>
                        {!! Form::file('file',['class'=>'form-control ']); !!}
                    </div>
                    <div class="col-12 mt-3">
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
                            <h5>List of Jobs</h5>
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
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($jobs as $i => $job)
                                    <tr>
                                        <td>{!! $i+1 !!}</td>
                                        <td>{!! $job->candidate->full_name !!}</td>
                                        <td>{!! $job->job_title !!}</td>
                                        <td>{!! $job->company_name !!}</td>
                                        <td>{!! $job->start_date !!}</td>
                                        <td>{!! $job->end_date !!}</td>
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No data available.</td>
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
