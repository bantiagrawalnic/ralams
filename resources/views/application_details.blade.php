
@extends('application_layout')
@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))
@section('role_name', "Admin")
@section('currentActivePage',1)
@section('content')
<style>
    textarea {
        resize: vertical;
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    label {
        font-weight: 600;
        color: #333;
    }

    .form-section {
        /* background: #f9f9f9; */
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container">       
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 p-4">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body">
                    <h2 class="mb-3 text-center text-primary">Application Details</h2>
                    <div class="row">                        
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Application Number:</strong>
                                <span>{{ $details->application->application_number }}</span>
                            </div>
                        </div>                        
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Applicant Name:</strong>
                                <span>{{ $details->application->applicant_name ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Applicant Father Name:</strong>
                                <span>{{ $details->application->applicant_fname ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Applicant Address:</strong>
                                <span>{{ $details->application->applicant_add1 ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Purpose:</strong>
                                <span>{{ $details->application->purpose->purpose_name ?? 'N/A'}}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Land Type:</strong>
                                <span>{{ $details->application->landDeatil->land_type ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Land Type:</strong>
                                <span>{{ $details->application->landDeatil->land_type ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Is Land Surrendered:</strong>
                                <span>{{ ($details->application->landDeatil->is_land_surrendered == 'no') ? "No" : "Yes"  }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Village:</strong>
                                <span>{{ $details->application->landDeatil->village->Village_Name ?? 'N/A' }}</span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Land Owner Name:</strong>
                                <span>{{ $details->application->landOwnerDetail[0]->owner_name ?? 'N/A' }}</span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Land Owner Address:</strong>
                                <span>{{ $details->application->landOwnerDetail[0]->owner_add1 ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Khasra Number:</strong>
                                <span>{{ $details->application->landOwnerDetail[0]->khasra_number ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Proposed Land Area(In Acr):</strong>
                                <span>{{ $details->application->landDeatil->proposed_land_area ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>         
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Distance from State Highway(In Km):</strong>
                                <span>{{ $details->application->landDeatil->dist_from_SH ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Distance from National Highway(In Km):</strong>
                                <span>{{ $details->application->landDeatil->dist_from_NH ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Distance from Railway Station(In Km):</strong>
                                <span>{{ $details->application->landDeatil->dist_from_RL ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Distance from City(In Km):</strong>
                                <span>{{ $details->application->landDeatil->dist_from_City ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Is Irrigation Land:</strong>
                                <span>{{ ($details->application->landDeatil->irrigation_land) ? ucfirst($details->application->landDeatil->irrigation_land) : 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Irrigation Detail:</strong>
                                <span>{{ $details->application->landDeatil->irrigation_detail ?? 'N/A' }}</Acr></span>
                            </div>
                        </div>      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Land Type:</strong>
                                <span>{{ ($details->application->landDeatil->land_type) ? ucfirst($details->application->landDeatil->land_type) : 'N/A' }}</Acr></span>
                            </div>
                        </div>
                        @if($details->status == 'pending')      
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Comment:</strong>
                                <textarea id="comment" rows="5" cols="100"></textarea>
                            </div>
                        </div>                        
                        {{--@if(count($dropdown) > 0)
                        <div class="col-md-3 mt-4">
                            <div class="d-flex flex-column">
                                <strong>Forward To:</strong>
                                <select class="form-control" name="forwared_to" id="forwared_to">
                                    <option value="">Please Select</option>
                                    @if(!$dropdown->isEmpty())
                                    @foreach($dropdown as $key=>$data)
                                    <option value="{{$data->id}}" {{($selected_value == $data->id) ? 'selected':''}}>{{$data->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>                 
                        @endif --}}
                        @endif
                    </div>       
                    @if($details->status == 'pending')             
                    <div class="row"> 
                        <div class="col-md-3 mt-5">
                            <div class="d-flex flex-column">
                                <button type="button" data-status="next" class="btn btn-primary gap-2 application_status">                                    
                                    <span>आगे भेजे</span>
                                </button>                                
                            </div>
                        </div>
                        @if(Auth::user()->user_type != 'DM')
                        <div class="col-md-3 mt-5">
                            <div class="d-flex flex-column">
                                <button type="button" data-status="back" class="btn btn-primary gap-2 application_status">                                    
                                    <span>वापस भेजे</span>
                                </button>                                
                            </div>
                        </div>
                        @endif
                        @if($details->application->allot_auth == Auth::user()->user_type)
                        <div class="col-md-3 mt-5">
                            <div class="d-flex flex-column">                               
                                <button type="button" data-status="reject" class="btn btn-primary gap-2 application_status">                                    
                                    <span>रद्द करें</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>    
                    @endif                
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 p-4">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action="" onsubmit="" id="ralamsForm" name="myForm">
                            <div class="row form-section">
                                <div class="col-md-4 mt-4">
                                    <label for="district_name">{{ __("labels.district_name") }}:</label>
                                    <input type="text" class="form-control" name="district_name" placeholder="जिले का नाम">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="org_name">{{ __("labels.appl_detail") }}:</label>
                                    <input type="text" class="form-control" name="org_name" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                            </div>
                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.org_reg") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="org_reg" value="yes" id="regYes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="org_reg" value="no" id="regNo" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="orgRegDetails" class="mt-3" style="display:none;">
                                        <textarea id="orgDetails" name="orgDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- गत ३ वर्ष का आय-व्यय -->
                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.expenditure") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="expenditure" name="expenditure" rows="3" class="form-control"
                                        placeholder="आय-व्यय का विवरण लिखें..."></textarea>
                                </div>
                            </div>

                            <!-- परियोजना रिपोर्ट -->
                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.pro_detail") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="pro_detail" name="pro_detail" rows="3" class="form-control"
                                        placeholder="परियोजना रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.org_exp") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="org_exp" value="yes" id="regYes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="org_exp" value="no" id="regNo" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="orgExpDetails" class="mt-3" style="display:none;">
                                        <textarea id="orgExDetails" name="orgExDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.pro_allocation") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="pro_allocation" name="pro_allocation" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.justification") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="justification" name="justification" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>
                                
                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.inst_allot_land") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inst_allot_land" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inst_allot_land" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="instAllotLandDetails" class="mt-3" style="display:none;">
                                        <textarea id="instLandDetails" name="instLandDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.encroach_land") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="encroach_land" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="encroach_land" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="encroachLandDetails" class="mt-3" style="display:none;">
                                        <textarea id="encroachDetails" name="encroachDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.benefits") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="benefits" name="benefits" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.comp_rev_dept") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="comp_rev_dept" name="comp_rev_dept" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.proposed_allot") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="proposed_allot" name="proposed_allot" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row form-section">
                                <div class="col-md-6">
                                    <label>{{ __("labels.town_planning") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="town_planning" name="town_planning" rows="3" class="form-control"
                                        placeholder="रिपोर्ट विवरण..."></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <label for="proposed_rate">{{ __("labels.proposed_rate") }}:</label>
                                    <input type="text" class="form-control" name="proposed_rate" placeholder="जिले का नाम">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="app_concession">{{ __("labels.app_concession") }}:</label>
                                    <input type="text" class="form-control" name="app_concession" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="total_cost">{{ __("labels.total_cost") }}:</label>
                                    <input type="text" class="form-control" name="total_cost" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="dlc_rate">{{ __("labels.dlc_rate") }}:</label>
                                    <input type="text" class="form-control" name="dlc_rate" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="rule_allotment">{{ __("labels.rule_allotment") }}</label>
                                    <input type="text" class="form-control" name="rule_allotment" placeholder="संस्था का नाम / पता / विवरण">
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.pending_stay") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pending_stay" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pending_stay" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.prev_cons") }}:</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prev_cons" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prev_cons" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.is_command_area") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="command_area" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="command_area" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.restricted_land") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="restricted_land" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="restricted_land" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.urban_periphery") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="urban_periphery" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="urban_periphery" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="urbanPeripheryDetails" class="mt-3" style="display:none;">
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.grazing_land") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="grazing_land" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="grazing_land" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="grazingLandDetails" class="mt-3" style="display:none;">
                                        <label>{{ __("labels.panchayat_opinion") }}</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="panchayat_opinion" value="yes">
                                            <label class="form-check-label">{{ __("labels.yes") }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="panchayat_opinion" value="no" checked>
                                            <label class="form-check-label">{{ __("labels.no") }}</label>
                                        </div>
                                    </div>
                                    <div id="panchayatOpinionDetails" class="mt-3" style="display:none;">
                                        <textarea id="compensationDetails" name="compensationDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-section mt-4">
                                <div class="col-md-6">
                                    <label>{{ __("labels.master_plan") }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="master_plan" value="yes">
                                        <label class="form-check-label" for="regYes">{{ __("labels.yes") }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="master_plan" value="no" checked>
                                        <label class="form-check-label" for="regNo">{{ __("labels.no") }}</label>
                                    </div>
                                    <div id="masterPlanDetails" class="mt-3" style="display:none;">
                                        <label>{{ __("labels.panchayat_opinion") }}</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="change_master_plan" value="yes">
                                            <label class="form-check-label">{{ __("labels.yes") }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="change_master_plan" value="no" checked>
                                            <label class="form-check-label">{{ __("labels.no") }}</label>
                                        </div>
                                    </div>
                                    <div id="changeMasterPlanDetails" class="mt-3" style="display:none;">
                                        <textarea id="changeDetails" name="changeDetails" rows="3" class="form-control"
                                            placeholder="यहाँ विवरण लिखें..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-section mt-4">
                                <div class="col-md-4 mt-4">
                                    <label for="landType">{{ __("labels.land_category") }}:</label>
                                    <select class="form-control" id="landType" name="landType" required>
                                        <option value="">-- कृपया चयन करें --</option>
                                        <option value="ग्रामीण">ग्रामीण</option>
                                        <option value="नगरीय परिधीय">नगरीय परिधीय</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="distance">{{ __("labels.distance") }}:</label>
                                    <input type="text" class="form-control" name="distance" placeholder="राष्ट्रीय/राज्य राजमार्ग से दूरी (किमी में)">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <label for="changeReason">{{ __("labels.changeReason") }}:</label>
                                    <input type="text" class="form-control" name="changeReason" placeholder="परिवर्तन का कारण">
                                </div>
                            </div>
                            <div class="row form-section mt-4">
                                <div class="col-md-12">
                                    <h3 class="text-center">{{ __("labels.inst_land_detail") }}</h3>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="rev_vill">{{ __("labels.rev_vill") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="rev_vill" name="rev_vill">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="khasra_no">{{ __("labels.khasra_no") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="khasra_no" name="khasra_no">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="land_type">{{ __("labels.land_type") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="land_type" name="land_type">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="area">{{ __("labels.area") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="area" name="area">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="jamabandi_details">{{ __("labels.jamabandi_details") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" id="jamabandi_details" name="jamabandi_details">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <label for="revenue_map">{{ __("labels.revenue_map") }}</label>
                                </div>
                                <div class="col-md-6 mt-4">
                                   <input type="file" id="revenue_map" name="revenue_map" accept=".pdf,.jpg,.png,.jpeg">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
    $('.application_status').on('click',function(e){
        var comment = $('#comment').val();        
        var status  = $(this).attr('data-status');
        var applicationId = "{{$details->application->id}}";        
        var forwared_to  = $('#forwared_to').val();                
        e.preventDefault();                    
        if (!applicationId || !status) {
            console.error('Missing application ID or status.');
            return;
        }    
        $.ajax({
            url: "{{ route('update.applicationSatatus') }}",
            type: "POST",
            data: {
                application_id: applicationId,
                status: status,
                forwared_to : forwared_to,
                comment: comment,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if(response.status){
                    window.location.href= "{{route('home')}}";
                }
                console.log('Update successful:', response);                
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);            
            }
        });
    });
</script>
 <script>
        document.querySelectorAll('input[name="org_reg"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('orgRegDetails').style.display = (this.value === "yes") ? 'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="org_exp"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('orgExpDetails').style.display = (this.value === "yes") ? 'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="inst_allot_land"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('instAllotLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="encroach_land"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('encroachLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="grazing_land"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('grazingLandDetails').style.display = (this.value === "yes") ? 'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="panchayat_opinion"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('panchayatOpinionDetails').style.display = (this.value === "yes") ? 'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="urban_periphery"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('urbanPeripheryDetails').style.display = (this.value === "yes") ? 'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="master_plan"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('masterPlanDetails').style.display = (this.value === "yes") ? 'block' : 'none';
            });
        });

        document.querySelectorAll('input[name="change_master_plan"]').forEach((elem) => {
            elem.addEventListener("change", function() {
            document.getElementById('changeMasterPlanDetails').style.display = (this.value === "no") ? 'block' : 'none';
            });
        });

    </script>
@endsection
