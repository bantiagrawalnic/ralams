@extends('application_layout')

@section('title', __("labels.project_short_name"))
@section('pagetitle', __("labels.dashboard"))

@section('role_name', "Admin")
<title>Power Plant Proposal Form</title>

<style>
   
    h2 {
        color: #2c3e50;
        border-bottom: 2px solid #ccc;
        padding-bottom: 5px;
        margin-top: 30px;
    }
    label {
        font-weight: bold;
        display: block;
        margin-top: 15px;
    }
    input[type="text"],
    input[type="number"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }
    .checkbox-group, .radio-group {
        margin-top: 10px;
    }
    .collapsible {
        /* background-color: #f1f1f1; */
        color: #444;
        cursor: pointer;
        padding: 10px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        /* transition: background-color 0.3s; */
    }
    .active, .collapsible:hover {
        /* background-color: #ccc; */
    }
    .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        /* background-color: #f9f9f9; */
    }
    .plus-minus {
        float: right;
    }
    /* .form-container {
        display: none;
    } */
     #popupModal{
        display:none; 
        position:fixed; 
        top:20%; 
        left:30%; 
        width:40%; 
        background:#fff; 
        border:1px solid #ccc; 
        padding:20px; 
        z-index:1000;
     }
     #overlay{
        display:none; 
        position:fixed; 
        top:0; 
        left:0; 
        width:100%; 
        height:100%; 
        background:rgba(0,0,0,0.5); 
        z-index:999;
     }
</style>

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 p-4">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action="" onsubmit="" id="ralamsForm" name="myForm">
                            <button type="button" class="collapsible">Company Details <span class="plus-minus">+</span></button>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-4 mt-4">
                                        <label>Name of the applicant / organization:</label>
                                        <input class="form-control" type="text" name="name" placeholder="" required>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label>the applicant/organization is a:</label>
                                        <select name="org_type">
                                            <option value="">--Select--</option>
                                            <option>Company registered under Indian Companies Act 1956</option>
                                            <option>Co-operative Society</option>
                                            <option>Any other corporate entity</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="officeAddress">Office Address:</label>
                                        <textarea class="form-control" id="officeAddress" name="officeAddress" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="telephone">Telephone No.:</label>
                                        <input class="form-control" type="tel" id="telephone" name="telephone">
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="fax">Fax No.:</label>
                                        <input class="form-control" type="text" id="fax" name="fax">
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="email">Email Address:</label>
                                        <input class="form-control" type="email" id="email" name="email">
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="partners">In case of other corporate entity, give details of partners/directors/owners:</label>
                                        <textarea class="form-control" id="partners" name="partners" rows="4"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label>whether income tax assesses, if yes, please state the year up to which assessment made (copies of assessment for last three years to be enclosed).</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="more_land" value="yes">
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="more_land" value="no" checked>
                                            <label class="form-check-label">No</label>
                                        </div>
                                        <div id="moreDetails" class="mt-2" style="display:none;">
                                            <textarea class="form-control mt-2" placeholder="Details"></textarea>
                                             <label>copies of assessment for last three years to be enclosed</label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="collapsible mt-4">Proposed Power Project <span class="plus-minus">+</span></button>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-4 mt-4">
                                        <label for="grossCapacity">Proposed Gross Capacity (MW):</label>
                                        <input class="form-control" type="number" id="grossCapacity" name="grossCapacity" step="0.01" min="0" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="auxConsumption">Auxiliary Consumption (MW):</label>
                                        <input class="form-control" type="number" id="auxConsumption" name="auxConsumption" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="netCapacity">Net Capacity (MW):</label>
                                        <input class="form-control" type="number" id="netCapacity" name="netCapacity" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="plf">Plant Load Factor (PLF) %:</label>
                                        <input class="form-control" type="number" id="plf" name="plf" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="expectedGeneration">Net Expected Power Generation per Annum (lacs kWh):</label>
                                        <input class="form-control" type="number" id="expectedGeneration" name="expectedGeneration" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="manufacturerDetails">Name of Manufacturer with Address for Supply, Installation and Commissioning of Power Generation System (if identified):</label>
                                        <textarea class="form-control" id="manufacturerDetails" name="manufacturerDetails" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="ownFunds">Own Funds (Promoters):</label>
                                        <input class="from-control" type="number" id="ownFunds" name="ownFunds" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="financialInstitution">IREDA / PFC / REC / Financial Institution / Commercial Banks (Equity):</label>
                                        <input class="from-control" type="number" id="financialInstitution" name="financialInstitution" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="otherFunds">Other:</label>
                                        <input class="form-control" type="number" id="otherFunds" name="otherFunds" step="0.01" />
                                    </div>
                                </div>
                                <div class="section mt-4">
                                    <h3>Time Frame and PERT Chart for Major Activities</h3>
                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            <label for="landAcquisition">Acquisition of Land:</label>
                                            <input class="form-control" type="text" id="landAcquisition" name="landAcquisition" />
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="ppaSigning">Signing of PPA:</label>
                                            <input class="form-control" type="text" id="ppaSigning" name="ppaSigning" />
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="financialClosure">Expected Financial Closure:</label>
                                            <input class="form-control" type="text" id="financialClosure" name="financialClosure" />
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="commissioningDate">Date of Commissioning / Synchronization:</label>
                                            <input class="form-control" type="date" id="commissioningDate" name="commissioningDate" />
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="cod">Proposed Commercial Operation Date (COD):</label>
                                            <input class="form-control" type="date" id="cod" name="cod" />
                                        </div>
                                    </div>
                                </div> 
                                <div class="section mt-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="powerPurpose">Power Plant Proposed To Be Set Up For:</label><br>
                                            <input type="checkbox" id="captiveUse" name="powerPurpose" value="captiveUse" />
                                            <label for="captiveUse">Captive Use</label><br>
                                            <input type="checkbox" id="saleToRVPN" name="powerPurpose" value="saleToRVPN" />
                                            <label for="saleToRVPN">Sale to RVPN/DISCOM on approved rate</label><br>
                                            <input type="checkbox" id="thirdPartySale" name="powerPurpose" value="thirdPartySale" />
                                            <label for="thirdPartySale">Third Party Sale at mutually agreeable rates on payment of approved wheeling charges to RVPN</label><br>
                                            <input type="checkbox" id="saleUnderREC" name="powerPurpose" value="saleUnderREC" />
                                            <label for="saleUnderREC">Sale of DISCOM under REC mechanism</label><br>
                                            <input type="checkbox" id="solarMission" name="powerPurpose" value="solarMission" />
                                            <label for="solarMission">Under Solar Mission (please specify scheme below)</label><br>
                                            <input type="checkbox" id="otherPurpose" name="powerPurpose" value="other" />
                                            <label for="otherPurpose">Any Other (please specify below)</label>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="solarSchemeName">If under Solar Mission, specify the name of the scheme:</label>
                                            <input class="form-control" type="text" id="solarSchemeName" name="solarSchemeName" />
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <label for="otherPowerPurpose">If Any Other, please specify:</label>
                                            <input class="form-control" type="text" id="otherPowerPurpose" name="otherPowerPurpose" />
                                        </div>
                                        <div class="col-md-4 mt-4">
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <label for="powerPurpose">Please tick the Non-Conventional Source of Energy on which the project is proposed to be based</label><br>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="energy_source" value="SPV_Wind_Hybrid_Solar" id="energyRadio">
                                                SPV / SPV-Wind Hybrid / Solar Thermal
                                            </label><br>
                                        </div>
                                        <div id="popupModal">
                                            <p>This is your popup content!</p>
                                            <button onclick="closePopup()">Close</button>
                                        </div>
                                        <div id="overlay"></div>
                                        
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="energy_source" value="Biomass" onclick="openModal('biomassModal')">
                                                Biomass
                                            </label><br>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="energy_source" value="Wind" onclick="openModal('windModal')">
                                                Wind
                                            </label><br>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="energy_source" value="Mini-Small-Hydel" onclick="openModal('hydelModal')">
                                                Mini-Small Hydel
                                            </label><br>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="energy_source" value="Biogas">
                                                Biogas
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="modal fade" id="biomassModal" tabindex="-1" aria-labelledby="biomassModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="biomassModalLabel">Biomass Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Information about Biomass.
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="modal fade" id="windModal" tabindex="-1" aria-labelledby="windModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="windModalLabel">Wind Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Information about Wind energy.
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="modal fade" id="hydelModal" tabindex="-1" aria-labelledby="hydelModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hydelModalLabel">Hydel Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Information about Mini/Small Hydel energy.
                                    </div>
                                    </div>
                                </div>
                                </div>                      
                            </div>
                            <button type="button" class="collapsible mt-4">Documentation <span class="plus-minus">+</span></button>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-4 mt-4">
                                        <label for="grossCapacity">Proposed Gross Capacity (MW):</label>
                                        <input class="form-control" type="number" id="grossCapacity" name="grossCapacity" step="0.01" min="0" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="auxConsumption">Auxiliary Consumption (MW):</label>
                                        <input class="form-control" type="number" id="auxConsumption" name="auxConsumption" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="netCapacity">Net Capacity (MW):</label>
                                        <input class="form-control" type="number" id="netCapacity" name="netCapacity" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="plf">Plant Load Factor (PLF) %:</label>
                                        <input class="form-control" type="number" id="plf" name="plf" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="expectedGeneration">Net Expected Power Generation per Annum (lacs kWh):</label>
                                        <input class="form-control" type="number" id="expectedGeneration" name="expectedGeneration" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="manufacturerDetails">Name of Manufacturer with Address for Supply, Installation and Commissioning of Power Generation System (if identified):</label>
                                        <textarea class="form-control" id="manufacturerDetails" name="manufacturerDetails" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="ownFunds">Own Funds (Promoters):</label>
                                        <input class="from-control" type="number" id="ownFunds" name="ownFunds" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="financialInstitution">IREDA / PFC / REC / Financial Institution / Commercial Banks (Equity):</label>
                                        <input class="from-control" type="number" id="financialInstitution" name="financialInstitution" step="0.01" />
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="otherFunds">Other:</label>
                                        <input class="form-control" type="number" id="otherFunds" name="otherFunds" step="0.01" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    document.querySelectorAll('input[name="more_land"]').forEach((elem) => {
        elem.addEventListener("change", function() {
            document.getElementById('moreDetails').style.display = (this.value === "yes") ? 'block' : 'none';
        });
    });

    function openModal(modalId) {
        var modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.show();
    }

    // var coll = document.getElementsByClassName("collapsible");
    // for (var i = 0; i < coll.length; i++) {
    //     coll[i].addEventListener("click", function() {
    //         this.classList.toggle("active");
    //         var content = this.nextElementSibling;
    //         var plusMinus = this.querySelector(".plus-minus");

    //         if (content.style.display === "block") {
    //             content.style.display = "none";
    //             plusMinus.textContent = "+";
    //         } else {
    //             content.style.display = "block";
    //             plusMinus.textContent = "-";
    //         }
    //     });
    // }

    var coll = document.getElementsByClassName("collapsible");

    for (var i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            var content = this.nextElementSibling;
            var plusMinus = this.querySelector(".plus-minus");
            var isAlreadyOpen = content.style.display === "block";

            // Hide all contents and reset all plus-minus signs
            var allContents = document.getElementsByClassName("content");
            var allPlusMinus = document.querySelectorAll(".collapsible .plus-minus");
            for (var j = 0; j < allContents.length; j++) {
                allContents[j].style.display = "none";
            }
            for (var k = 0; k < allPlusMinus.length; k++) {
                allPlusMinus[k].textContent = "+";
            }

            // If it wasn't already open, show it now
            if (!isAlreadyOpen) {
                content.style.display = "block";
                plusMinus.textContent = "-";
            }
        });
    }


    </script>
@endsection