@extends('layout.mainlayout')
@section('content')


<!-- Page Wrapper -->
            <div class="page-wrapper">
            
                <!-- Page Content -->
                <div class="content container-fluid">
                    
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Aptitude</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item ">Jobs</li>
                                    <li class="breadcrumb-item">Interviewing</li>
                                    <li class="breadcrumb-item active">Aptitude</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    
                    <!-- Content Starts -->
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="card-title">Solid justified</h4> -->
                            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                                <li class="nav-item"><a class="nav-link" href="user-dashboard">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="user-all-jobs">All </a></li>
                                <li class="nav-item"><a class="nav-link" href="saved-jobs">Saved</a></li>
                                <li class="nav-item"><a class="nav-link" href="applied-jobs">Applied</a></li>
                                <li class="nav-item"><a class="nav-link active" href="interviewing">Interviewing</a></li>
                                <li class="nav-item"><a class="nav-link" href="offered-jobs">Offered</a></li>
                                <li class="nav-item"><a class="nav-link" href="visited-jobs">Visitied </a></li>
                                <li class="nav-item"><a class="nav-link" href="archived-jobs">Archived </a></li>
                            </ul>
                        </div>
                    </div>  
                    
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Name : <b>John Richerd</b></p>
                                        <p>Code : <b>#1245</b></p>
                                        <p>Job Type : <b>UI Development</b></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p class="m-b-30">Click button to answer your question.</p>
                                        <div class="row">
                                            <div class="col-md-6 text-center m-b-30">
                                                <a href="questions" class="btn btn-primary w-100 submit-btn">Html</a>
                                            </div>
                                            <div class="col-md-6 text-center m-b-30">
                                                <a href="questions" class="btn btn-primary w-100 submit-btn">Css</a>
                                            </div>
                                            <div class="col-md-6 text-center m-b-30">
                                                <a href="questions" class="btn btn-primary w-100 submit-btn">Design</a>
                                            </div>
                                            <div class="col-md-6 text-center m-b-30">
                                                <a href="questions" class="btn btn-primary w-100 submit-btn">Javascript</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /Content End -->
                    
                </div>
                <!-- /Page Content -->
                
            </div>
            <!-- /Page Wrapper -->


@endsection