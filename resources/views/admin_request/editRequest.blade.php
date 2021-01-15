@extends('layouts.template')

@section('content')

<div class="user-profile">
    
    <div class="user-profile__sidebar">
        {!! Form::open(['action' => ['TechRequestController@update', $requestEdit->id], 'method' => 'POST', 'enctype' => 'multipart/form-data' ,
        'autocomplete' => 'off', 'class' => 'create-twoot-panel' ]) !!}
        @csrf
        
        <h3 class="user-profile__username">Update Request Form</h3>
        
        @include('inc.messages')
        
        <br>
        <div class="form-group">
            <label for="newTwootType"><strong>ATTENDED BY:</strong>
                <span class="required"> *</span>
            </label>
            <select id="attBy" name="attBy[]" class="form-control" required multiple style="height: 130px;">
                {{-- <option value="">Select Personnel Here</option> --}}
                <option value="Joselito Binos">Joselito Binos</option>
                <option value="Manuel Ibañez">Manuel Ibañez</option>
                <option value="Junie Oafallas">Junie Oafallas</option>
                <option value="Stephen Pan">Stephen Pan</option>
                <option value="Jerald Corpuz">Jerald Corpuz</option>
                <option value="Royeth Rehinaldo">Royeth Rehinaldo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="newTwoot"><strong>BRIEF SUMMARY OF TECHNICAL <br /> ISSUE/S CONCERN: MAX CHARACTER (180)</strong>
            </label>
            <textarea id="statusReport" name="statusReport" rows="5" class="form-control" maxlength="180"></textarea>
        </div>
        
        <div class="form-group">
            <label for="newTwootType"><strong>STATUS</strong>
                <span class="required"> *</span>
            </label>
            <select id="status" name="status" class="form-control" required>
                <option value="">Select Category Here</option>
                <option value="Resolved"> Resolved </option>
                <option value="Unresolved"> Unresolved </option>
                <option value="Beyond Repair"> Beyond Repair </option>
            </select>
        </div>
        
        <br />
        
        {{Form::hidden('_method', 'PUT')}}
        <button class="btn btn-primary btn-blue" type="submit">UPDATE TECH REQUEST</button>
        <br>
        <a href="{{ asset ('/') }}" type="button" class="btn btn-warning btn-yellow">GO BACK</a>
        {!! Form::close() !!}
        
    </div>
    
    <div class="user-profile__twoots-wrapper">
        
        <div class="twoot-item">
            <div class="user-profile__twoot">
                <div class="twoot-item__user">
                    
                    <div class="twoot-item__content">
                        TECH SUPPORT NO: <b> {{ $requestEdit->ts_no }} </b>
                        <hr/>
                    </div>
                    
                    <div class="twoot-item__content">
                        <div class="twoot-item__content1">
                            
                            <h3><u> Employee Request Information </u></h3>
                            DATE/TIME:
                            <b>
                                {{ \Carbon\Carbon::parse($requestEdit->date)->toDayDateTimeString() }} : 
                                {{ \Carbon\Carbon::parse($requestEdit->date)->diffForHumans() }}
                            </b>
                            
                            <br />
                            REQUESTING DIVISION/SECTION: <b> {{ $requestEdit->req_div }} </b>
                            <br />
                            REQUESTING EMPLOYEE: <b> {{ $requestEdit->req_emp }} </b>
                            <br />
                            PROBLEM CATEGORY: <b> {{ $requestEdit->prob_cat }} </b>
                            <br />
                            DESCRIPTION: <b> {{ $requestEdit->description }} </b>
                            
                            <hr>
                            
                            @if ( $requestEdit->is_replied == 1)
                            ATTENDED BY: <b> {{ $requestEdit->attended_by }} </b>
                            <br />
                            ATTENDED AT: <b> {{ $requestEdit->attended_at }} </b>
                            <br />
                            STATUS REPORT: <b> {{ $requestEdit->status_report }} </b>
                            <br />
                            STATUS: <b> {{ $requestEdit->status }} </b>
                            @endif
                            
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>

</div>

<style scoped>
    .required {
        content: "*";
        color: red;
    }
    
    .user-profile {
        display: grid;
        grid-template-columns: 1fr 3fr;
        grid-gap: 50px;
        padding: 50px 5%;
    }
    
    textarea {
        resize: none;
    }
    
    .user-profile__user-panel {
        display: flex;
        flex-direction: column;
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        border: 1px solid #dfe3eb;
    }
    
    h1 {
        margin: 0;
    }
    
    .user-profile__admin-badge {
        background: purple;
        color: white;
        border-radius: 5px;
        margin-right: auto;
        padding: 0 10px;
        font-weight: bold;
    }
    .user-profile__twoots-wrapper {
        display: grid;
        grid-gap: 10px;
    }
    
    .user-profile__create-twoot {
        padding-top: 20px;
        display: flex;
        flex-direction: column;
    }
    
    .--exceeded {
        color: red;
        border-color: red;
    }
    
    .create-twoot-panel {
        /* margin-top: 20px;
        padding: 20px 0; */
        display: flex;
        flex-direction: column;
    }
    
    .create-twoot-panel1 {
        margin-top: 20px;
        padding: 20px 0;
        display: flex;
        flex-direction: column;
    }
    
    textarea {
        border: 1px solid #dfe3e8;
        border-radius: 5px;
    }
    
    .create-twoot-panel__submit {
        display: flex;
        justify-content: space-between;
    }
    
    .create-twoot-type {
        padding: 10px 0;
    }
    
    .btn-blue {
        padding: 5px 20px;
        margin: auto 0;
        border-radius: 1px;
        border: none;
        background-color: #4682b4;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }
    
    .btn-yellow {
        padding: 5px 20px;
        margin: auto 0;
        border-radius: 1px;
        border: none;
        background-color:#ffc107;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }
    
    
    .twoot-item {
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        border: 1px solid #dfe3e8;
        box-sizing: border-box;
        cursor: pointer;
        transition: all 0.25s ease;
    }
    
    .item_new {
        padding: 5px 20px;
        font-weight: bold;
        background-color: red;
        color: white;
    }
    
    .tsNo {
        padding: 5px 20px;
        font-weight: bold;
        background-color: #4682b4;
        color: white;
    }
    
    .item_old {
        display: none;
    }
    .twoot-item:hover {
        transform: scale(1.1, 1.1);
    }
    
    .twoot-item__content {
        /* display: grid;
        grid-gap: 50px;
        grid-template-columns: 3fr 1fr; */
        padding: 10px 5%;
    }
</style>
@endsection