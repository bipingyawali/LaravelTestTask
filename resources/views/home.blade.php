@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h5>List of Candidate</h5>
                        </div>
                        <div class="col-md-3 float-right">
                            <a href="{{ route('candidates.index') }}" class="btn btn-primary">Import Candidates</a>
                            <a href="{{ route('jobs.index') }}" class="btn btn-success">Import Jobs</a>
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
