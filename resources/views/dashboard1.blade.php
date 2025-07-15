@extends('application_layout')
@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")
<style>
.status-card {
        border-left: 5px solid #007bff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        text-align: center;
        padding-top: 20px;
    }
    .status-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .status-icon {
        font-size: 36px;
        margin-bottom: 15px;
    }
    .pending { color: #ffc107; }
    .processing { color: #17a2b8; }
    .completed { color: #28a745; }
    .rejected { color: #dc3545; }
    .card-text {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .status-card p.card-text {
        color: black;
    }
  
</style>
<!-- @section('currentActivePage',1) -->
@section('content')
    <div class="container mt-5">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card status-card border-warning">
                    <div class="card-body">
                        <i class="fa fa-clock-o status-icon pending" aria-hidden="true"></i>
                        <p class="card-text">1</p>
                        <span class="btn btn-warning text-white">Pending</span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Card 2 -->
        <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card status-card border-info">
                    <div class="card-body">
                        <i class="fa fa-spinner status-icon processing" aria-hidden="true"></i>
                        <p class="card-text">2</p>
                        <span class="btn btn-info text-white">Processing</span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Card 3 -->
        <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card status-card border-success">
                    <div class="card-body">
                        <i class="fa fa-check status-icon completed" aria-hidden="true"></i>
                        <p class="card-text">3</p>
                        <span class="btn btn-success text-white">Completed</span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Card 4 -->
        <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none">
                <div class="card status-card border-danger">
                    <div class="card-body">
                        <i class="fa fa-ban status-icon rejected" aria-hidden="true"></i>
                        <p class="card-text">4</p>
                        <span class="btn btn-danger text-white">Rejected</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@include('application_layouts.application_footer')
@endsection

