@extends('layouts.template')

@section('content')
<div class="user-profile">
    
    <div class="user-profile__sidebar">
        
        <h3 class="user-profile__username">Old Requests </h3>
        
        <br>
        
        <div class="form-group">
            <label for="newTwootType"><strong>FILTER BY DIVISION:</strong>
            </label>
            <select id="reqDiv" name="reqDiv" class="form-control" required>
                <option value="">Select Division Here</option>
                <option value="Directors Office">Directors Office</option>
                <option value="Administrative Division">Administrative Division</option>
                <option value="Production Planning and Control Division">Production Planning and Control Division</option>
                <option value="Composing Division">Composing Division</option>
                <option value="Press Division">Press Division</option>
                <option value="Finishing Division">Finishing Division</option>
                <option value="Engineering Division">Engineering Division</option>
                <option value="Financial and Management Division">Financial and Management Division</option>
                <option value="Sales and Management Division">Sales and Management Division</option>
                <option value="Photolithographic Division">Photolithographic Division</option>
            </select>
        </div>
        
    </div>
    
    <div id="showRequests">
        <div class="user-profile__twoots-wrapper">
            
            <div class="requestCount">
                <h3 class="user-profile__username">Total Requests <b class="totalCount"> ( {{ $requestListCount }} ) </b> </h3>
            </div>
            
            @if (count($requestList) > 0)
            @foreach ($requestList as $item)
            
            <div class="twoot-item">
                <div class="user-profile__twoot">
                    <div class="twoot-item__user">
                        
                        <div class="twoot-item__content">
                            @if ( $item->is_replied == 0)
                            <span class="item_new">NEW REQUEST</span>
                            @endif
                            
                            @if( $item->status == "Resolved")
                            <span class="item_done">REQUEST RESOLVED</span>
                            @endif
                            
                            @if( $item->status == "Unresolved")
                            <span class="item_unresolved">REQUEST UNRESOLVED</span>
                            @endif
                            
                            @if( $item->status == "Beyond Repair")
                            <span class="item_beyond">BEYOND REPAIR</span>
                            @endif
                            
                            TECH SUPPORT NO: <b> {{ $item->ts_no }} </b>
                            <hr/>
                        </div>
                        
                        <div class="twoot-item__content">
                            <div class="twoot-item__content1">
                                
                                <h3><u> Employee Request Information </u></h3>
                                DATE/TIME:
                                <b>
                                    {{ \Carbon\Carbon::parse($item->date)->toDayDateTimeString() }} : 
                                    {{ \Carbon\Carbon::parse($item->date)->diffForHumans() }}
                                </b>
                                
                                <br />
                                REQUESTING DIVISION/SECTION: <b> {{ $item->req_div }} </b>
                                <br />
                                REQUESTING EMPLOYEE: <b> {{ $item->req_emp }} </b>
                                <br />
                                PROBLEM CATEGORY: <b> {{ $item->prob_cat }} </b>
                                <br />
                                DESCRIPTION: <b> {{ $item->description }} </b>
                                
                                <hr>
                                
                                ATTENDED BY: <b> {{ $item->attended_by }} </b>
                                <br />
                                ATTENDED AT: <b> 
                                    {{ \Carbon\Carbon::parse($item->attended_at)->toDayDateTimeString() }} : 
                                    {{ \Carbon\Carbon::parse($item->attended_at)->diffForHumans() }}
                                </b>
                                <br />
                                STATUS REPORT: <b> {{ $item->status_report }} </b>
                                <br />
                                STATUS: <b> {{ $item->status }} </b>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            @endif
            {{ $requestList->links() }}
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        function result_data1(query1 = '')
        {
            $.ajax({
                url:"{{ route('showRequests') }}",
                method:'GET',
                data:{query1:query1},
                dataType:'json',
                success:function(data1)
                {
                    //RESULT FOR MEMBER DUES
                    $('#showRequests').html(data1.data);
                    // alert('SUCCES');   
                    
                }
            })
        }
        
        $(document).on('change', '#reqDiv', function(){
            var query1 = document.getElementById("reqDiv").value;
            result_data1(query1);
        });
    });
</script>


<style scoped>
    .required {
        content: "*";
        color: red;
    }
    
    .user-profile1 {
        /* display: grid;
        grid-template-columns: 1fr 3fr;
        grid-gap: 50px; */
        padding: 50px 5%;
    }
    
    textarea {
        resize: none;
    }
    
    .requestCount{
        text-align: right;
    }
    
    .totalCount {
        color: red;
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
    
    .btn {
        padding: 5px 20px;
        margin: auto 0;
        border-radius: 1px;
        border: none;
        background-color: #4682b4;
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
    
    .item_done {
        padding: 5px 20px;
        font-weight: bold;
        background-color: #06a40b;
        color: white;
    }
    
    .item_unresolved {
        padding: 5px 20px;
        font-weight: bold;
        background-color: darkgoldenrod;
        color: white;
    }
    
    .item_beyond {
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

