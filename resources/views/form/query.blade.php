<!DOCTYPE html>
<html>
<head>
    <title>Pumping Hearts | Trainer Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin-ext" rel="stylesheet"/>

    <!-- build:css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/form/jquery.bxslider.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/form/font.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/form/uniform-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/form/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/form/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/form/style.css')}}"/>
    <!-- endbuild -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

{{--<div class="tuna-loader-container">--}}
{{--    <div class="tuna-loader"></div>--}}
{{--</div>--}}

<div class='tuna-signup-container'>
    <div class='container'>
        <div class="row">
            <div class='tuna-signup-left col-md-4 col-sm-4'>
                <a href="{{route('home')}}"><img class='tuna-signup-logo' src='{{asset('images/Logo-red-200px.png')}}' alt="logo"/></a>
                <p>We’re going to ask you a few questions to match you with the right trainer</p>
                <hr/>
                <div class="tuna-slider-container">
                    <ul class="tuna-slider">
                        <li class='tuna-signup-testimonial'>
                            <i class="icon-quote"></i>
                            <p>The customer support is amazing, my friends and I all use it</p>
                            <img src='' alt=""/>
                            <b>Sume Tella<span>‒ Housewife</span></b>
                        </li>
                        <li class='tuna-signup-testimonial'>
                            <i class="icon-quote"></i>
                            <p>We are using PumpingHearts for over an year now love it and it's amazing :)</p>
                            <img src='' alt=""/>
                            <b>John Masculer<span>‒ Business Man</span></b>
                        </li>
                    </ul>
                </div>

                <div>
                    <a href="{{route('home')}}" style="padding-right: 25px;">
                        Home
                    </a>
                    <a href="{{route('FAQ')}}" style="padding-right: 25px;">
                        FAQs
                    </a>
                    <a style="padding-right: 25px;">
                        How It Works
                    </a>
                    <a href="{{route('contact')}}" style="padding-right: 25px;">
                        Contact
                    </a>
                </div>
            </div>
            <div class='tuna-signup-right col-md-8 col-sm-8 '>

                <div class='steps-count'>
                    STEP <span class="step-current">1</span>/<span class="step-count"></span>
                </div>

                <div class="tuna-steps">
                    <div class="step step-active" data-step-id='1'>
                        <div class="step-label">Gender Preference</div>
                        <label class="radio-inline"><input type="radio" value="Male" name="tn_gender"> Male</label>
                        <label class="radio-inline"><input type="radio" value="Female" name="tn_gender"> Female</label>
                        <label class="radio-inline"><input type="radio" value="DoesntMatter" name="tn_gender"> Doesn't Matter</label>
                        <div class='help-error'><i class="icon icon-warning"></i> You must select an option at least!</div>
                    </div>
                    <div class="step" data-step-id='2'>
                        <div class="step-label">Location Preference</div>
                        <label class="radio-inline"><input type="radio" value="MyLocation" name="tn_location"> My location</label>
                        <label class="radio-inline"><input type="radio" value="trainer" name="tn_location"> I want to meet my trainer at their location</label>
                        <div class='help-error'><i class="icon icon-warning"></i> You must select an option at least!</div>
                    </div>
                    <div class="step step-confirm" style="padding-top: 7vw;" data-step-id='3'>
                        <div class="step-label">Specialties you are looking for in your coach</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="checkbox-inline"><input type="checkbox" value="Bodybuilding Preparations" name="tn_specialty"> Bodybuilding Preparations</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Yoga" name="tn_specialty"> Yoga</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Nutrition" name="tn_specialty"> Nutrition</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Boxing" name="tn_specialty"> Boxing</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Sports Specific" name="tn_specialty[]"> Sports specific</label><br>
                                <label class="checkbox-inline"><input type="checkbox" value="Prenatal/Postnatal" name="tn_specialty"> Prenatal/Postnatal</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Pilates" name="tn_specialty"> Pilates</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Injurty Related" name="tn_specialty[]"> Injurty Related</label> <br>
                            </div>
                            <div class="col-md-6">

                                <label class="checkbox-inline"><input type="checkbox" value="Youth" name="tn_specialty"> Youth</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="CrossFit" name="tn_specialty"> CrossFit</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Group" name="tn_specialty"> Group</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Plyometrics" name="tn_specialty"> Plyometrics</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Fat Loss" name="tn_specialty"> Fat Loss</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Muscle Gain" name="tn_specialty"> Muscle Gain</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Elderly" name="tn_specialty"> Elderly</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Powerlifting" name="tn_specialty"> Powerlifting</label> <br>
                            </div>

                        </div>



                        <div class='help-error'><i class="icon icon-warning"></i> You must select an option at least!</div>
                    </div>


                    <div class="step" data-step-id='4'>
                        <div class="step-label">Days you are available for training</div>
                        <label class="checkbox-inline"><input type="checkbox" value="Monday" name="tn_days"> Monday</label>
                        <label class="checkbox-inline"><input type="checkbox" value="Tuesday" name="tn_days"> Tuesday</label>
                        <label class="checkbox-inline"><input type="checkbox" value="Wednesday" name="tn_days"> Wednesday</label>
                        <label class="checkbox-inline"><input type="checkbox" value="Thursday" name="tn_days"> Thursday</label>
                        <label class="checkbox-inline"><input type="checkbox" value="Friday" name="tn_days"> Friday</label>
                        <label class="checkbox-inline"><input type="checkbox" value="Saturday" name="tn_days"> Saturday</label>
                        <label class="checkbox-inline"><input type="checkbox" value="Sunday" name="tn_days"> Sunday</label>
                        <div class='help-error'><i class="icon icon-warning"></i> You must select an option at least!</div>
                    </div>

                    <div class="step" data-step-id='5'>
                        <div class="step-label">Timings you are available for training</div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="checkbox-inline"><input type="checkbox" value="Morning" name="tn_time"> Morning 5am - 11am</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="Afternoon" name="tn_time"> Afternoon 11am - 4pm</label>
                            </div>
                            <div class="col-md-6">
                                <label class="checkbox-inline"><input type="checkbox" value="Evening" name="tn_time"> Evening 4pm - 9pm</label> <br>
                                <label class="checkbox-inline"><input type="checkbox" value="LateNight" name="tn_time"> Late Night 9pm - 5am</label>
                            </div>
                        </div>


                        <div class='help-error'><i class="icon icon-warning"></i> You must select an option at least!</div>
                    </div>

                    <div class="step" data-step-id='6'>
                        <label class="formLabel" for="tn_zip">Please enter your Zip Code</label>
                        <input type="text" class="formInput" id='tn_zip' name="tn_zip" autocomplete="off" spellcheck="false" />
                        <div class='help-error'><i class="icon icon-warning"></i> Text field is required!</div>
                    </div>

                    <div class="step step-confirm" data-step-id='7'>
                        <form method='post' action="{{route("FormSearch")}}" autocomplete="off" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <div class="control-label col-md-4">Gender Preference</div>
                                <div class="col-md-8">
                                    <div class="input-container">
                                        <select name="gender" class="selectpicker form-control" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="DoesntMatter">Doesn't Matter</option>
                                        </select>
                                        <a href="javascript:void(0)" class="editInput">EDIT</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-label col-md-4">Location Preference</div>
                                <div class="col-md-8">
                                    <div class="input-container">
                                        <select name="location[]" class="selectpicker form-control">
                                            <option value="MyLocation"> My location</option>
                                            <option value="trainer">I want to meet my trainer at their location</option>
                                        </select>
                                        <a href="javascript:void(0)" class="editInput">EDIT</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-label col-md-4">Specialties Preference</div>
                                <div class="col-md-8">
                                    <div class="input-container">
                                        <select name="specialty[]" class="selectpicker form-control" multiple="multiple">
                                            <option value="Bodybuilding Preparations"> Bodybuilding Preparations</option>
                                            <option value="Yoga"> Yoga</option>
                                            <option value="Nutrition"> Nutrition</option>
                                            <option value="Boxing"> Boxing</option>
                                            <option value="Prenatal/Postnatal"> Prenatal/Postnatal</option>
                                            <option value="Pilates"> Pilates</option>
                                            <option value="Injury Related"> Injury related</option>
                                            <option value="Youth"> Youth</option>
                                            <option value="Postnatal"> Postnatal</option>
                                            <option value="CrossFit"> CrossFit</option>
                                            <option value="Group"> Group</option>
                                            <option value="Plyometrics"> Plyometrics</option>
                                            <option value="Fat Loss"> Fat Loss</option>
                                            <option value="Muscle Gain"> Muscle Gain</option>
                                            <option value="Elderly"> Elderly</option>
                                            <option value="Sports Specific"> Sports Specific</option>
                                            <option value="Powerlifting"> Powerlifting</option>
                                        </select>
                                        <a href="javascript:void(0)" class="editInput">EDIT</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-label col-md-4">Days Preference</div>
                                <div class="col-md-8">
                                    <div class="input-container">
                                        <select name="days[]" class="selectpicker form-control" multiple="multiple">
                                            <option value="Monday"> Monday</option>
                                            <option value="Tuesday"> Tuesday</option>
                                            <option value="Wednesday"> Wednesday</option>
                                            <option value="Thursday"> Thursday</option>
                                            <option value="Friday"> Friday</option>
                                            <option value="Saturday"> Saturday</option>
                                            <option value="Sunday"> Sunday</option>
                                        </select>
                                        <a href="javascript:void(0)" class="editInput">EDIT</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-label col-md-4">Time Preference</div>
                                <div class="col-md-8">
                                    <div class="input-container">
                                        <select name="time[]" class="selectpicker form-control" multiple="multiple">
                                            <option value="Morning"> Morning</option>
                                            <option value="Afternoon"> Afternoon</option>
                                            <option value="Evening"> Evening</option>
                                            <option value="LateNight"> Late Night</option>
                                        </select>
                                        <a href="javascript:void(0)" class="editInput">EDIT</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-label col-md-4">Zip Code</div>
                                <div class="col-md-8">
                                    <div class="input-container">
                                        <input type="text" name="zip" autocomplete="off" spellcheck="false" class="form-control" />
                                        <a href="javascript:void(0)" class="editInput">EDIT</a>
                                    </div>
                                </div>
                            </div>

                            <div class="step-confirm-buttons">
                                <div>
                                    <button type="submit" class="btn btn-white btn-rounded finishBtn">Ready, Let's Start!</button>
                                    <span>or press "Enter"</span>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>






                <div class='button-container'>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-white btn-rounded nextStep" tabindex="0">Next Step →</a>
                        <span>or press "Enter"</span>
                    </div>
                    <a href="javascript:void(0)" class='btn btn-white-transparent btn-rounded prevStep' tabindex="1">← Previous</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- build:js -->
<script type="text/javascript" src="{{asset('scripts/form/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/form/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/form/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/form/jquery.uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/form/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/form/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/form/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/form/main.js')}}"></script>
<!-- endbuild -->
</body>
</html>
